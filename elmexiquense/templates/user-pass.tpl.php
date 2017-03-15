<?php
$form["name"]["#title"] = "";
$form["name"]["#description"] = "";
$form["name"]['#attributes']["placeholder"] = "Tu correo electrónico";

$form["actions"]['submit']["#value"] = "Enviar";
$form["actions"]['submit']["#attributes"]["class"][] = "btn-vermasAzul centered O40l1 link";
?>
<section id="userRegistrationWrapper">
    <section id="userRegistration">
        <h2 class="O60l0 tacenter mb30">¿Olvidaste tu contraseña?</h2>
        <div class="userRegisterLegals tacenter centered mt40 mb40">
            <p class="N18r0 mt10 lh22">Por favor escribe tu dirección de correo al que enviaremos un enlace para que puedas reestablecer tu contraseña.</p>
        </div>
        <div class="userRegistrationForm tacenter">
            <?php print drupal_render_children($form); ?>
        </div>
    </section>
</section>