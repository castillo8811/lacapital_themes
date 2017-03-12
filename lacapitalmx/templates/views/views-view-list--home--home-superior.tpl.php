<section class="nodesList listado-cuadricula limited">
    <ul>
        <?php
        foreach ($view->result as $idx => $v):
            $ocio = isset($v->field_field_ocio[0]) ? $v->field_field_ocio[0]["raw"]["tid"] : "";
            $images = isset($v->field_field_image) ? $v->field_field_image[0]["rendered"]["#item"]['uri'] : "";
            $categoria = isset($v->field_field_categoria) ? $v->field_field_categoria[0]["raw"]["taxonomy_term"]->name : "";
            $body_sumary = isset($v->field_body) ? $v->field_body[0]["raw"]["summary"] : "";
            $votos = isset($v->field_field_votos) ? $v->field_field_votos[0]["raw"]["average"] : "";
            ?>
            <?php if ($idx == 3): ?>
                <li id="imx_ads_block_1" class="col-3 bsbb pl10 mt30 tacenter pr5 mb20 left">
                </li>
            <?php endif; ?>
            <li class="col-3 bsbb pl10 mt30 pr5 mb20 left">
                <article itemscope itemtype="http://schema.org/NewsArticle">
                    <div class="nodesList-img prelative">
                        <div class="nodesList-tools <?php echo ($ocio == 305787) ? "bg-ocio-calle" : " bg-ocio-sillon" ?>">
                            <div class="nodesList-section <?php echo ($ocio == 305787) ? "pleca-ocio-calle-s" : "pleca-ocio-sillon-s" ?>"></div>
                            <?php if($user->uid>0):?>
                            <span title="Agregar a favoritos" id="<?php echo $v->nid ?>" class="icn-pin imx-mark-pin-favorites right link mr10 imx_mark" data-mark-nid="<?php echo $v->nid ?>" data-mark-status="0" data-mark-type="1"></span>
                            <?php else:?>
                            <span title="Agregar a favoritos" id="<?php echo $v->nid ?>" class="icn-pin no-sesion right link mr10" data-mark-nid="<?php echo $v->nid ?>" data-mark-status="0" data-mark-type="1"></span>
                            <?php endif;?>
                        </div>
                        <a href="<?php echo url('node/' . $v->nid,array('absolute' => true)) ?>">
                            <img itemprop="image" src="<?php print ($images) ? image_style_url('home_y_canales', $images) : "http://placehold.it/440x250"  ?>" alt="<?php echo $v->node_title ?>" />
                        </a>
                        <div class="nodesList-ranking  <?php echo ($ocio == 305787) ? "bg-ocio-calle-o" : "bg-ocio-sillon-o" ?>">
                            <span class="stars-<?php echo ceil((($votos) / 2) / 10) ?>"></span>
                        </div>
                    </div>
                    <div itemprop="keywords" class="N16b4 mt5">
                        <?php if ($categoria): ?>
                            <a href="<?php echo url('taxonomy/term/' . $v->field_field_categoria[0]["raw"]["tid"],array('absolute' => true)) ?>" class="N16b4"><?php echo strtolower($categoria) ?></a>
                        <?php endif; ?>
                        <?php foreach ($v->field_field_categoria_secundaria as $t): ?>
                            |<a href="<?php echo url('taxonomy/term/' . $t["raw"]["tid"],array('absolute' => true)) ?>" class="N16b4"><?php echo strtolower($t["raw"]["taxonomy_term"]->name) ?></a>
                         <?php endforeach; ?>
                    </div>
                    <h1 itemprop="headline" class="mtb10">
                        <a href="<?php print url('node/' . $v->nid,array('absolute' => true)) ?>" class="O25r0"><?php echo $v->node_title ?></a>
                    </h1>
                    <p itemprop="description" class="N18r0 lh22"><?php print $body_sumary ?></p>
                </article>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="clear"></div>
</section>
