<?php

/**
 * @file
 * Default theme implementation to display the poll results in a block.
 *
 * Variables available:
 * - $title: The title of the poll.
 * - $results: The results of the poll.
 * - $votes: The total results in the poll.
 * - $links: Links in the poll.
 * - $nid: The nid of the poll
 * - $cancel_form: A form to cancel the user's vote, if allowed.
 * - $raw_links: The raw array of links.
 * - $vote: The choice number of the current user's vote.
 *
 * @see template_preprocess_poll_results()
 */
?>
<div id="poll-widget" class="poll widget module mb2">
    <div class="spritePlecas-sidebar widget-title">
        <span class="spritePlecas-sidebar widget-title-text"></span>
    </div>
    <div class="widget-content1">
        <div class="poll-title"><?php print $title ?></div>
        <div class="poll-results"><?php print $results; ?></div>
        <div class="total">
            <?php print t('Total votes: @votes', array('@votes' => $votes)); ?>
        </div>
        <?php if (!empty($cancel_form)): ?>
            <?php print $cancel_form; ?>
        <?php endif; ?>
    </div>
</div>
