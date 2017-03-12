<?php
$tid = (int) arg(2);
$term = taxonomy_term_load($tid);
$vid = $term->vid;
if($vid != 12):?>
    <?php
    drupal_add_js(array('infinite_taxonomy' => array('category' => $tid)), 'setting');
    drupal_add_css(drupal_get_path('theme', 'lacapitalmx') . '/js/infiniteScroll/IMXScroll.css');
    drupal_add_js(drupal_get_path('theme', 'lacapitalmx') . '/js/infiniteScroll/handlebars-v1.3.0.js', array('scope' => 'header', 'weight' => -2));
//    drupal_add_js(drupal_get_path('theme', 'lacapitalmx') . '/js/infiniteScroll/jquery.ImxInfiniteScroll.plugin-v2.0.min.js', array('scope' => 'header', 'weight' => -1));
    drupal_add_js(drupal_get_path('theme', 'lacapitalmx') . '/js/infiniteScroll_ajax_tax.js', array('scope' => 'header', 'weight' => 0));
    ?>
    <section class="nodesList listado-cuadricula limited">
        <ul id="infiniteAds">
            <li id="imx_ads_block_home_2" class="col-3 bsbb pl10 mt30 tacenter pr5 mb20 left"></li>
            <?php
            foreach ($view->result as $idx => $v):
                $ocio = isset($v->field_field_ocio[0]) ? $v->field_field_ocio[0]["raw"]["tid"] : "";
                $images = isset($v->field_field_image) ? $v->field_field_image[0]["rendered"]["#item"]['uri'] : "";
                $categoria = isset($v->field_field_categoria) ? $v->field_field_categoria[0]["raw"]["taxonomy_term"]->name : "";
                $body_sumary = isset($v->field_body) ? $v->field_body[0]["raw"]["summary"] : "";
                $votos = isset($v->field_field_votos) ? $v->field_field_votos[0]["raw"]["average"] : "";
                ?>
                <li class="col-3 bsbb pl10 mt30 pr5 mb20 left">
                    <article itemscope itemtype="http://schema.org/NewsArticle">
                        <div class="nodesList-img prelative">
                            <div class="nodesList-tools <?php echo ($ocio == 305787) ? "bg-ocio-calle" : " bg-ocio-sillon" ?>">
                                <div class="nodesList-section <?php echo ($ocio == 305787) ? "pleca-ocio-calle-s" : "pleca-ocio-sillon-s" ?>"></div>
                                <?php if ($user->uid): ?>
                                    <span title="Agregar a favoritos" id="<?php echo $v->nid ?>" class="icn-pin imx-mark-pin-favorites right link mr10 imx_mark" data-mark-nid="<?php echo $v->nid ?>" data-mark-status="0" data-mark-type="1"></span>
                              <?php else:?>
                            <span title="Agregar a favoritos" id="<?php echo $v->nid ?>" class="icn-pin no-sesion right link mr10" data-mark-nid="<?php echo $v->nid ?>" data-mark-status="0" data-mark-type="1"></span>
                            <?php endif;?>
                            </div>
                            <a href="<?php echo url('node/' . $v->nid) ?>">
                                <img itemprop="image" class="lazy-garuyo"  data-original="<?php print ($images) ? image_style_url('home_y_canales', $images) : "http://placehold.it/440x250"  ?>" alt="<?php echo $v->node_title ?>" />
                            </a>
                            <div class="nodesList-ranking  <?php echo ($ocio == 305787) ? "bg-ocio-calle-o" : "bg-ocio-sillon-o" ?>">
                                <span class="stars-<?php echo ceil((($votos) / 2) / 10) ?>"></span>
                            </div>
                        </div>
                        <div itemprop="keywords" class="N16b4 mt5">
                            <?php if ($categoria): ?>
                                <a href="<?php echo url('taxonomy/term/' . $v->field_field_categoria[0]["raw"]["tid"]) ?>" class="N16b4"><?php echo strtolower($categoria) ?></a>
                            <?php endif; ?>
                            <?php foreach ($v->field_field_categoria_secundaria as $t): ?>
                                |<a href="<?php echo url('taxonomy/term/' . $t["raw"]["tid"]) ?>" class="N16b4"><?php echo strtolower($t["raw"]["taxonomy_term"]->name) ?></a>
                            <?php endforeach; ?>
                        </div>
                        <h1 itemprop="headline" class="mtb10">
                            <a href="<?php print url('node/' . $v->nid) ?>" class="O25r0"><?php echo $v->node_title ?></a>
                        </h1>
                        <p itemprop="description" class="N18r0 lh22"><?php print $body_sumary ?></p>
                    </article>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="clear"></div>
    </section>
<?php endif;?>
