<?php
$form["name"]["#title"] = "";
$form["name"]["#description"] = "";
$form["name"]['#attributes']["placeholder"] = "Tu correo electrónico";

$form["pass"]["#title"] = "";
$form["pass"]["#description"] = "";
$form["pass"]['#attributes']["placeholder"] = "Contraseña";

$form["actions"]['submit']["#value"] = "Iniciar sesión";
$form["actions"]['submit']["#attributes"]["class"][] = "btn-login";

?>
<section id="userRegistrationWrapper">
    <div class="limited">
        <section id="userLogin">
            <h2 class="O60l0 tacenter mb30">Inicia sesión</h2>
            <div class="userLoginForm tacenter">
                <?php print drupal_render_children($form) ?>
            </div>
            </form>
        </section>
</section>