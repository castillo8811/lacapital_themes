<?php global $user;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Garuyo.com | Ocio sin perder el tiempo</title>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta name="copyright" content="© Inventmx"/>
        <meta name="google-site-verification" content="dwIQ1F5jK_41_-y9lVVTCoJlTfCtALz9xagPjDUEoyw" />
        <meta name="revisit-after" content="1 day" />
        <link rel="canonical" href="http://www.garuyo.com/" />
        <meta name="description" content="Garuyo es el único portal de ocio y entretenimiento personalizado de Mexico. ¡Hazlo tuyo! Información de música, conciertos, deportes, eventos en México y el DF." />
        <meta property='og:title' content='Garuyo.com' />
        <meta property='og:image' content='http://www.garuyo.com/images/logo_chico.jpg' />
        <meta property='og:description' content='El sitio con noticias de entretenimiento y ocio que se adapta a tus gustos e intereses. Directorio de restaurantes, antros, bares, museos, talleres, conciertos exhibiciones, cartelera de cine, exposiciones, noticias y todo lo que necesitas para tu tiempo libre.' />
        <meta property='og:url' content='http://www.garuyo.com' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,width=device-width,height=device-height,target-densitydpi=device-dpi,user-scalable=yes" />
        <meta name="viewport" content="initial-scale=1.0,width=device-width,user-scalable=0" />
        <meta name="viewport" content="initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,width=device-width,user-scalable=no" />
        <meta name="viewport" content="width=620, user-scalable=no" />
        <meta name="viewport" content="initial-scale=1.0,width=device-width,user-scalable=0, minimal-ui" />
        <style type="text/css">
            html {font-size: 62.5%;} 
            body{
                background-color: #FFF;
                margin: 0;
                padding: 0;
                border: none;
                font-family: Arial, sans-serif;
                font-size: 10px;
                font-size: 1rem;
            }
            a{text-decoration:none;color: #369;}
            #page{
                /**/
                height: 768px;
                background: url(/sites/all/themes/lacapitalmx/images/errores/error_500_1280.jpg) no-repeat center top;
                margin: 0 auto;
            }
            @media only screen and (min-width: 1024px) and (max-width: 1279px) {
                html {font-size: 60.5%;}
                #page{
                    height: 614px;
                    background: url(/sites/all/themes/lacapitalmx/images/errores/error_500_1024.jpg) no-repeat center top;
                }
            }
            @media only screen and (min-width: 768px) and (max-width: 1023px) {
                html {font-size: 54.5%;}
                #page{
                    height: 461px;
                    background: url(/sites/all/themes/lacapitalmx/images/errores/error_500_768.jpg) no-repeat center top;
                }
            }
            @media only screen and (max-width: 767px) {
                html {font-size: 54.5%;}
                #page{
                    height: 461px;
                    background: url(/sites/all/themes/lacapitalmx/images/errores/error_500_768.jpg) no-repeat center top;
                }
            }
        </style>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    </head>
    <body>
        <div id="page">
            <?php if($user->name == 'webmaster'):?>
                <?php if ($messages): 
                    print $messages; 
                endif; ?>
            <?php endif;?>
        </div>
        <!-- Footer-->
        <footer id="footer" class="stop">
            <div>
                <script src="http://776561ea720ed80d100a-d15d7e8f8f7f4ad15567639aa98ea820.r76.cf2.rackcdn.com/imx_bottom_responsive.js" type="text/javascript" id="imx_bottom_js"></script>
                <div id="bottom-links" style="display:none;">
                    <span id="politicasprivacidad">/aviso-de-privacidad</span>
                    <span id="gomobile">m.swagger.com</span>
                    <span id="condiciones-uso">/terminos-y-condiciones-de-uso</span>
                    <span id="gotop">#page</span>
                    <span id="politicaambiental">/politica-ambiental</span>
                    <span id="sitemap">/sitemap.xml</span>
                    <span id="rss">/rss.xml</span>
                </div>
            </div>
        </footer>
        <!-- /Footer-->
    </body>
</html>

