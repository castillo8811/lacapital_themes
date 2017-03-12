<?php
$items=get_view_array("home_capital","mirador","home_y_canales");
$items_mirador=array_slice($items,0,3);
?>
<section id="mirador" class="mtb30">
    <a href="/mirador"><h1 itemprop="headline" class="icn-mirador mb10"></h1></a>
    <div class="mirador-notes-wrapper prelative mt10">
        <span class="arrow-next-s link"></span>
        <div class="mirador-notes">
            <ul>
                <?php foreach($items_mirador as $item):?>
                <li class="col-3 bsbb pl10 pr10 left">
                    <div class="mirador-img prelative">
                        <a href="<?php print $item["url"]?>">
                            <img class="img-fluid" width="310" height="180" itemprop="image" src="<?php print $item["image"]?>" alt="" />
                        </a>
                    </div>
                    <h2 itemprop="headline" class="O25r0 lh30 mt10"><?php print $item["title"]?></h2>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
        <span class="arrow-prev-s link"></span>
    </div>
</section>