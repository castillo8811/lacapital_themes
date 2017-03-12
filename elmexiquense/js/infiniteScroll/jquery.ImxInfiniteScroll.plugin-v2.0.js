(function(jQuery) {
    jQuery.fn.ImxInfiniteScroll = function(config, options) {

        var settings = jQuery.extend({
            api_url: "http://api.inventmx.com/v1",
            site: "actitudfem",
            repo: "nodes.json",
            api_key: "3a5877fc16b6fcbf8eedbe55d091938a",
            append: "body",            
            loading: "http://m.actitudfem.com/img/actitudfem/ajax-loader.gif",
            btnSeeMore: false,
            labelSeeMore: "Ver más",
            Cpageview: false,
            Cns_id: "false",
            Apageview: false,
            recreating_fb: true,
            recreating_twitter: true,
            recreating_google: true,
            text_lenght: 100,
            scroll: 0,
            analitics: true,
            category_analytics: "IMxInfiniteScroll",
            action_analytics: "Infinite-Scroll",
            label_analytics: "Numero-Scroll: ",
            IMxInit: function() {},
            IMxEnd: function() {},
            /* clases */
            class_wrapperLoader: ".wrapper-loading",
            btnSeeMoreAppend: ".wrapper-loading",
        }, config);
        var params = jQuery.extend({
            sort: null,
            type: null,
            fields: null,
            limit: 5,
            offset: null,
            audio: null,
            tag_ids: null,
            category_url: null,
            category_ids: null,
            sub_category_ids: null,
            sub_category_url: null,
            programa_url: null,
            programa_ids: null,
            tag_url: null,
            callback: null,
            columnista_ids: null,
            not_ids: null
        }, options);
        var id = jQuery(this).attr("id");
        var mutex = false;
        var items = "";
        jQuery(settings.append).after("<div class='wrapper-loading'><img src='" + settings.loading + "'/></div>");
        jQuery(settings.append + " img").each(function() {
            jQuery(this).css({"background-image": "url(" + settings.loading + ")"});
            jQuery(this).addClass("loading");
        });
        
        
        if (params.offset) {
            toffset =jQuery("#" + id).attr("offset");
            if(toffset){
                offset1 = params.offset + params.limit;
            }else {
                offset1 = params.offset;
            }
            
            jQuery("#" + id).attr("offset", offset1);
        } else {
            jQuery("#" + id).attr("offset", params.limit);
        }

        var Nscroll = 0;
        var methods = {
            analitics: function() {
                if (settings.analitics) {
                    url = window.location.href;
                    label = settings.label_analytics + Nscroll;
                    _gaq.push(['_trackEvent', settings.category_analytics, settings.action_analytics, label]);
                }
            },
            conscorePageview: function() {
                if (settings.Cpageview) {
                    if (settings.Cns_id == "false") {
                        console.log('Falta introducir el "ns_id" de conscore');
                    }else{                        
                        path = jQuery('noscript:first').html();
                        data = path.match(/name[a-zA-Z0-9\.-_-]+/);
                        path = data[0].split('=');
                        path = typeof path[1] != 'undefined' ? path[1] : location.hash;
                        uid_call(path + '.pageview-' + Nscroll, 'view', settings.Cns_id, settings.site);
                    }
                }
            },
            analiticsPageview:function(){
                if (settings.Apageview) {
                    value=location.pathname+'/#pageview-'+Nscroll;
                    _gaq.push(['_trackPageview', value]);
                }
            },
            init: function() {
                methods.load();
            },
            load: function() {
                offset = parseInt(jQuery("#" + id).attr("offset"));
                params.offset = offset;
                url = settings.api_url + "/" + settings.site + "/" + settings.repo + "/" + settings.api_key + "?callback=?";
                finaldata = {};
                jQuery.each(params, function(i, j) {
                    if (j) {
                        finaldata[i] = j;
                    }
                });
                methods.getAjax(url, finaldata);
            },
            getAjax: function(url, finaldata) {
                mutex = true;
                jQuery.ajax({
                    url: url,
                    data: finaldata,
                    dataType: 'json',
                    type: 'GET',
                    timeout: 100000,
                    contentType: "application/json; charset=utf-8",
                    async: false,
                    success: function(data) {
                        if (data.response.status == 200) {
                            result = data.data;
                            if (result.length) {
                                methods.render(result);
                            } else {
                                if(settings.btnSeeMore === false){
                                    alert("Lo sentimos, nos quedamos sin contenido");
                                }else if(settings.btnSeeMore === true) {
                                    jQuery(".wrapper-click-see-more .txt-see-more").html("Lo sentimos, nos quedamos sin  contenido");
                                }
                            }
                            mutex = false;
                        } else {
                            id = jQuery(block).attr("id");
                            jQuery(".wrapper-loading").show();
                            alert("Hubo un error inesperado, intenta nuevamente por favor");                            
                            mutex = false;
                        }
                    },
                    error: function(request, status, error) {
                        jQuery(".wrapper-loading").show();
                        alert("Hubo un error inesperado, intenta nuevamente por favor");
                        mutex = false;
                    }
                });
            },
            render: function(data) {
                mutex = false;
                Nscroll += 1;
                offset = parseInt(jQuery("#" + id).attr("offset"));
                offset += params.limit;
                jQuery("#" + id).attr("offset", offset);
                tpl = jQuery("#" + id).html();
                section = Handlebars.compile(tpl);
                items = section(data);
                jQuery(settings.append).append(items);
                jQuery(settings.class_wrapperLoader).hide();
                methods.analitics();
                methods.conscorePageview();
                methods.analiticsPageview();
                settings.IMxEnd();

                (settings.recreating_fb) ? FB.XFBML.parse() : "";
                (settings.recreating_twitter) ? twttr.widgets.load() : "";
                (settings.recreating_google) ? gapi.plusone.go() : "";

            },
            executeScroll: function() {
                methods.init();
                settings.IMxInit();
                jQuery(".wrapper-loading").show();
            }
        }
        
        if(settings.btnSeeMore === false){
            jQuery(window).scroll(function() {
                if (((parseInt(jQuery(window).scrollTop()) + settings.scroll) == jQuery(document).height() - jQuery(window).height()) && !mutex) {
                    if(settings.btnSeeMore === false){
                        methods.executeScroll();
                    }
                }
            });
        }else if(settings.btnSeeMore === true && !mutex) {
            var appendClass = "";
            if(jQuery(settings.btnSeeMoreAppend).length === 1){
                appendClass = settings.btnSeeMoreAppend;
            }else {
                appendClass = ".wrapper-loading";
                console.log("Esta clase o Id  no es unico ó se repite más de una vez");
            }
            
            jQuery(appendClass).after("<div id='iMxinfiniteScroll-wrapper-see-more'></div>");
            jQuery("#iMxinfiniteScroll-wrapper-see-more").append("<div id='wrapper-click-see-more' class='wrapper-click-see-more'></div>");
            jQuery(".wrapper-click-see-more").append("<span class='ico-see-more'></span>");
            jQuery(".wrapper-click-see-more").append("<span class='txt-see-more'>"+ settings.labelSeeMore +"</span>");

            //jQuery(".wrapper-click-see-more").live("click",function (e) {
            jQuery(document).on("click","#iMxinfiniteScroll-wrapper-see-more .wrapper-click-see-more",function (e) {
                e.preventDefault();
                if(!mutex){
                    methods.executeScroll();
                }                
            });
        }
        
        Handlebars.registerHelper('truncate', function(str) {
            len = settings.text_lenght;
            if (str) {
                if (str.length > len && str.length > 0) {
                    var new_str = str + " ";
                    new_str = str.substr(0, len);
                    new_str = str.substr(0, new_str.lastIndexOf(" "));
                    new_str = (new_str.length > 0) ? new_str : str.substr(0, len);

                    return new Handlebars.SafeString(new_str + '...');
                }
                return str;
            }
        });
        
        Handlebars.registerHelper('ifC2', function(v1, operator, v2, options) {
        switch (operator) {
            case "==":
                return (v1 == v2) ? options.fn(this) : options.inverse(this);
            case "===":
                return (v1 === v2) ? options.fn(this) : options.inverse(this);
            case "<":
                return (v1 < v2) ? options.fn(this) : options.inverse(this);
            case "<=":
                return (v1 <= v2) ? options.fn(this) : options.inverse(this);
            case ">":
                return (v1 > v2) ? options.fn(this) : options.inverse(this);
            case ">=":
                return (v1 >= v2) ? options.fn(this) : options.inverse(this);
            case "&&":
                return (v1 && v2) ? options.fn(this) : options.inverse(this);
            case "||":
                return (v1 || v2) ? options.fn(this) : options.inverse(this);
            default:
                return options.inverse(this);
        }
    });
    
    Handlebars.registerHelper('ifC3', function(v1, operator, v2,operator1,v3, options) {
        switch (operator) {            
            case "&&":
                return (v1 && v2 && v3) ? options.fn(this) : options.inverse(this);
            case "||":
                return (v1 || v2 || v3) ? options.fn(this) : options.inverse(this);
            default:
                return options.inverse(this);
        }
    });
    
    Handlebars.registerHelper('ifC4', function(v1, operator, v2, operator1, v3, operator2, v4, options) {
        switch (operator) {            
            case "&&":
                return (v1 && v2 && v3 && v4 ) ? options.fn(this) : options.inverse(this);
            case "||":
                return (v1 || v2 || v3 || v4) ? options.fn(this) : options.inverse(this);
            default:
                return options.inverse(this);
        }
    });

    };

})(jQuery);