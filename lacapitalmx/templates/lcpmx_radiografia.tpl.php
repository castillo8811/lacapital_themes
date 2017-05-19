<?php

$items=get_view_array("home_capital","mirador","home_y_canales");
$items_mirador=array_slice($items,0,6);
$items=get_view_array("home_capital","sensorama","home_y_canales");
$items_sensorama=array_slice($items,0,5);

$items=get_view_array("home_capital","subterraneo","home_y_canales");
$items_subterraneo=array_slice($items,0,5);

$items=get_view_array("home_capital","interversiones","home_y_canales");
$items_interversiones=array_slice($items,0,5);

$item_sismo=get_view_array("home_capital","tenemo_sismo","sismo");

$super=get_lcmx_banner("super");
?>

<section id="mirador" class="mtb30 pall15">
    <div class="titleBig prelative">
        <span class="bg-dotted"><span>Mirador</span></span>
        <a href="/mirador"><h1 itemprop="headline" class="icn-mirador mb10"></h1></a>
    </div>
    <div class="mirador-notes-wrapper prelative clear">
        <div class="mirador-notes">
            <ul>
                <?php foreach($items_mirador as $item):?>
                <li class="col-2 bsbb pl10 pr10 left">
                    <div class="prelative">
                        <span class="helperArrow-2"></span>
                        <a class="dblock mirador-link" href="<?php print $item["url"]?>">
                            <img class="img-fluid" width="440" height="250" itemprop="image" src="<?php print $item["user_image"]?>" alt="" />
                        </a>
                        <div class="cuad-12 bsbb right mirador-center">
                            <span class="O15l6"><?php print $item["colaborador"]?></span>
                        </div>
                        <h2 itemprop="headline" class="mt10"><a class="O18l0" href="<?php print $item["url"]?>"><?php print strip_tags($item["title"])?></a></h2>
                    </div>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</section>

<section id="banner-section">
    <div class="tacenter pal15 left">
        <div class="boxHome pal10">
            <a href="https://www.bikefestxpo.com/" target="_blank">
                <img width="300"  itemprop="image" src="/sites/all/themes/lacapitalmx/images/bike_fest.jpg" alt="" />
            </a>
        </div>
    </div>
    <div class="tacenter pal15 left">
        <div class="boxHome pal10">
            <a href="http://reinserta.org/" target="_blank">
                <img width="300"  itemprop="image" src="/sites/all/themes/lacapitalmx/images/reinserta.jpg" alt="" />
            </a>
        </div>
    </div>
    <div class="tacenter pal15 left">
        <div class="pal10 boxHome ">
            <a href="http://www.adn40.mx/" target="_blank">
                <img width="300"  itemprop="image" src="/sites/all/themes/lacapitalmx/images/esnoticia.jpg" alt="" />
            </a>
        </div>
    </div>
    <div class="clear"></div>
</section>
<section>
    <?php
        $block = module_invoke('imx_newsletter_modal', 'block_view', 'lcpmx_newsletter_block');
        print render($block['content']);
    ?>
</section>
<section id="subterraneo" class="pall15 pt30 ">
    <div class="titleBig prelative">
        <span class="bg-dotted"><span>Subterráneo</span></span>
        <a href="/subterraneo"><h1 itemprop="headline" class="icn-subterraneo mb10"></h1></a>
    </div>
    <div class="subterraneo-notes">
        <ul>
            <?php foreach($items_subterraneo as $index=>$item):?>
                <li class="col-3 bsbb pl10 pr10 left mb20">
                    <div class="subterraneo-img nodesList-img prelative">
                        <a href="<?php print $item["url"]?>">
                            <img class="img-fluid" width="440" height="250" itemprop="image" src="<?php print $item["image"]?>" alt="" />
                        </a>
                    </div>
                    <a href="<?php print $item["url"]?>">
                        <h2 itemprop="headline" class="O20l0 bold  mt10"><?php print strip_tags($item["title"])?></h2>
                    </a>
                </li>
                <?php if($index==3):?>
                    <li class="col-3 bsbb pl10 pr10 left mb20">
                        <div class="boxHome tacenter pal10 ">
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- CAPMX 1 -->
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-client="ca-pub-3878010380895666"
                                 data-ad-slot="1824526039"
                                 data-ad-format="rectangle"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                    </li>
                <?php endif;?>
            <?php endforeach;?>
            <li class="clear"></li>
        </ul>
    </div>
</section>

<section id="sensorama" class="pall15 pt30">
    <div class="titleBig prelative bgorange">
        <span class="bg-dotted"><span>Sensorama</span></span>
        <a href="/sensorama"><h1 itemprop="headline" class="icn-sensorama mb10"></h1></a>
    </div>
    <div class="sensorama-notes">
        <ul>
            <?php foreach($items_sensorama as $index=>$item):?>
                <li class="col-3 bsbb pl10 pr10 left mb20">
                    <div class="mirador-img nodesList-img prelative">
                        <a href="<?php print $item["url"]?>">
                            <img class="img-fluid" width="440" height="250" itemprop="image" src="<?php print $item["image"]?>" alt="" />
                        </a>
                    </div>
                    <a href="<?php print $item["url"]?>">
                        <h2 itemprop="headline" class="O20l0 bold  mt10"><?php print strip_tags($item["title"])?></h2>
                    </a>
                </li>
                <?php if($index==3):?>
                    <li class="col-3 bsbb pl10 pr10 left mb20">
                        <div class="boxHome tacenter pal10 ">
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- CAPMX 1 -->
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-client="ca-pub-3878010380895666"
                                 data-ad-slot="1824526039"
                                 data-ad-format="rectangle"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                    </li>
                <?php endif;?>
            <?php endforeach;?>
            <li class="clear"></li>
        </ul>
    </div>
</section>

<section id="intervensiones" class="pall15 pt30">
    <div class="titleBig prelative">
        <span class="bg-dotted"><span>Arterias</span></span>
        <a href="/interversiones"><h1 itemprop="headline" class="icn-inter-vensiones mb10"></h1></a>
    </div>
    <div class="intervensiones-notes">
        <ul>
            <?php foreach($items_interversiones as $index=>$item):?>
                <li class="col-3 bsbb pl10 pr10 left mb20">
                    <div class="mirador-img nodesList-img prelative">
                        <a href="<?php print $item["url"]?>">
                            <img class="img-fluid" width="440" height="250" itemprop="image" src="<?php print $item["image"]?>" alt="" />
                        </a>
                    </div>
                    <a href="<?php print $item["url"]?>">
                        <h2 itemprop="headline" class="O20l0 bold  mt10"><?php print strip_tags($item["title"])?></h2>
                    </a>
                </li>
                <?php if($index==3):?>
                    <li class="col-3 bsbb pl10 pr10 left mb20">
                        <div class="boxHome tacenter pal10 ">
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- CAPMX 1 -->
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-client="ca-pub-3878010380895666"
                                 data-ad-slot="1824526039"
                                 data-ad-format="rectangle"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                    </li>
                <?php endif;?>
            <?php endforeach;?>
            <li class="clear"></li>
        </ul>
    </div>
</section>
