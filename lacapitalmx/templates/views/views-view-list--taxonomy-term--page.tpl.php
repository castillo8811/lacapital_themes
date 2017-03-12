<?php
$term = taxonomy_term_load(arg(2));
?>
<section id="canalList" class="">
    <h2 itemprop="category" class="U26r0 mt20 upper tacenter">Más <?php echo $term->name?></h2>
    <div class="canalListNodes nodes-pair">
        <ul>
            <?php foreach ($view->result as $idx => $v):
                $images = isset($v->field_field_image) ? $v->field_field_image[0]["rendered"]["#item"]['uri'] : "";
                ?>
                <li class="bsbb col-3 pall15 left">
                    <article itemscope itemtype="http://schema.org/NewsArticle">
                        <div class="nodesList-img prelative">
                            <a href="<?php echo url('node/' . $v->nid) ?>">
                                <img class="img-fluid" width="440" height="250" itemprop="image" src="<?php print ($images) ? image_style_url('home_y_canales', $images) : "http://placehold.it/440x250"  ?>" alt="<?php echo $v->node_title ?>" />
                            </a>
                        </div>
                        <h1 itemprop="headline" class="mtb10">
                            <a href="<?php print url('node/' . $v->nid) ?>" class="O25r0"><?php echo $v->node_title ?></a>
                        </h1>
                    </article>
                </li>
                <?php if($idx==3):?>
                <li class="bsbb col-3 pall15 left" style="max-width:500px;max-height:294px;">
                    <div class="boxHome tacenter pal10" style="max-width:500px;max-height:294px;">
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- CAPMX 1 -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-3878010380895666"
                             data-ad-slot="1824526039"
                             data-ad-format="rectangle"></ins>
                        <script>
                            setTimeout(function(){(adsbygoogle = window.adsbygoogle || []).push({})}, 3000);
                        </script>
                    </div>
                </li>
            <?php endif?>
            <?php endforeach;?>
            <li class="clear"></li>
        </ul>
    </div>
</section>
<style>
    #main_container_left {
        width: 100%;
        padding-right: 0px;
    }
    #main_container_right {
        display: none;
    }
    .canalListNodes ul li:nth-child(2n+1) {
        clear: none !important;
    }

</style>