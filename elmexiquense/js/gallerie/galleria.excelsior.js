/**
 * Tema de galleria.io para excelsior.com.mx
 * Por: David Gil
 **/

(function($) {

    Galleria.addTheme({
        name: 'excelsior',
        author: 'David Gil, Galleria',
//        css: 'excelsior.classic.css',
        defaults: {
            initialTransition: 'none',
            transition: 'none',
            thumbnails: 'lazy',
            idleTime: 5000,
            idleMode: true,
            thumbCrop: 'height',
            imageCrop: false,
            slideshowInterval: 3000,
            showCounter: false,
            transitionSpeed: 250,
            queue: false,
            responsive: true,
//            height: 500
        },
        init: function(options) {
            Galleria.requires(
                1.28,
                'This version of Classic theme requires Galleria 1.2.8 or later');

            this.lazyLoadChunks( 1, 400 );
            this.attachKeyboard({left: this.prev,right: this.next});

            this.addElement('fullscreen');
            this.addElement('info-bullet');
            this.addElement('info-bullet-elogo');
            this.addElement('info-bullet-arrow');

            this.appendChild('container', 'fullscreen');
            this.appendChild('container', 'stage');
            this.appendChild('container', 'thumbnails-container');
            
            this.appendChild('container', 'info');
            this.appendChild('info', 'info-bullet');
            this.appendChild('info-bullet', 'info-bullet-arrow');
            this.appendChild('info-bullet', 'info-bullet-elogo');

            this.$("fullscreen").click(function(e) {
                Galleria.get(0).toggleFullscreen();
            });

            var _dataLength = this.getDataLength();
            var _isFullscreen = false;
            // var _conteoClicks = 1;

            var _requestIndex = false;
            if(/^#imagen-(\d{1,})/.test(location.hash)){
                _requestIndex = (location.hash.match(/^#imagen-(\d{1,})/)[1] - 1);
            }

            if (_requestIndex && (_requestIndex > (_dataLength - 1))) {
                options.show =_dataLength - 1;
                location.hash = "imagen-" + _dataLength;
            } else if (_requestIndex && (_requestIndex < 0)) {
                options.show = 0;
                location.hash = "imagen-1";
            }

//            if(!(jQuery.browser.msie && parseInt(jQuery.browser.version, 10) > 9)){
//                this.addIdleState(this.get('image-nav'), {opacity: 0});
//                this.addIdleState(this.get('fullscreen'), {opacity: 0});
//            }engo ni para irmejejeje

            /**
             *  bindings
             *  http://galleria.io/docs/api/events/#list-of-galleria-events
             */

            $(window).bind('hashchange', function() {
                var gallery_instance = Galleria.get(0);
                console.log(gallery_instance);
                var new_index = (location.hash.match(/^#imagen-(\d{1,})/)[1] - 1);

                if (location.hash == "" || !/^#imagen-(\d{1,})/.test(location.hash) ) {
                    options._justLanded = true;
                    gallery_instance.show(0);
                } else if (!isNaN(gallery_instance._active) && (gallery_instance._active != new_index) && /^#imagen-(\d{1,})/.test(location.hash)) {
                    gallery_instance.show(new_index);
                }
            });

//            if($('.galleria-image-nav').length > 0){
                jQuery('.galleria-thumb-nav-right').click(function(){
                     Galleria.get(0).next();
//                  console.log(_conteoClicks);
//                   if(_conteoClicks++ >= 3){
//                     location.reload(false);
//                   }
                });
                jQuery('.galleria-thumb-nav-left').click(function(){
                   Galleria.get(0).prev();
//                   if(_conteoClicks++ >= 3){
//                     location.reload(false);
//                   }
                });
//            }

            this.bind('fullscreen_enter', function(e) {
                _isFullscreen = true;
                $('#node-galery-gallerie > iframe').css('display', 'none');
                $('#node-article-gallerie > iframe').css('display', 'none');
                $('#node-videogalery-gallerie > iframe').css('display', 'none');
            });

            this.bind('fullscreen_exit', function(e) {
                $('#node-galery-gallerie > iframe').css('display', 'inline');
                $('#node-article-gallerie > iframe').css('display', 'inline');
                $('#node-videogalery-gallerie > iframe').css('display', 'inline');
                // empujamos la url donde salió del fullscreen
                // document.location.hash = "imagen-" + (e.scope._active + 1);

                if(!(jQuery.browser.msie && parseInt(jQuery.browser.version, 10) > 9))
                    this.removeIdleState(this.get('info'));

                _isFullscreen = false;
            });

            this.bind('thumbnail', function(e) {
                if (e.index === this.getIndex()) {
                    $(e.thumbTarget).find('.thumbnail-numeracion').css('display', 'block');
                }
                $(e.thumbTarget).parent().append('<span class="thumbnail-numeracion">' + (e.index + 1) + '/' + _dataLength + ' </span>');
            });

            this.bind('loadstart', function(e) {

                this.resize();
                this.refreshImage();

                _canNavigateHistory = false;

                this.$('fullscreen').html('');
                if (!e.cached) {
                    this.$('loader').show().fadeTo(200, 0.4);
                }
            });


            this.bind('loadfinish', function(e) {

                this.resize();

                this.$('loader').fadeOut(200);

                if (!options._justLanded ) {
                    document.location.hash = "imagen-" + (e.index + 1);
                    if( !_isFullscreen ){
                        console.log(location.pathname + location.hash);
                        ga('send','pageview', location.pathname + location.hash);
                        if(typeof options._comScoreName != 'undefined')
                            uid_call(options._comScoreName + '.' + "imagen_" + (e.index + 1),'galeria')
                    }else{
                        ga('send','pageview', location.pathname + location.hash + '&fullscreen');
                        if(typeof options._comScoreName != 'undefined')
                            uid_call(options._comScoreName + '.' + "imagen_" + (e.index + 1) + '.' + 'fullscreen','galeria')
                    }

                }
                if (options._justLanded) {
                    options._justLanded = false;
                }
            });
        } //init
    }); //addTheme

}(jQuery));
