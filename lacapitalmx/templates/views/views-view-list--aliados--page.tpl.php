<?php // print_r($view);exit;?>
<div class="region">
    <section id="aliados">
        <div class="seriesTitle prelative tacenter mb20">
            <span class="seriesLine"></span>
            <span class="pleca-Aliados-b"></span>
        </div>
        <ul>
            <?php foreach($view->result as $u): ?>
             <?php
                
                $data_user = user_load($u->uid);
                $editor_profile = profile2_load_by_user($u->uid, "editor");
                $image_profile ="";
                if ($data_user->picture->uri) {
                    $image_profile = image_style_url("listado_aliados", $data_user->picture->uri);
                } else {                    
                    if ($editor_profile->field_profile_background["und"][0]["uri"]) {
                        $image_profile = image_style_url("listado_aliados", $editor_profile->field_profile_background["und"][0]["uri"]);
                    }
                }
                ?>
            <li class="col-3 bsbb pl10 mt30 pr5 mb20 left">
                <article itemscope itemtype="http://schema.org/Person">
                    <a href="<?php echo url("user/".$u->uid)?>">
                        <img itemprop="image" src="<?php echo ($image_profile)? $image_profile: drupal_get_path("theme", "lacapitalmx")."/images/aliados_default.png" ?>" alt="<?php echo $data_user->name?>" />
                    </a>
                    <h2 class="N16b4 mtb10" itemprop="name"><?php echo $data_user->name?></h2>
                    <p class="N14r0 lh18"><?php echo ($editor_profile->field_review)? $editor_profile->field_review["und"][0]["value"] :$data_user->name?></p>
                </article>
            </li>
            
            <?php endforeach;?>
        </ul>
        <!--<div class="clear"></div>-->
        <!--<a href="#" class="O40l1 btn-vermas centered mt20 mb20"><span>VER MÁS</span></a>-->
    </section>
</div>