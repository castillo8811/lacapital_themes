<?php
$nodo = entity_metadata_wrapper('node', $node);
$image = $nodo->field_image->value();
?>
<article itemscope itemtype="http://schema.org/NewsArticle">
    <header class="nodeHeader">
        <h1 itemprop="headline" class="O45r0 lh50 mb20 tacenter"><?php echo $node->title; ?></h1>
        <div class="A15r0 tacenter mb20"><?php echo date("d/m/y",$node->created); ?></div>
    </header>
    <div class="nodeImg tacenter centered mb20" itemprop="Thing">
        <img itemprop="image" src="<?php print $image['uri'] ? image_style_url('large', $image['uri']) : "http://placehold.it/680x510"; ?>" width="680" height="510" alt="<?php echo $image['alt'] ? $image['alt'] : $node->title; ?>" />
        <p itemprop="description" class="nodeImgfooter A15r0 prelative"><span class="icn-capital-white-wrapper"><span class="icn-capital-white"></span></span><?php echo $image['title'] ? $image['title'] : $node->title; ?></p>
    </div>
    <?php print render(module_invoke("imx_users","block_view","imx_users_profile_node"));?>
    <div class="nodeSocials tacenter prelative pt40 clear">
        <span class="icn-share"></span>
        <span class="O24r0 left">Comparte con tus amigos:</span>
        <ul class="share-area">
            <li class="diblock mr20"><div class="fb-share-button" data-href="<?php url("node/{$node->nid}")?>" data-layout="button"></div></li>
            <li class="diblock mr20"><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php url("node/{$node->nid}")?>" data-text="<?php $node->title?>" data-via="LaCapital_">Tweet</a></li>
            <li class="diblock mr20">
                <div class="wh-share">
                    <a href="whatsapp://send?text=Vía La Capital <?php print urlencode(url("node/{$node->nid}",array('absolute' => TRUE)))?>" data-action="share/whatsapp/share">
                        <img class="wh-logo" src="http://www.lacapitalmx.com/sites/all/themes/lacapitalmx_d7_responsive/lacapitalmx/images/whatsapp-icon.png" />
                    </a>
                </div>
            </li>

            <li class="diblock"><div class="g-plusone" data-href="<?php url("node/{$node->nid}")?>" data-size="medium" data-annotation="bubble"></div></li>
        </ul>
    </div>
</article>
