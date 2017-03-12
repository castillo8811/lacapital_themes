<?php
    global $theme;
    $ciudad="";
    $site='La Capital';
    if($theme=="elqueretano"){
        $site='El Queretano';
    }
    $items = $variables['items_lcpmx_footer'];
    $logo="/sites/all/themes/{$theme}/images/logo_c.png";
?>

<section>
    <div class="footer-amp">
        <ul class="menu-bottom-amp">
            <li class="first leaf"><a href="/<?php print $ciudad?>" class="active">Inicio</a></li>
            <li class="leaf"><a href="http://www.lacapitalmx.com/mirador" title="">Mirador</a></li>
            <li class="leaf"><a href="http://www.lacapitalmx.com/<?php print $ciudad?>trafico" title="">Tráfico</a></li>
            <li class="leaf"><a href="http://www.lacapitalmx.com/<?php print $ciudad?>subterraneo" title="">Subterráneo</a></li>
            <li class="leaf"><a href="http://www.lacapitalmx.com/<?php print $ciudad?>sensorama" title="">Sensorama</a></li>
            <li class="leaf"><a href="http://www.lacapitalmx.com/<?php print $ciudad?>random" title="">Random</a></li>
        </ul>
    </div>
</section>
<section id="footerGen">
    <div class="limited centered prelative">
        <ul class="tacenter">
                    <?php foreach($items as $title => $path):?>
                        <li class="mr50 bsbb left pt20">
                            <a class="O18lf transitionColor" href="/<?php echo $path?>"><?php echo $title?></a>
                        </li>
                    <?php endforeach;?>
                     <?php if($theme!="elqueretano"):?>
                        <li class="mr30 bsbb left pt20">
                            <a class="O18lf transitionColor" href="/user/register">Recibe La Capital en tu casa</a>
                        </li>
                    <?php endif?>
                    <li class="clear"></li>

        </ul>
        <div class="copyright ptb20 O13r6 mt20 tacenter">
            <img src="<?php print $logo?>" />
            <span class="dblock mt10">&copy; <?php echo date('Y', time())?> - <?php print $site ?></span>
        </div>
    </div>
</section>