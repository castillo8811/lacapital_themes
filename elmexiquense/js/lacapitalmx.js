paceOptions = {
    ajax: false,
    restartOnPushState: false,
    restartOnRequestAfter: false,
    target: '.loadProgress'
}

jQuery(document).ready(function() {

    /*
    jQuery("#pageContent img").each(function(){
        src_string=jQuery(this).attr("src").replace("http://lacapitalmx.innovadev.com.mx/","http://www.garuyo.com/");
        jQuery(this).attr("src",src_string);
    });

    jQuery("#pageContent img").each(function(){
        src_string=jQuery(this).attr("src").replace("http://local.lacapitalmx.com/","http://www.garuyo.com/");
        jQuery(this).attr("src",src_string);
    });
    */


    jQuery("#change-ciudad, #change-ciudad-mobil").change(function(){
        ciudad=jQuery(this).val();
        if(ciudad=='queretaro'){
            window.location='http://local.elqueretano.mx';
        }else if(ciudad=='edomex'){
            window.location='http://local.elmexiquense.com';

        }else{
            window.location='http://local.lacapitalmx.com';
        }
    });

    ciudad=jQuery("#change-ciudad").val();
    if(ciudad=='cdmx'){
      jQuery('.region-menu-bar ul.menu li').last().remove();
      jQuery('.region-menu-bar ul.menu li').last().remove();
    }else if(ciudad=='queretaro'){
      jQuery('.region-menu-bar ul.menu li').eq(6).remove();
      jQuery('.region-menu-bar ul.menu li').css('padding','10px 10px');
      jQuery('.region-menu-bar ul.menu li a').css('font-size','1.5rem');

      jQuery(
            '.icn-C-w,.icn-interversiones,.icn-trafico, .icn-capital-white,.icn-oreja-verde,.icn-capital, .icn-sensorama, .icn-esos-pajaros, .icn-por-la-oreja, .icn-transito,.icn-subterraneo, .icn-mirador, .icn-radiografia, .icn-inter-vensiones, .icn-capirucha, .icn-sensorama-s, .icn-esos-pajaros-s, .icn-por-la-oreja-s, .icn-transito-s,.icn-subterraneo-s, .icn-mirador-s, .icn-radiografia-s, .icn-inter-vensiones-s, .icn-capirucha-s, .icn-gallerie'
      ).css('background-image', "url('/sites/all/themes/lacapitalmx/images/sprite_capital_mexiquense.png'");

    }
    
    if(jQuery('#stage .bxslider li').length > 1){
        jQuery('#stage .bxslider').bxSlider({
            pause: 8000,
            auto: true,
            mode: 'fade',
            captions: true,
            nextSelector: '#stage .arrow-next-b',
            prevSelector: '#stage .arrow-prev-b',
            nextText: '',
            prevText: ''
        });
    }else if(jQuery('#stage .bxslider li').length == 1){
        jQuery('#stage .bxslider').bxSlider({
            auto: false,
            captions: true,
            nextText: '',
            prevText: '',
            pagerCustom: '#bx'

        });

        jQuery(".bx-controls").remove();
    }
    
    if(jQuery('.openMenuFixed').length){
        jQuery('.openMenuFixed').on('click', function() {
            button = jQuery(this);
            if(button.hasClass('inactive')){
                jQuery('.menuFixed-hidden').stop().animate({
                    left: 0
                }, "fast");
                button.removeClass('inactive').addClass('active');
                jQuery('.menuFixedTools').css('position','fixed');
            } else {
                jQuery('.menuFixed-hidden').stop().animate({
                    left: '-100%'
                }, "fast");
                button.removeClass('active').addClass('inactive');
                jQuery('.menuFixedTools').css('position','relative');
            }
        });
    }

    

    testMobile();
    if (typeof jQuery.fn.validate == 'function') {
        var form = jQuery("#register-place-event-form");
        if (form) {
            form.validate({
                rules: {
                    title: {
                        required: true,
                    },
                    deseo_registrar: {
                        require_from_group: [2, ".form-radio"]
                    },
                    soy: {
                        require_from_group: [2, ".form-radio"]
                    },
                    'forma_pago[50204]': {
                        require_from_group: [1, ".form-checkbox"]
                    },
                    'forma_pago[50201]': {
                        require_from_group: [1, ".form-checkbox"]
                    },
                    'forma_pago[50203]': {
                        require_from_group: [1, ".form-checkbox"]
                    },
                    'forma_pago[50202]': {
                        require_from_group: [1, ".form-checkbox"]
                    },
                    rangos_precio: {
                        required: true,
                    }
                },
                messages: {
                    title: "Falta este campo",
                    deseo_registrar: "¿Qué deseas registrar?",
                    soy: "¿Eres dueño o usuario?",
                    'forma_pago[50204]': "Selecciona por lo menos una forma de pago",
                    'forma_pago[50203]': "Selecciona por lo menos una forma de pago",
                    'forma_pago[50202]': "Selecciona por lo menos una forma de pago",
                    'forma_pago[50201]': "Selecciona por lo menos una forma de pago",
                    rangos_precio: "Selecciona por lo menos un precio",
                }
            });

        }
        jQuery.validator.addMethod("laxEmail", function(value, element) {
            // allow any non-whitespace characters as the host part
            return this.optional(element) || /^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(\.)([a-z0-9-]+)*(.[a-z]{2,4})$/.test(value);
        });
        var form_profile = jQuery("#user-profile-form");
        if (form_profile) {
            form_profile.validate({
                rules: {
                    mail: {
                        required: true,
                        laxEmail: true
                    }
                },
                messages: {
                    mail: "Correo electronico invalido",
                }
            });

        }

    }

    jQuery(function() {
        jQuery(".lazy-garuyo").lazyload();
    });

    if (jQuery('#colaboradoresCarousel_wrapper').length > 0) {
        if (typeof jQuery().jcarousel !== "undefined") {
            var jcarousel = jQuery("#colaboradoresCarousel_wrapper");
            jcarousel.on('jcarousel:reload jcarousel:create', function() {
                var carousel = jQuery(this),
                        width = carousel.innerWidth();
                if (width >= 680) {
                    width = width / 4;
                } else if (width >= 350) {
                    width = width / 3;
                }
                carousel.jcarousel('items').css('width', Math.ceil(width) + 'px');
            }).jcarousel({
                wrap: 'circular'
            });

            jQuery('#colaboradoresCarousel .arrow-prev-gray').jcarouselControl({
                target: '-=1'
            });

            jQuery('#colaboradoresCarousel .arrow-next-gray').jcarouselControl({
                target: '+=1'
            });
        }

    }

    if (jQuery('.colaboradoresCarousel-carousel').length > 0) {
        jQuery('.colaboradoresCarousel-carousel').carouFredSel({
            responsive: true,
            scroll: 1,
            width: '90%',
            items: {
                visible: {
                    min: 2,
                    max: 4
                }
            },
            auto: false,
            prev: {
                button: '.colaboradoresCarousel .arrow-prev-white',
                items: 1
            },
            next: {
                button: '.colaboradoresCarousel .arrow-next-white',
                items: 1
            }
        });
    }

//    if (jQuery('body').hasClass('front')) {
    if (jQuery("#userProfileMenu").length > 0) {
        var position_height = jQuery("#userProfileMenu").offset().top + jQuery("#userProfileMenu").height();
    }
    jQuery(window).scroll(function() {
        scrollTop = jQuery(window).scrollTop();
        offsetTop = jQuery("#pageContent").offset().top;
        if (!jQuery('body').hasClass('body-mobile')) {
            if (jQuery("nav#menuFixed").hasClass('menu-PosFixed')) {
                if (scrollTop > offsetTop) {
                    jQuery("nav#menuFixed").stop().animate({
                        top: 0
                    }, "fast").removeClass('menuFixed-hidden').addClass('menuFixed-visible');
                } else {
                    jQuery("nav#menuFixed").stop().animate({
                        top: -97
                    }, "fast").removeClass('menuFixed-visible').addClass('menuFixed-hidden');
                    if (jQuery('.do-close-menu').length) {
                        jQuery('.menuFixedContent').stop().animate({
                            left: '-100%'
                        }, "fast");
                        jQuery('span#menuiFixed-openmenu').addClass('do-show-menu').removeClass('do-close-menu').css('background-position', '1px 1px');
                        jQuery('span#menuiFixed-openbuscador').addClass('do-show-menu').removeClass('do-close-menu');
                    }
                }
            } else {
                //                offsetTop = offsetTop + 150;
                if (scrollTop > offsetTop) {
                    jQuery("nav#menuFixed").css('position', 'fixed');
                    jQuery("nav#menuFixed").stop().animate({
                        top: 0
                    }, "fast").removeClass('menuFixed-hidden').addClass('menuFixed-visible');
                } else {
                    jQuery("nav#menuFixed").css('position', 'static');
                    jQuery("nav#menuFixed").stop().animate({
                        top: -97
                    }, "fast").removeClass('menuFixed-visible').addClass('menuFixed-hidden');
                    if (jQuery('.do-close-menu').length) {
                        jQuery('.menuFixedContent').stop().animate({
                            left: '-100%'
                        }, "fast");
                        jQuery('span#menuiFixed-openmenu').addClass('do-show-menu').removeClass('do-close-menu').css('background-position', '1px 1px');
                        jQuery('span#menuiFixed-openbuscador').addClass('do-show-menu').removeClass('do-close-menu');
                    }
                }
            }
        } else {
            if (jQuery('.field-name-addthis-superior').length) {
                stopPadd = jQuery("#footer").offset().top;
                if (scrollTop > offsetTop) {
                    jQuery('.field-name-addthis-superior').stop().animate({
                        top: '45px'
                    }, "fast");
                    if (scrollTop >= stopPadd) {
                        jQuery('.field-name-addthis-superior').stop().animate({
                            top: '-45px'
                        }, "fast");
                    } else {
                        jQuery('.field-name-addthis-superior').stop().animate({
                            top: '45px'
                        }, "fast");
                    }
                } else {
                    jQuery('.field-name-addthis-superior').stop().animate({
                        top: '-45px'
                    }, "fast");
                }
            }
        }

        //menu sesion perfil        
        if (jQuery("#userProfileMenu").length > 0) {
            if (jQuery("#userProfileMenu").hasClass("perfil-sesion-fixed")) {
                if (jQuery(window).scrollTop() < position_height) {

                    jQuery("#userProfileMenu").stop().animate({
                        top: 0
                    }, 500).removeClass("perfil-sesion-fixed");
                }
            }
            else {
                if (jQuery(window).scrollTop() > position_height) {
                    jQuery("#userProfileMenu").stop().animate({
                        top: jQuery("#menuFixed").height()
                    }, 1000).addClass("perfil-sesion-fixed");
                }
            }
        }
    });
//    }

    if (jQuery('#headerCanal-showMore').length > 0) {
        flagheaderCanal = true;
        jQuery('#headerCanal-showMore').on('click', function() {
            if (flagheaderCanal) {
                flagheaderCanal = false;
                jQuery('.headerCanal-listado ul li.hidden').slideDown(1000);
                jQuery(this).html('CERRAR <span class="icn-show-less"></span>');
            } else {
                flagheaderCanal = true;
                jQuery(this).html('VER MÁS <span class="icn-show-more"></span>');
                jQuery('.headerCanal-listado ul li.hidden').slideUp(1000);
            }
        });
    }
    //* Scroll al dar click en boton de comentar*//
    jQuery(".btn-comenta,.btn-comenta-s").on("click", function() {
        jQuery(window).scrollTo(jQuery(".field-name-addthis-inferior"), 1000);
    });

    jQuery.ajax({
        url: 'http://graph.facebook.com/http://www.garuyo.com' + document.location.pathname,
        dataType: 'jsonp',
        success: function(data) {
            if (data.comments) {
                jQuery(".comments-fb-count").html(data.comments);
            }
        }
    });

    jQuery("body").on("click", ".icn-pin.no-sesion,.btn-favoritos.no-sesion,.btn-favoritos-s.no-sesion,.btn-init-seseion,.btn-instruccion-favorito.no-sesion", function() {
//        if(jQuery(this).hasClass("btn-instruccion-favorito")){

         if(jQuery(this).attr("data-mark-nid")){
        jQuery.removeCookie('favorite_nid', {path: '/'});
        jQuery.removeCookie('last_section', {path: '/'});
        jQuery.cookie.json = true;
            var last_section = {"last_section": window.location.pathname};
        var data_favorite = {"nid": jQuery(this).attr("data-mark-nid"), "status": 0, "type": 1};
        favorite_config = {
            expires: 10,
            path: "/",
        };
        jQuery.cookie("favorite_nid", data_favorite, favorite_config);
        jQuery.cookie("last_section", last_section, favorite_config);
        }
        if(!jQuery(this).hasClass("btn-init-seseion")|| !jQuery(this).hasClass("btn-instruccion-favorito")){
              
          jQuery.ajax({
                type: "GET",
                cache: false,
                url: "/hybridtauth/instruccion/popup", // 
                success: function(data) {
                    jQuery.colorbox({html: data, scrolling: false, width: "99%",height:"600px"});
                    // on success, post (preview) returned data in popupbox

                } // success
            }); // ajax 
        }
        
        if(jQuery(this).hasClass("btn-init-seseion")){
         jQuery.ajax({
            type: "GET",
            cache: false,
            url: "/hybridtauth/login/popup", // 
            success: function(data) {
                jQuery.colorbox({html: data, scrolling: false, width: "99%"})
                // on success, post (preview) returned data in popupbox

            } // success
        }); // ajax   
        }
    });
    jQuery(".btn-registrar.no-sesion").on("click", function() {
        if (form.valid()) {
            jQuery.removeCookie("event_place", {path: '/'});
            var selialize_place_event = jQuery("form").serialize();
            jQuery("form").find("input").each(function(i, v) {
//            console.log(i);
            });
            jQuery.cookie.json = true;
            var last_section = {"last_section": "/ultimos-lugares-o-eventos-registrados"};
            var data_place_event = {"place_event": selialize_place_event};
            favorite_config = {
                expires: 10,
                path: "/",
            };
            jQuery.cookie("place_event", data_place_event, favorite_config);
            jQuery.cookie("last_section", last_section, favorite_config);
            jQuery.ajax({
                type: "GET",
                cache: false,
                url: "/hybridtauth/login/popup?email=" + jQuery('input[name="email"]').val(), // 
                success: function(data) {
                    jQuery.colorbox({html: data, scrolling: false, width: "99%"})
                    // on success, post (preview) returned data in popupbox

                } // success
            }); // ajax   
        }
    });
    jQuery(".btn-instruccion-favorito.no-sesion").on("click", function() {
            jQuery.ajax({
                type: "GET",
                cache: false,
                url: "/hybridtauth/instruccion/popup", // 
                success: function(data) {
                    jQuery.colorbox({html: data, scrolling: false, width: "99%",height:"600px"});
                    // on success, post (preview) returned data in popupbox

                } // success
            }); // ajax   
    });


    valida_favorito();
    valida_lugar();

});

