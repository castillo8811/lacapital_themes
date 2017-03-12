<?php
    $items=get_view_array("home_capital","stage","stage");
    $home_version=variable_get("lcpmx_home_version");

    switch($home_version){
        case "home_v1": $items_carrusel=array_slice($items,0,3); break;
        case "home_v2": $items_carrusel=null;break;
        case "home_v3": $items_carrusel=array_slice($items,0,1); break;

    }

?>
<?php if($items_carrusel):?>
<section id="stage" class="pall10 prelative">
    <?php if($home_version=="home_v1"):?>
        <span class="arrow-prev-b link"></span>
        <span class="arrow-next-b link"></span>
    <?php endif;?>
    <ul class="bxslider">
        <?php foreach($items_carrusel as $item):?>
        <li>
            <a href="<?php print $item["url"]?>">
                <img width="100%" height="450" src="<?php print $item["imagecarrusel"] ? $item["imagecarrusel"] : $item["image"]?>" title="<?php print $item["title"]?>" />
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</section>
<?php endif;?>

