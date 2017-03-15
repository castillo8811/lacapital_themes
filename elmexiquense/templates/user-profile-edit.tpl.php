<?php
//  print_r($form);exit;
drupal_add_js(drupal_get_path("theme","lacapitalmx")."/js/jquery.validate.min.js");
drupal_add_js(drupal_get_path("theme","lacapitalmx")."/js/additional-methods.js");
$form["picture"]['#title'] = "";
 hide($form["field_newsletter"]);
 hide($form["field_terminos_y_condiciones"]);
 hide($form["timezone"]);
 hide($form["locale"]);
//unset($form["picture"]["picture_delete"]);
//unset($form["picture"]["picture_upload"]['filename']["#markup"]);

$form["account"]['name']['#title'] = "Nombre de usuario";
$form["actions"]['submit']["#value"] = "Guardar cambios";
$form['actions']['submit']["#attributes"]["class"][] = "btn-vermas centered O40l1 link";
?>
<div class="limited">
    <div class="userProfileData ptb20 mt30 mb20" itemscope itemtype="http://schema.org/Person">
        <div class="userProfileData-img left cuad-2 tacenter">
            <?php print theme('user_picture', array('account' => $user, 'style_name' => '')) ?>
        </div>
        <div class="userProfileData-info right cuad-10 bsbb">
            <h4 itemprop="name" class="O30r0 mb20 icn-settings-b">Configuración</h4>
            <h5 class="N25b4">¡Hola <?php print ($user->name) ? $user->name : $user->mail ?>!</h5>
            <p itemprop="description" class="N18r0 mtb10">Esta sección es tuya, aquí encontrarás secciones para ofrecerte un mejor servicio.</p>
        </div>
        <div class="clear"></div>
    </div>
    <div class="userProfileData-Form N18r0 ptb20 mt30 mb20">
        <form id="<?php print $form['#id']?>" accept-charset="UTF-8" method="<?php print $form['#method']?>" action="<?php print $form['#action']?>" enctype="multipart/form-data">
            <div class="userProfileData-picture">
            <h3 class="O40r0 mb10">Mi foto</h3>
            <div class="cuad-3 left">
                <?php print drupal_render($form["picture"]['picture_current']); ?>
                <div class="description">
                    Tu imagen debe de:<br><br>
                    - Estar en formato JPG.<br><br>
                    - Pesar menos de 2MB
                </div>
            </div>
            <div class="cuad-9 bsbb pl10 left">
                <?php print drupal_render($form["picture"]['picture_upload']); ?>
                <?php print drupal_render($form["picture"]['picture_delete']); ?>
            </div>
            <div class="clear"></div>
             </div>
            <div class="userProfileData-name mt30">
                <h3 class="O40r0 mb10">Mis datos</h3>
                <?php print drupal_render($form["account"]['name']); ?>
                <?php print drupal_render($form["account"]['mail']); ?>
                <?php print drupal_render($form["account"]['pass']); ?>
                <?php print drupal_render($form["account"]['current_pass_required_values']); ?>
                <?php print drupal_render($form["account"]['current_pass']); ?>
            </div>
            <?php print drupal_render_children($form);?>
            </form>

    </div>
</div>