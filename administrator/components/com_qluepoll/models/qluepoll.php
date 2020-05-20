<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_qluepoll
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

use Joomla\Utilities\ArrayHelper;

class QluePollModelQluePoll extends JModelAdmin {
    public function getTable($type = 'QluePoll', $prefix = 'QluePollTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true) {
        $form = $this->loadForm (
            'com_qluepoll.qluepoll', 'qluepoll', array('control' => 'jform', 'load_data' => $loadData) 
        );

        if(empty($form)) return false;

        return $form;
    }

    protected function loadFormData() {
        $data = JFactory::getApplication()->getUserState(
            'com_qluepoll.edit.qluepoll.data', array()
        );

        if(empty($data)) $data = $this->getItem();

        return $data;
    }

    protected function getReorderConditions($table = null) {
        $condition = array(
            'category_id = ' . (int) $table->category_id
        );

        return $condition;
    }

    public function getItem($pk = null) {
        $data = parent::getItem((int)$pk);

        $input = JFactory::getApplication()->input;
        $poll_id = $input->get('id');

        if($poll_id == null || $poll_id == '0') return $data; 

        $results = $this->getAwnsers($poll_id);
        $awnsers = [];

        for($i = 0; $i < count($results); $i++) {
            $awnsers['awnsers'.$i] = [
                'awnser' => $results[$i],
            ];
        }

        $data->set('awnsers', $awnsers);
        
        $awnsersFull = array();

        foreach($this->getFullAwnsers($poll_id) as $awnser) {
            $result = new stdClass();
            $result->name = $awnser["name"];
            $result->votes = $this->getNoVotesForAwnser($awnser["id"]);
            array_push($awnsersFull, $result);
        }

        $this->awnsers = $awnsersFull;

        return $data;
    }

    public function save($data = array()) {
        $result = parent::save($data);
        if(!$result) return;

        $input = JFactory::getApplication()->input;
        $poll_id = $input->get('id');

        //if new poll get its id
        if($poll_id == null || $poll_id == '0') {
            $db = JFactory::getDbo();
            $query = $db->getQuery(true);
            $query->select($db->quoteName('id'))
                ->from($db->quoteName('#__qluepoll'))
                ->where($db->quoteName('title') . '=' . $db->quote($input->getArray()["jform"]["title"]))
                ->order($db->quoteName('id') . ' DESC');
            $db->setQuery($query);

            $poll_id = $db->loadColumn();
            $poll_id = $poll_id[0];
        }

        if($poll_id == null || $poll_id == '0') return true; 

        $awnsers = ArrayHelper::getColumn((array) $data['awnsers'], 'awnser');
        $previousAwnsers = $this->getAwnsers($poll_id);

        //add new awnsers
        foreach($awnsers as $awnser) {
            $exists = false;
            foreach($previousAwnsers as $previousAwnser) {
                if ($awnser == $previousAwnser) {
                    $exists = true;
                }
            }

            if(!$exists) {
                //add to database
                $this->saveAwnser($awnser, $poll_id);
            }
        }

        //remove removed awnsers
        foreach($previousAwnsers as $previousAwnser) {
            $exists = false;
            foreach($awnsers as $awnser) {
                if($previousAwnser == $awnser) {
                    $exists = true;
                }
            }

            if(!$exists) {
                //remove awnser
                $this->removeAwnser($poll_id, $previousAwnser);
            }
        }

        return true;
    }

    /**
     * Get awnsers for a poll, optiaonally passed a poll,
     * falls back to $input->get('id'); 
     */
    public function getAwnsers($id = -1) {

        $input = JFactory::getApplication()->input; 
        $poll_id = $input->get('id');

        if($id != -1) $poll_id = $id;

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select($db->quoteName(array('name')));
        $query->from($db->quoteName('#__qluepoll_awnsers'));
        $query->where($db->quoteName('poll_id') . '=' . $poll_id);
        $db->setQuery($query);
        $results = $db->loadColumn();

        return $results;
    }

    /**
     * Save an awnser for a poll, optiaonally passed a poll,
     * falls back to $input->get('id'); 
     */
    private function saveAwnser($awnser, $id = -1) {
        $input = JFactory::getApplication()->input; 
        $poll_id = $input->get('id');

        if($id != -1) $poll_id = $id;
    
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->insert($db->quoteName('#__qluepoll_awnsers'))
              ->columns($db->quoteName(array('name', 'poll_id')))
              ->values(implode(',', array($db->quote($awnser), $db->quote($poll_id))));
        $db->setQuery($query);
        $db->execute();
    }

    /**
     * remove an awnser from the database where params 
     * match.
     */
    private function removeAwnser($poll_id, $awnser) {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $conditions = array(
            $db->quoteName('poll_id') . ' = ' . $db->quote($poll_id),
            $db->quoteName('name') . ' = ' . $db->quote($awnser)
        );

        $query->delete($db->quoteName('#__qluepoll_awnsers'))
              ->where($conditions);

        $db->setQuery($query);
        $db->execute();
    }

    /**
     * returns all awnsers for a poll
     */
    public function getFullAwnsers($poll_id) {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select($db->quoteName(array('id', 'name')))
              ->from($db->quoteName('#__qluepoll_awnsers'))
              ->where($db->quoteName('poll_id') . '=' . $db->quote($poll_id));

        $db->setQuery($query);
        $results = $db->loadAssocList();

        return $results;
    }

    /**
    * returns number of votes for an awnser
    */
    public function getNoVotesForAwnser($awnser_id) {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select($db->quoteName('id'))
              ->from($db->quoteName('#__qluepoll_votes'))
              ->where($db->quoteName('awnser_id') . '=' . $db->quote($awnser_id));

        $db->setQuery($query);
        $column = $db->loadColumn();

        return count($column);
    }
}