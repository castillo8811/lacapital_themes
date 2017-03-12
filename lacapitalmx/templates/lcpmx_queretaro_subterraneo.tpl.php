<?php
$items=get_view_array("ciudad","subterraneo_queretaro","home_y_canales");
$items_subterraneo=array_slice($items,0,5);
?>

<section id="subterraneo" class="mtb30 pt30">
    <div class="titleBig prelative">
        <span class="bg-dotted"><span>Subterráneo</span></span>
        <a href="/queretaro/subterraneo"><h1 itemprop="headline" class="icn-subterraneo mb10"></h1></a>
    </div>
    <div class="subterraneo-notes">
        <ul>
            <?php foreach($items_subterraneo as $idx=>$item):?>
                <li class="col-3 bsbb pl10 pr10 left mb20">
                    <div class="subterraneo-img prelative">
                        <a href="<?php print $item["url"]?>">
                            <img class="img-fluid" width="310" height="180" itemprop="image" src="<?php print $item["image"]?>" alt="" />
                        </a>
                    </div>
                    <a href="<?php print $item["url"]?>">
                        <h2 itemprop="headline" class="O25r0 lh30 mt10"><?php print $item["title"]?></h2>
                    </a>
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