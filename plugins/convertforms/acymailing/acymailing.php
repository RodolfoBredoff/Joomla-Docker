<?php

/**
 * @package         Convert Forms
 * @version         2.5.4 Free
 * 
 * @author          Tassos Marinos <info@tassos.gr>
 * @link            http://www.tassos.gr
 * @copyright       Copyright © 2020 Tassos Marinos All Rights Reserved
 * @license         GNU GPLv3 <http://www.gnu.org/licenses/gpl.html> or later
*/

defined('_JEXEC') or die('Restricted access');

class plgConvertFormsAcyMailing extends \ConvertForms\Plugin
{
	/**
	 *  Main method to store data to service
	 *
	 *  @return  void
	 */
	public function subscribe()
	{
		// Make sure there's a list selected
		if (!isset($this->lead->campaign->list) || empty($this->lead->campaign->list))
		{
			throw new Exception(JText::_('PLG_CONVERTFORMS_ACYMAILING_NO_LIST_SELECTED'));
		}
			
		$lists    = $this->lead->campaign->list;
		$lists_v5 = [];
		$lists_v6 = [];

		// Discover lists for each version. v6 lists starts with 6: prefix.
		foreach ($lists as $list)
		{
			// Is a v5 list
			if (strpos($list, '6:') === false)
			{
				$lists_v5[] = $list;
				continue;
			}

			// Is a v6 list
			$lists_v6[] = str_replace('6:', '', $list);
		}

		// Add user to AcyMailing 5 lists
		if (!empty($lists_v5))
		{
			$this->subscribe_v5($lists_v5);
		}

		// Add user to AcyMailing 6 lists
		if (!empty($lists_v6))
		{
			$this->subscribe_v6($lists_v6);
		}
	}

	/**
	 * Subscribe method for AcyMailing v6
	 *
	 * @param  array $lists
	 *
	 * @return void
	 */
	private function subscribe_v6($lists)
	{
        if (!@include_once(JPATH_ADMINISTRATOR . '/components/com_acym/helpers/helper.php'))
        {
			throw new Exception('Helper class not found');
        }

		// Create user object
		$user = new stdClass();
		$user->email 	 = $this->lead->email;
		$user->confirmed = $this->lead->campaign->doubleoptin ? false : true;

		$user_fields = array_change_key_case($this->lead->params);

		$user->name = isset($user_fields['name']) ? $user_fields['name'] : '';

		// Load User Class
		$acym = acym_get('class.user');

		// Check if exists
		$existing_user = $acym->getOneByEmail($this->lead->email);

		if ($existing_user)
		{
			$user->id = $existing_user->id;
		} else
		{
			// Save user to database only if it's a new user.
			if (!$user->id = $acym->save($user))
			{
				throw new Exception(JText::_('PLG_CONVERTFORMS_ACYMAILING_CANT_CREATE_USER'));
			}
		}

		// Save Custom Fields
		$fieldClass = acym_get('class.field');
		$acy_fields = $fieldClass->getAllfields();
		unset($user_fields['name']); // Name is already used during user creation.

		$fields_to_store = [];

		foreach ($user_fields as $paramKey => $paramValue)
		{
			// Check if paramKey it's a custom field
			$field_found = array_filter($acy_fields, function($field) use($paramKey) {
				return (strtolower($field->name) == $paramKey || $field->id == $paramKey);
			});

			if ($field_found)
			{
				// Get the 1st occurence
				$field = array_shift($field_found);

				// AcyMailing 6 needs field's ID to recognize a field.
				$fields_to_store[$field->id] = $paramValue;

				// $paramValue output: array(1) { [0]=> string(2) "gr" }
				// AcyMailing will get the key as the value instead of "gr"
				// We combine to remove the keys in order to keep the values
				if (is_array($paramValue))
				{
					$fields_to_store[$field->id] = array_combine($fields_to_store[$field->id], $fields_to_store[$field->id]);
				}
			}
		}

		if ($fields_to_store)
		{
			$fieldClass->store($user->id, $fields_to_store);
		}

		// Subscribe user to AcyMailing lists
		return $acym->subscribe($user->id, $lists);
	}

	/**
	 * Subscribe method for AcyMailing v5
	 *
	 * @param  array $lists
	 *
	 * @return void
	 */
	private function subscribe_v5($lists)
	{
        if (!@include_once(JPATH_ADMINISTRATOR . '/components/com_acymailing/helpers/helper.php'))
        {
			throw new Exception('Helper class not found');
		}

		// Create user object
		$user = new stdClass();
		$user->email 	 = $this->lead->email;
		$user->confirmed = $this->lead->campaign->doubleoptin ? false : true;

		// Get Custrom Fields
    	$db = JFactory::getDbo();

        $customFields = $db->setQuery(
            $db->getQuery(true)
                ->select($db->quoteName('namekey'))
                ->from($db->quoteName('#__acymailing_fields'))
        )->loadColumn();

		if (is_array($customFields) && count($customFields))
		{
			foreach ($this->lead->params as $key => $param)
			{
				if (in_array($key, $customFields))
				{
					$user->$key = $param;
				}
			}
		}
		
		$acymailing = acymailing_get('class.subscriber');
		$userid = $acymailing->subid($this->lead->email);

		// AcyMailing sends account confirmation e-mails even if the user exists, so we need
		// to run save() method only if the user actually is new.
		if (is_null($userid)) 
		{
			// Save user to database
			if (!$userid = $acymailing->save($user))
			{
				throw new Exception(JText::_('PLG_CONVERTFORMS_ACYMAILING_CANT_CREATE_USER'));
			}
		}

		// Subscribe user to AcyMailing lists
		$lead = [];
		foreach($lists as $listId)
		{
			$lead[$listId] = ['status' => 1];
		}

		return $acymailing->saveSubscription($userid, $lead);
	}
	
    /**
     *  Disable service wrapper
     *
     *  @return  boolean
     */
    protected function loadWrapper()
    {
		return true;
    }
}