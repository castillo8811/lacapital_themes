<?php
/**
 * @file poll-results-block.tpl.php
 * Display the poll results in a block.
 *
 * Variables available:
 * - $title: The title of the poll.
 * - $results: The results of the poll.
 * - $votes: The total results in the poll.
 * - $links: Links in the poll.
 * - $nid: The nid of the poll
 * - $cancel_form: A form to cancel the user's vote, if allowed.
 * - $raw_links: The raw array of links. Should be run through theme('links')
 *   if used.
 * - $vote: The choice number of the current user's vote.
 *
 * @see template_preprocess_poll_results()
 */
?>

<div id="surveys" class="poll">
    <h1 class="C1"><?php print $title ?></h1>
    <?php print $results ?>
    <span class="C9 dblock survey_totals">
        <?php print t('Total votes: @votes', array('@votes' => $votes)); ?>
    </span>
</div>