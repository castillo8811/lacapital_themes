<?php
$items=get_view_array("home_capital","interversiones","home_y_canales");
$items_interversiones=array_slice($items,0,5);
?>
<section id="intervensiones" class="mtb30">
    <div class="titleBig prelative">
        <span class="bg-dotted"><span>Arterias</span></span>
        <a href="/interversiones"><h1 itemprop="headline" class="icn-inter-vensiones mb10"></h1></a>
    </div>
    <div class="intervensiones-notes">
        <ul>
            <?php foreach($items_interversiones as $idx=>$item):?>
                <li class="col-3 bsbb pl10 pr10 left mb20">
                    <div class="mirador-img nodesList-img prelative">
                        <a href="<?php print $item["url"]?>">
                            <img class="img-fluid" width="440" height="187" itemprop="image" src="<?php print $item["image"]?>" alt="" />
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