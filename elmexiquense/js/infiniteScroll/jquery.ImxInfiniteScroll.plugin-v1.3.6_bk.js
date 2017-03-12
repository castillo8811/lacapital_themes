(function(jQuery) {
    jQuery.fn.ImxInfiniteScroll = function(config, options) {

        var settings = jQuery.extend({
            api_url: "http://api.inventmx.com/v1",
            site: "actitudfem",
            repo: "nodes.json",
            api_key: "3a5877fc16b6fcbf8eedbe55d091938a",
            append: "body",
            loading: "http://m.actitudfem.com/img/actitudfem/ajax-loader.gif",
            recreating_fb: true,
            recreating_twitter: true,
            recreating_google: true,
            text_lenght: 100,
            scroll: 0,
            analitics: true,
            category_analytics: "IMxInfiniteScroll",
            action_analytics: "Infinite-Scroll",
            label_analytics: "Numero-Scroll: ",
            IMxInit: function() {
            },
            IMxEnd: function() {
            }
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
            programa_url: null,
            programa_ids: null,
            tag_url: null,
            callback: null,
            columnista_ids: null
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
            offset1 = params.offset + params.limit;
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
                            if (data) {
                                methods.render(result);
                            } else {
                                alert("No hay mas datos");
                            }
                            mutex = false;
                        } else {
                            id = jQuery(block).attr("id");
                            alert("Hubo un error inesperado, intenta nuevamente por favor");
                            mutex = false;
                        }
                    },
                    error: function(request, status, error) {
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
                jQuery(".wrapper-loading").hide();
                methods.analitics();
                settings.IMxEnd();

                (settings.recreating_fb) ? FB.XFBML.parse() : "";
                (settings.recreating_twitter) ? twttr.widgets.load() : "";
                (settings.recreating_google) ? gapi.plusone.go() : "";

            }
        }

        jQuery(window).scroll(function() {
            if (((parseInt(jQuery(window).scrollTop()) + settings.scroll) == jQuery(document).height() - jQuery(window).height()) && !mutex) {
                methods.init();
                settings.IMxInit();
                jQuery(".wrapper-loading").show();
            }
        });
        
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