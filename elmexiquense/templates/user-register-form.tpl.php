<?php

$form["account"]["name"]["#title"] = "";
$form["account"]["name"]["#description"]="";
$form["account"]["name"]['#attributes']["placeholder"] = "Tu nombre";

//$form["field_fecha_nacimiento"]["und"][0]["#title"]="";
$form["field_fecha_nacimiento"]["und"][0]["value"]["#instance"]["label"]="";
$form["field_fecha_nacimiento"]["und"][0]["value"]["date"]["#title"]="";
$form["field_fecha_nacimiento"]["und"][0]["value"]["date"]["#description"]="";
$form["field_fecha_nacimiento"]["#descripcion"]="";

$form["account"]["mail"]["#title"] = "";
$form["account"]["mail"]["#description"] = "";
$form["account"]["mail"]['#attributes']["placeholder"] = "Tu correo electrónico";

$form["account"]["pass"]["pass1"]["#title"] = "";
$form["account"]["pass"]["pass2"]["#title"] = "";
$form["account"]["pass"]["#description"] = "";
$form["account"]["pass"]["pass1"]['#attributes']["placeholder"] = "Contraseña";
$form["account"]["pass"]["pass2"]['#attributes']["placeholder"] = "Repite la contraseña";
$form["actions"]['submit']["#value"] = "Registrar";
$form["actions"]['submit']["#attributes"]["class"][] = "btn-registrar";
?>
<section id="userRegistrationWrapper">
    <section id="userRegistration">
        <h2 class="O60l0 tacenter mb30 header-register">¡Recibe La Capital en tu hogar, es gratis!</h2>
        <div class="userRegistrationForm tacenter">
            <span class="fieldset-title">Datos Personales</span>
            <?php print drupal_render_children($form); ?>
            <div class="clear">
        </div>
        <div class="userRegisterLegals tacenter centered mb40">
            <p class="A15r0 mb5 lh20">Al continuar, declaras que aceptas nuestro <a href="/aviso-privacidad">Aviso de privacidad</a>.</p>
            <p class="A15r0 lh20">Y quedarás suscrito al boletín de lacapitalmx.com y servicios, en caso de que no desees recibirlo podrás cancelarlo en cualquier momento.</p>
        </div>
    </section>
</section>

<script>
    jQuery(document).ready(
        function(){
            jQuery("#user-register-form").validate({
                onfocusout: function (element) {
                    jQuery(element).valid();
                },
                rules: {
                    name: {
                        required: true,
                    },
                    mail: {
                        required: true,
                        email: true,
                        remote: "/newsletter-modal/email-exists",
                    },
                    'field_fecha_nacimiento[und][0][value][day]':{
                        required: true,
                    },
                    'field_fecha_nacimiento[und][0][value][month]':{
                        required: true,
                    },
                    'field_fecha_nacimiento[und][0][value][year]':{
                        required: true,
                    },
                    'field_delegacion[und]': {
                        required: true,
                    },
                    'field_calle[und][0][value]': {
                        required: true,
                        minlength: 3,
                        maxlength: 120
                    },
                    'field_cp[und][0][value]': {
                        required: true,
                    },
                    'field_num_int[und][0][value]': {
                        required: true,
                    },
                    'field_num_ext[und][0][value]': {
                        required: true,
                    },
                },
                messages: {
                    required: "Campo obligatorio",
                    mail:
                    {
                        required: "Por favor ingresa un email.",
                        email: "Email invalido.",
                        remote: jQuery.validator.format("{0} ya se encuentra registrado.")
                    },
                    name: {
                        required: "Por favor ingresa tu nombre",
                        minlength: "Tu nombre debe ser mayor a 3 caracteres"
                    },
                    'field_fecha_nacimiento[und][0][value][day]':{
                        required: "Campo obligatorio.",
                    },
                    'field_fecha_nacimiento[und][0][value][month]':{
                        required: "Campo obligatorio.",
                    },
                    'field_fecha_nacimiento[und][0][value][year]':{
                        required: "Campo obligatorio.",
                    },
                    'field_delegacion[und]': {
                        required: "Campo obligatorio.",
                    },
                    'field_calle[und][0][value]': {
                        required: "Campo obligatorio.",
                        minlength: 3,
                        maxlength: 120
                    },
                    'field_cp[und][0][value]': {
                        required: "Campo obligatorio.",
                    },
                    'field_num_int[und][0][value]': {
                        required: "Campo obligatorio.",
                    },
                    'field_num_ext[und][0][value]': {
                        required: "Campo obligatorio.",
                    },
                }
            });
        });
</script>