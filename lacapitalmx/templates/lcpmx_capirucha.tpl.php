<?php
    $items = $variables['items_lcpmx_capirucha'];
    $items['sensorama']=array_slice($items['sensorama'],0,3);
    $box1=get_lcmx_banner("box");
    $box2=get_lcmx_banner("box");
    $box3=get_lcmx_banner("box");

?>
<div class="boxHome tacenter pal10">
    <div class="boxHome tacenter pal10">
        <a href="http://cabosfilmfestival.com/es/boletos/" target="_blank">
            <img width="300"  itemprop="image" src="/sites/all/themes/lacapitalmx/images/box_cabos_festival.jpg" alt="" />
        </a>
    </div>
</div>

<?php if(count($items['capirucha']) && false):?>
    <section id="capirucha" class="pall10">
        <a href="/capirucha"><h1 itemprop="headline" class="icn-capirucha mb10 mt40"></h1></a>
        <?php foreach($items['capirucha'] as $capi):?>
            <a href="/capirucha"><img width="300" height="380" itemprop="image" src="<?php print $capi['image'] ? image_style_url('capirucha_v', $capi['image']) : "http://placehold.it/300x380"; ?>" alt="" /></a>
        <?php endforeach;?>
    </section>
<?php endif;?>
<?php if(count($items['sensorama'])):?>
    <section id="sensorama" class="pall10">
        <ul>
            <?php foreach($items['sensorama'] as $key=>$sens):?>
                <li class="pal10 mtb20">
                    <a href="<?php echo url('node/' . $sens['nid']) ?>">
                        <img width="300" height="200" itemprop="image" src="<?php print $sens['image'] ? image_style_url('home_y_canales', $sens['image']) : "http://placehold.it/300x200"; ?>" alt="<?php echo $sens['title']?>" />
                    </a>
                    <a href="<?php echo url('node/' . $sens['nid']) ?>">
                        <h1 itemprop="headline" class="O21r0 lh24"><?php echo $sens['title']?></h1>
                    </a>
                </li>
                <?php if($key==0):?>
                    <div class="boxHome tacenter pal10 " style="border: solid 1px grey">
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
                <?php elseif($key==1):?>
                    <div class="boxHome tacenter pal10">
                        <div class="boxHome tacenter pal10">
                            <a href="http://portal.infonavit.org.mx/wps/wcm/connect/infonavit/inicio" target="_blank">
                                <img width="300"  itemprop="image" src="/sites/all/themes/lacapitalmx/images/box_infonavit.jpg" alt="" />
                            </a>
                        </div>
                    </div>
                <?php endif;?>
            <?php endforeach;?>
        </ul>
    </section>
<?php endif;?>
<div class="boxHome tacenter">
    <a href="http://www.politico.mx" target="_blank">
        <img width="300" height="250" itemprop="image" src="/sites/all/themes/lacapitalmx/images/box_7.jpg" alt="" />
    </a>
</div>
