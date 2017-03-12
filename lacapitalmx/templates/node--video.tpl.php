<?php
$nodo = entity_metadata_wrapper('node', $node);
$image = $nodo->field_image->value();
?>
<article itemscope itemtype="http://schema.org/NewsArticle">
    <?php print render(module_invoke("imx_users","block_view","imx_users_profile_node"));?>
    <div class="nodeBody A24r0 lh30 mb30" itemprop="articleBody">
        <?php print render($content['body']); ?>
    </div>
</article>
