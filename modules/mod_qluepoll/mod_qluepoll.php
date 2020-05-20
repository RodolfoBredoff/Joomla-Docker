<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_qluepoll
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

require_once dirname(__FILE__) . '/helper.php';

$items = json_decode($module->params);
$id = $module->id;

$poll_id = $params->get('title', '1');
$poll = ModQluePollHelper::getPoll($poll_id);

$input = JFactory::getApplication()->input;
$ip = $input->server->get('REMOTE_ADDR');
$allowed = var_export(ModQluePollHelper::checkIfAllowed($poll, $ip), true);

// $input = new JInput;
// $post = $input->getArray($_POST);

// if(array_key_exists('submit', $post)) {
//     $awnser = $input->get('poll');

//     if(!$awnser) {
//         return false;
//     }

//     ModQluePollHelper::submit($poll, $awnser);
// }

// $poll = ModQluePollHelper::getPoll($poll_id);

require JModuleHelper::getLayoutPath('mod_qluepoll', $params->get('layout', 'default'));

