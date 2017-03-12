<?php
    $items=get_view_array("home_capital","stage");
    $items_carrusel=array_slice($items,3,6);
    $home_version=variable_get("lcpmx_home_version");

    switch($home_version){
        case "home_v1": $items_carrusel=array_slice($items,3,6); break;
        case "home_v2": $items_carrusel=array_slice($items,0,6); break;
        case "home_v3": $items_carrusel=array_slice($items,2,3);break;
    }
?>
<section id="starredHome">
    <ul>
        <?php foreach($items_carrusel as $index=>$item):?>
        <li class="col-3 bsbb pl10 pr10 mb20 left">
            <article itemscope itemtype="http://schema.org/NewsArticle">
                <div class="nodesList-img prelative">
                    <a href="<?php print $item["url"]?>">
                        <?php if($item['type'] == 'gallerie' || $item['type'] == 'video'):?>
                            <span class="icn-<?php echo $item['type']?> paC"></span>
                        <?php endif;?>
                        <img class="img-fluid" width="440" height="250" itemprop="image" src="<?php print $item["image"]?>" alt="<?php print $item["title"]?>" />
                    </a>
                </div>
                <h1 itemprop="headline" class="">
                    <a href="<?php print $item["url"]?>" class="O20l0 bold"><?php print $item["title"]?></a>
                </h1>
            </article>
        </li>
        <?php endforeach; ?>
    </ul>
</section>