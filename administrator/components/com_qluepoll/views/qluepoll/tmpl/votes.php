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

    $model = $this->getModel ();
    $awnsers = $model->awnsers;

    $total = 0;
    foreach($awnsers as $awnser){
        $total += $awnser->votes;
    }

?>
<form action="<?php echo JRoute::_('index.php?option=com_qluepoll&layout=edit&id=' . (int) $this->item->id); ?>"
    method="post" name="adminForm" id="adminForm">    <input type="hidden" name="task" value="qluepoll.edit" />
    <?php echo JHtml::_('form.token'); ?></form>
<div>
    <table>
        <thead>
        <tr>
            <th>Answer</th>
            <th>Votes</th>
            <th>Percentage</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($awnsers as $awnser) {
                echo '<tr>'.
                    '<td>'. $awnser->name .'</td>'.
                    '<td>'. $awnser->votes .'</td>'.
                    '<td>'. round(100 / $total * $awnser->votes, 2) .'%</td>'
                .'</tr>';
            }
        ?>
        </tbody>
    </table>
</div>

<style>
    table {
        border-collapse: collapse;
        max-width: 30%;
    }
    th, td {
        padding: 0.25rem;
        border: 1px solid #ccc;
    }
    tbody tr:nth-child(odd) {
        background: #eee;
    }
</style>

<script>
</script>