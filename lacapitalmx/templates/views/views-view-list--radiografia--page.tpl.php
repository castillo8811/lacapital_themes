<?php
$main = $view->result[0];
unset($view->result[0]);
$items = array_chunk($view->result, 6);
?>
<section id="canalList" class="">
    <div id="capiruchaWrapper" class="tacenter mb20">
        <span class="btn-capirucha"></span>
        <h2 itemprop="category" class="U24r0 upper">#Radiografía</h2>
    </div>
    <div class="capiruchaMain mb30">
        <div class="nodeImg tacenter centered mb20" itemprop="Thing">
            <img itemprop="image" src="<?php print $main->field_field_image[0]["rendered"]["#item"]['uri'] ? image_style_url('large', $main->field_field_image[0]["rendered"]["#item"]['uri']) : "http://placehold.it/680x510"; ?>" width="680" alt="<?php echo $main->node_title?>" />
            <p itemprop="description" class="nodeImgfooter A15r0 prelative"><span class="icn-capital-white-wrapper"><span class="icn-capital-white"></span></span><?php echo $main->node_title?></p>
        </div>
        <div class="nodeBody A21r0 lh30 mb30" itemprop="articleBody">
            <?php print render($main->field_body); ?>
        </div>
    </div>
    <?php foreach($items as $item):?>
        <div class="nodesList listado-cuadricula limited">
            <ul>
                <?php foreach ($item as $idx => $v):
                    $images = isset($v->field_field_image) ? $v->field_field_image[0]["rendered"]["#item"]['uri'] : "";
                    ?>
                    <li class="col-3 bsbb pl10 mt30 pr5 mb20 left">
                        <article itemscope itemtype="http://schema.org/NewsArticle">
                            <div class="nodesList-img prelative">
                                <img class="img-fluid" width="239" height="299" itemprop="image" src="<?php print ($images) ? image_style_url('large', $images) : "http://placehold.it/440x250"  ?>" alt="<?php echo $v->node_title ?>" />
                            </div>
                            <h1 itemprop="headline" class="mtb10 O25r0 tacenter">#Radiografia</h1>
                            <span itemprop="headline" class="mtb10 O21r0 tacenter dblock"><?php print date("d/m/Y",$v->node_created)?></span>
                        </article>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="clear"></div>
        </div>
    <?php endforeach; ?>
</section>