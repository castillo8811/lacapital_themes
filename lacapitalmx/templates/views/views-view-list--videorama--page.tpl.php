<?php
$main = $view->result[0];
unset($view->result[0]);
$items = array_chunk($view->result, 6);
?>
<section id="canalList" class="">
    <div id="videoramaWrapper" class="tacenter mb20 mt30">
        <!--<span class="btn-videorama"></span>
        <h2 itemprop="category" class="U34r0 upper">Videorama</h2>-->
    </div>
    <div class="VideoramaVideo tacenter mb30">
        <iframe width="85%" height="420" type="text/html" src="http://www.youtube.com/embed/<?php echo $main->field_field_video_youtube[0]['rendered']['#video_id'] ?>?wmode=transparent&version=3&enablejsapi=1" frameborder="0" allowfullscreen=""></iframe>
        <h1 itemprop="headline" class="O30r0 mt20"><?php echo $main->node_title?></h1>
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
                                <a href="<?php echo url('node/' . $v->nid) ?>">
                                    <span class="paC icn-video"></span>
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
        </div>
    <?php endforeach; ?>
</section>