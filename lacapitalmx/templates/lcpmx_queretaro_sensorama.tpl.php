<?php
    $items=get_view_array("ciudad","sensorama_queretaro","home_y_canales");
    $items_sensorama=array_slice($items,0,5);
?>

<section id="sensorama" class="mtb30 pt30">
    <div class="titleBig prelative">
        <span class="bg-dotted"><span>Sensorama</span></span>
        <a href="/queretaro/sensorama"><h1 itemprop="headline" class="icn-sensorama mb10"></h1></a>
    </div>
    <div class="sensorama-notes">
        <ul>
            <?php foreach($items_sensorama as $idx=>$item):?>
                <li class="col-3 bsbb pl10 pr10 left mb20">
                    <div class="mirador-img prelative">
                        <a href="<?php print $item["url"]?>">
                            <img class="img-fluid" width="310" height="180" itemprop="image" src="<?php print $item["image"]?>" alt="" />
                        </a>
                    </div>
                    <h2 itemprop="headline" class="O25r0 lh30 mt10"><?php print $item["title"]?></h2>
                </li>
                <?php if($idx==3):?>
                    <li class="col-3 bsbb pl10 pr10 left mb20" style="max-width:500px;max-height:294px;">
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