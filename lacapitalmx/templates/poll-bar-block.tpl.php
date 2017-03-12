<?php

/**
 * @file poll-bar-block.tpl.php
 * Display the bar for a single choice in a poll
 *
 * Variables available:
 * - $title: The title of the poll.
 * - $votes: The number of votes for this choice
 * - $total_votes: The number of votes for this choice
 * - $percentage: The percentage of votes for this choice.
 * - $vote: The choice number of the current user's vote.
 * - $voted: Set to TRUE if the user voted for this choice.
 *
 * @see template_preprocess_poll_bar()
 */
?>
<span class="C9 dblock"><?php print $title; ?></span>
<div class="survey_bar">
    <div class="survey_progress" style="width:<?php print $percentage; ?>%;"></div>
</div>
<span class="C9 dblock survey_percent">
    <?php print $percentage; ?>%
</span>
