<article id="node-<?php print $node->nid; ?>" itemscope itemtype="http://schema.org/NewsArticle" class="<?php print $classes; ?> clearfix clear">
   <?php if ($unpublished): ?>
       <div class="unpublished"><?php print t('Unpublished'); ?></div>
   <?php endif; ?>
   <header class="nodeHeader">
       <h1 itemprop="headline" class="O45r0 lh50 mb20"><?php print $title; ?></h1>
   </header>
   <div class="nodeImg tacenter centered mb20" itemprop="Thing">
   </div>
   <div class="nodeBody N21r0 lh30" itemprop="articleBody">
       <?php print render($content); ?>
   </div>
</article>
