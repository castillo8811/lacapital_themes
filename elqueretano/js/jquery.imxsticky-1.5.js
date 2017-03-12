/* 
 * Plugin imxSticky para inventMx
 * Barra lateral formato garuyo, se pega en un div, se despega cuando llega a un footer
 */

(function(jQuery){
    jQuery.fn.imxsticky = function(options) {
        var defaults = {
            target: "#" + jQuery(this).attr('id'),
            start: "#main_container_right",
            startFixed: "#main_container_right",
            stop: "#footer",
            altoMenu: 0, // alto del menú (para sitios con menú/header fixed)
            anchoBarra: 410 // ancho de la barra (para los sitios que tienen bordes)
        };
        settings = jQuery.extend({}, defaults, options);
        jQuery(settings.startFixed).addClass('sidebar-mobile');
        var isMobile = /iphone|ipad|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent);
        if(!isMobile){ //compruebo que no sea tablet ni cel
            jQuery(settings.startFixed).removeClass('sidebar-mobile');
            jQuery(settings.startFixed).addClass('sticky');
        }
        if(jQuery(settings.startFixed).length > 0 && jQuery(settings.startFixed).hasClass('sticky')){
            heightNotas = jQuery(settings.startFixed).outerHeight();
            jQuery(window).scroll(function(){
                var scroll = jQuery(window).scrollTop();
                startOffsetTop = jQuery(settings.startFixed).offset().top;
                stopOffsetTop = jQuery(settings.stop).offset().top - settings.altoMenu;
                heightBarra = jQuery(settings.start).outerHeight();
                distanciaStop = stopOffsetTop - heightNotas - settings.altoMenu;
                if (scroll > startOffsetTop) {
                    jQuery(settings.target).css('position', 'fixed');
                    jQuery(settings.target).css('top', settings.altoMenu);
                    jQuery(settings.target).css('padding', 0);
                    jQuery(settings.target).css('bottom', 0);
                    if (scroll >= distanciaStop) {
                        jQuery(settings.target).css('position', 'absolute');
                        jQuery(settings.target).css('bottom', 0);
                        jQuery(settings.target).css('top', 'auto');
                    } else {
                        jQuery(settings.target).css('position', 'fixed');
                        jQuery(settings.target).css('top', settings.altoMenu);
                        jQuery(settings.target).css('padding', 0);
                    }
                } else {
                    jQuery(settings.target).css('position', 'static');
                    jQuery(settings.target).css('top', 'auto');
                    jQuery(settings.target).css('padding', '30px 0');
                }
            });
        }
    }
})(jQuery);

function putBackgroundAds(barra){
    jQuery(barra + " .imx_ads").each(function(){ //pongo fondo gris si hay publicidad (según)
        if(jQuery(this).children().length && !jQuery(this).hasClass("bgAd") && jQuery(this).height() >= 10){
            jQuery(this).addClass("bgAd");
        }
    });
}

