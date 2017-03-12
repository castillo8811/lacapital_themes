<?php
$tid = (int) arg(2);
$term = taxonomy_term_load($tid);?>
<section class="nodesList listado-cuadricula limited">
    <!--<h1 itemprop="headline" class="mb10 tacenter"><span class="icn-<?php echo  string_to_slug_lcmx($term->name)?> w60pxi"></span></h1>
    <h2 itemprop="category" class="U34r0 upper tacenter"><?php echo $term->name?></h2>-->
    <ul>
        <?php foreach ($view->result as $idx => $v):
            $images = isset($v->field_field_image) ? $v->field_field_image[0]["rendered"]["#item"]['uri'] : "";
            ?>
            <li class="col-3 bsbb pl10 mt30 pr5 mb20 left">
                <article itemscope itemtype="http://schema.org/NewsArticle">
                    <div class="nodesList-img prelative">
                        <a href="<?php echo url('node/' . $v->nid) ?>">
                            <span class="paC icn-<?php echo $v->node_type?>"></span>
                            <img class="img-fluid" width="440" height="250" itemprop="image" src="<?php print ($images) ? image_style_url('home_y_canales', $images) : "http://placehold.it/440x250"  ?>" alt="<?php echo $v->node_title ?>" />
                        </a>
                    </div>
                    <h1 itemprop="headline" class="mtb10">
                        <a href="<?php print url('node/' . $v->nid) ?>" class="O25r0"><?php echo $v->node_title ?></a>
                    </h1>
                </article>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="clear"></div>
</section>
