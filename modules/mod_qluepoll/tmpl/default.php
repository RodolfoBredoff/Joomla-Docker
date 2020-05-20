<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_qluepoll
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$document = JFactory::getDocument();

?>

<div class="well qlue-poll">
    <form>
    <h3><?php echo $poll->poll->title ?></h3>
    <p id="qlue_poll-question<?php echo $id ?>"><?php echo $poll->poll->question?></p>

    <ul id="qlue_poll-vote<?php echo $id ?>">
        <?php
            foreach($poll->awnsers as $awnser) {
                echo '<li>';
                echo '<input type="radio" name="poll" value="'. $awnser->id .'"> ' . $awnser->name . '<br>';
                echo '</li>';
            }
        ?>
    </ul>
    <input type="hidden" name="poll_id" value="<?php $poll_id ?>">
    <input class="button" id="qlue_poll-submit_button<?php echo $id ?>" type="submit" name="submit" value="Vote">
    </form>
</div>

<style>
    li {
        list-style: none;
        padding-bottom: 5px;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        padding: 0.25rem;
        text-align: left;
        border: 1px solid #ccc;
    }
    tbody tr:nth-child(odd) {
        background: #eee;
    }
</style>

<script>
    jQuery(document).ready(function($) {
        $("#qlue_poll-submit_button<?php echo $id ?>").click(function(e) { //needs to support multiple polls on a page, need the module id
            e.preventDefault();
            var awnser = $("input[name='poll']:checked").val();

            jQuery.ajax({
                url: "index.php?option=com_ajax&module=qluepoll&format=json", 
                type: "POST",
                data: {
                    'awnser' : awnser,
                    'poll_id' : <?php echo $poll->poll->id ?>,
                }, 
                success: function(result) { 
                    var awnsers = result.data.data;
                    var total = 0;
                    for(var i = 0; i < awnsers.length; i++) {
                        total += awnsers[i].votes;
                    }

                    //remove voting elements
                    $('#qlue_poll-vote<?php echo $id ?>').remove();
                    $('#qlue_poll-submit_button<?php echo $id ?>').remove();

                    $('<table id="qlue_poll-results-table<?php echo $id ?>"><tr><th>Awnser</th><th>Votes</th></tr></table>').insertAfter($('#qlue_poll-question<?php echo $id ?>'));
                    for(var i = 0; i < awnsers.length; i++) {
                        var awn = awnsers[i];
                        console.log(awn);
                        $('#qlue_poll-results-table<?php echo $id ?> tr:last').after('<tr><td>' + awn.awnser + '</td><td>' + Math.round((100 / total * awn.votes) * 10)/10 + '%</td></tr>');
                    }
                }
            });
        });

        if(!<?php echo $allowed ?>) {
            $("#qlue_poll-submit_button<?php echo $id ?>").trigger('click');
        }
    });

</script>