if (jQuery(".fb-comments").length) {
    jQuery(".fb-comments").attr("data-width", jQuery(".fb-comments").parent().width());
    jQuery(window).on('resize', function() {
        resizeiframe();
    });
}

function resizeiframe() {
    var src = jQuery('.fb-comments iframe').attr('src').split('width='),
            width = jQuery(".fb-comments").parent().width();

    jQuery('.fb-comments iframe').attr('src', src[0] + 'width=' + width);
}

function testMobile() {
    var isMobile = /iphone|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent);
    if (isMobile) { //compruebo que no sea tablet ni cel
        jQuery('body').addClass('body-mobile');
    }
}

function valida_favorito() {
    var data_json_f = jQuery.cookie("favorite_nid");
    if (data_json_f) {
        var data_favorite_nid = jQuery.parseJSON(data_json_f);

        if (data_favorite_nid.nid) {
            jQuery.ajax({
                method: "POST",
                url: "/imx_mark/js/add",
                data: {'nid': data_favorite_nid.nid, 'type': data_favorite_nid.type, 'status': data_favorite_nid.status},
                success: function(result) {
                    if (result) {
                        jQuery.removeCookie('favorite_nid', {path: '/'});
                    }
                }
            });
        }
    }
}

function valida_lugar() {
    var data_cookie = jQuery.cookie("place_event");
    if (data_cookie) {
        var data_place = jQuery.parseJSON(data_cookie);
        console.log("paso");
        if (data_place.place_event) {
            jQuery.ajax({
                method: "POST",
                url: "/registrar-evento-lugar/register-ajax",
                data: data_place.place_event,
                success: function(result) {
                    if (result) {
                        console.log(result);
                        if (result === "true") {
                            jQuery.removeCookie('place_event', {path: '/'});
                            jQuery.removeCookie('last_section', {path: '/'});
                        } else {
                            console.log(result);
                        }
                    }
                }
            });
        }
    }
}

function insertShadowList(){
    if (jQuery(".nodesList-img a").length && !jQuery(".nodesList-img a").hasClass("no-bg")) {
        jQuery(".nodesList-img a").prepend('<span class="bgOp"></span>');
    }
}
jQuery(document).bind('cbox_complete', function() {
    jQuery(".windowRegister-close").on("click", function() {
        jQuery.colorbox.close();
    });
    jQuery(".new-user-registration").on("click", function() {
//              alert();
//        jQuery.colorbox.close();
        jQuery.ajax({
            type: "GET",
            cache: false,
            url: "/hybridtauth/register/popup?email=" + jQuery('input[name="email"]').val(), // 
            success: function(data) {
                jQuery.colorbox({html: data, scrolling: false, width: "99%"})
                // on success, post (preview) returned data in popupbox

            } // success
        }); // ajax
    });

});
