<?php

/**
 * @file
 * Default theme implementation to display voting form for a poll.
 *
 * - $choice: The radio buttons for the choices in the poll.
 * - $title: The title of the poll.
 * - $block: True if this is being displayed as a block.
 * - $vote: The vote button
 * - $rest: Anything else in the form that may have been added via
 *   form_alter hooks.
 *
 * @see template_preprocess_poll_vote()
 */
?>
<div id="poll-widget" class="poll widget module mb2">
    <div class="spritePlecas-sidebar widget-title">
        <span class="spritePlecas-sidebar widget-title-text"></span>
    </div>
    <div class="widget-content1">
        <div class="poll-image">
<!--            <img src="<?php // $variables['nodess']; ?>" />-->
            <?php // print_r( $variables['nodess'] ); ?>
        </div>
        <div class="choices">
        <?php if ($block): ?>
            <div class="title"><?php print $title; ?></div>
        <?php endif; ?>
        <?php print $choice; ?>
        </div>
        <div class="poll-vote">
            <?php print $vote; ?>
        </div>
        <?php // This is the 'rest' of the form, in case items have been added. ?>
        <?php print $rest ?>
    </div>
</div>
