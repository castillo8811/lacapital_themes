<?php
$nodo = entity_metadata_wrapper('node', $node);
$image = $nodo->field_image->value();
?>
<article itemscope itemtype="http://schema.org/NewsArticle">
    <meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="https://google.com/article"/>
    <header class="nodeHeader">
        <h1 itemprop="headline" class="O45r0 lh50 mb20 tacenter"><?php echo $node->title; ?></h1>
        <div class="A15r0 tacenter mb20"><?php echo date("d/m/y",$node->created); ?></div>
        <meta itemprop="datePublished" content="<?php print date('Y-m-d',$node->created) ?>"/>
        <meta itemprop="dateModified" content="<?php print date('Y-m-d',$node->created) ?>"/>
        <div class="nodeSocials tacenter prelative pt40 clear">
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_sharing_toolbox"></div>
        </div>
    </header>
    <?php if(isset($image['uri'])):?>
        <div class="nodeImg tacenter centered mb20">
            <img itemprop="image" src="<?php print $image['uri'] ? image_style_url('large', $image['uri']) : "http://placehold.it/680x510"; ?>" width="680" height="510" alt="<?php echo $image['alt'] ? $image['alt'] : $node->title; ?>" />
            <p itemprop="description" class="nodeImgfooter A15r0 prelative"><span class="icn-capital-white-wrapper"><span class="icn-capital-white"></span></span><?php echo $image['title'] ? $image['title'] : $node->title; ?></p>
        </div>
    <?php endif;?>
    <?php print render(module_invoke("imx_users","block_view","imx_users_profile_node"));?>
    <div class="nodeBody A21r0 lh30 mb30" itemprop="articleBody">
        <?php print render($content['body']); ?>
    </div>
</article>
