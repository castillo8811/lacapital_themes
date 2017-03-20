<?php $items = $variables['items_lcpmx_mirador_page'];?>
<section id="mirador" class="mtb30">
    <!--<h1 itemprop="headline" class="mb10 tacenter"><span class="icn-mirador"></span></h1>-->
    <div class="mirador-notes-wrapper prelative mt10">
        <div class="mirador-page-notes nodesList listado-cuadricula">
            <ul>
                <?php foreach($items as $item):?>
                    <li class="col-3 bsbb pl10 pr10 left mb30">
                        <div class="mirador-img prelative">
                            <a target="_blank" class="dblock mirador-link" href="/<?php print $item["node_url"]?>">
                                <span class="helperArrow-2"></span>
                                <img class="img-fluid" width="100%" height="auto" itemprop="image" src="<?php print file_create_url($item['user_picture'])?>" alt="" />
                            </a>
                        </div>
                        <a class="O20l4 block" href="https://twitter.com/<?php print $item['twitter']; ?>" target="_blank"><?php echo $item['twitter'] ? $item['twitter'] : ''; ?></a><br>
                        <!--<span class="U20r0 mb20 block"><?php print $item['blog']?></span>-->
                        <h3 itemprop="name" class="mt10 upper">
                            <span class="O15r3">POR: </span> <a href="/<?php echo $item['user_url']?>" class="O15l6"><?php print $item['user_name']?></a>
                        </h3>
                        <a target="_blank" href="/<?php print $item["node_url"]?>">
                            <h2 itemprop="headline" class="O19r0 lh30 mt10"><?php print $item['node_title']?></h2>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</section>