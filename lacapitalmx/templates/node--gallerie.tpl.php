<?php drupal_add_css(drupal_get_path('theme', 'lacapitalmx') . '/css/gallerie/garuyo_gallery.css'); ?>
<?php drupal_add_js(drupal_get_path('theme', 'lacapitalmx') . '/js/gallerie/galleria-1.2.9.min.js'); ?>
<?php drupal_add_js(drupal_get_path('theme', 'lacapitalmx') . '/js/gallerie/galleria.excelsior.js'); ?>
<?php
$nodo = entity_metadata_wrapper('node', $node);
$images = $nodo->field_images->value();
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>" itemscope="" itemtype="http://schema.org/NewsArticle">
    <header class="nodeHeader">
        <h1 itemprop="headline" class="O45r0 lh50 tacenter"><?php echo $node->title; ?></h1>
        <div class="A15r0 tacenter mb20"><?php echo date("d/m/y",$node->created); ?></div>
        <div class="nodeSocials tacenter prelative pt40 clear">
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_sharing_toolbox"></div>
        </div>
    </header>
    <div class="nodeImg tacenter centered mb20" itemprop="Thing">
        <div id="fotogaleria"></div>
        <?php foreach ($images as $idx => $item):?>
            <?php
            $data_source[] = array(
                "image" => image_style_url("large", $item["uri"]), 
                "description" => $item["alt"] . " " . $item["title"],
                "thumb" => image_style_url("medium", $item["uri"])
            );
            ?>
        <?php endforeach; ?>
        <script>
            <?php $data_source = json_encode($data_source);
            echo "var fotogaleria_data=" . $data_source.";" ?>
            Galleria.run('#fotogaleria', {
                responsive: true,
                debug: false,
                dataSource: fotogaleria_data
            });
        </script>
    </div>
    <?php print render(module_invoke("imx_users","block_view","imx_users_profile_node"));?>
    <div class="nodeBody A21r0 lh30 mb30" itemprop="articleBody">
        <?php print render($content['body']); ?>
    </div>
</article>
