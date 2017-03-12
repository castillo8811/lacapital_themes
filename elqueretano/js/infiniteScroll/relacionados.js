jQuery(document).ready(function() {
    imx_smarts_render_block_by_invoque_id("#infiniteAds","info");
    imx_smarts_render_block_by_invoque_id("#PorqueLeisteAds","info");
    var category = null;
    if (typeof Drupal.settings.infinite_config != 'undefined') {
        var config = Drupal.settings.infinite_config;
        if (typeof config.category != 'undefined') {
            category = config.category;
        }
    }
    if(typeof jQuery().ImxInfiniteScroll =="undefined"){
        (function(a){a.fn.ImxInfiniteScroll=function(d,k){var f=a.extend({api_url:"http://api.inventmx.com/v1",site:"actitudfem",repo:"nodes.json",api_key:"3a5877fc16b6fcbf8eedbe55d091938a",append:"body",loading:"http://m.actitudfem.com/img/actitudfem/ajax-loader.gif",btnSeeMore:false,Cpageview:false,Cns_id:"false",Apageview:false,recreating_fb:true,recreating_twitter:true,recreating_google:true,text_lenght:100,scroll:0,analitics:true,category_analytics:"IMxInfiniteScroll",action_analytics:"Infinite-Scroll",label_analytics:"Numero-Scroll: ",IMxInit:function(){},IMxEnd:function(){},class_wrapperLoader:".wrapper-loading",btnSeeMoreAppend:".wrapper-loading",},d);var g=a.extend({sort:null,type:null,fields:null,limit:5,offset:null,audio:null,tag_ids:null,category_url:null,category_ids:null,sub_category_ids:null,sub_category_url:null,programa_url:null,programa_ids:null,tag_url:null,callback:null,columnista_ids:null,not_ids:null},k);var c=a(this).attr("id");var j=false;var i="";a(f.append).after("<div class='wrapper-loading'><img src='"+f.loading+"'/></div>");a(f.append+" img").each(function(){a(this).css({"background-image":"url("+f.loading+")"});a(this).addClass("loading")});if(g.offset){toffset=a("#"+c).attr("offset");if(toffset){offset1=g.offset+g.limit}else{offset1=g.offset}a("#"+c).attr("offset",offset1)}else{a("#"+c).attr("offset",g.limit)}var b=0;var e={analitics:function(){if(f.analitics){url=window.location.href;label=f.label_analytics+b;_gaq.push(["_trackEvent",f.category_analytics,f.action_analytics,label])}},conscorePageview:function(){if(f.Cpageview){if(f.Cns_id=="false"){console.log('Falta introducir el "ns_id" de conscore')}else{path=a("noscript:first").html();data=path.match(/name[a-zA-Z0-9\.-_-]+/);path=data[0].split("=");path=typeof path[1]!="undefined"?path[1]:location.hash;uid_call(path+".pageview-"+b,"view",f.Cns_id,f.site)}}},analiticsPageview:function(){if(f.Apageview){value=location.pathname+"/#pageview-"+b;_gaq.push(["_trackPageview",value])}},init:function(){e.load()},load:function(){offset=parseInt(a("#"+c).attr("offset"));g.offset=offset;url=f.api_url+"/"+f.site+"/"+f.repo+"/"+f.api_key+"?callback=?";finaldata={};a.each(g,function(m,l){if(l){finaldata[m]=l}});e.getAjax(url,finaldata)},getAjax:function(m,l){j=true;a.ajax({url:m,data:l,dataType:"json",type:"GET",timeout:100000,contentType:"application/json; charset=utf-8",async:false,success:function(n){if(n.response.status==200){result=n.data;if(n){e.render(result)}else{alert("No hay mas datos")}j=false}else{c=a(block).attr("id");a(".wrapper-loading").show();alert("Hubo un error inesperado, intenta nuevamente por favor");j=false}},error:function(p,n,o){a(".wrapper-loading").show();alert("Hubo un error inesperado, intenta nuevamente por favor");j=false}})},render:function(l){j=false;b+=1;offset=parseInt(a("#"+c).attr("offset"));offset+=g.limit;a("#"+c).attr("offset",offset);tpl=a("#"+c).html();section=Handlebars.compile(tpl);i=section(l);a(f.append).append(i);a(f.class_wrapperLoader).hide();e.analitics();e.conscorePageview();e.analiticsPageview();f.IMxEnd();(f.recreating_fb)?FB.XFBML.parse():"";(f.recreating_twitter)?twttr.widgets.load():"";(f.recreating_google)?gapi.plusone.go():""},executeScroll:function(){e.init();f.IMxInit();a(".wrapper-loading").show()}};if(f.btnSeeMore===false){a(window).scroll(function(){if(((parseInt(a(window).scrollTop())+f.scroll)==a(document).height()-a(window).height())&&!j){if(f.btnSeeMore===false){e.executeScroll()}}})}else{if(f.btnSeeMore===true){var h="";if(a(f.btnSeeMoreAppend).length===1){h=f.btnSeeMoreAppend}else{h=".wrapper-loading";console.log("Esta clase o Id  no es unico ó se repite más de una vez")}a(h).after("<div id='wrapper-click-see-more' class='wrapper-click-see-more'></div>");a(".wrapper-click-see-more").append("<span class='ico-see-more'></span>");a(".wrapper-click-see-more").append("<span class='txt-see-more'>Ver más</span>");a(document).on("click",".wrapper-click-see-more",function(l){l.preventDefault();e.executeScroll()})}}Handlebars.registerHelper("truncate",function(m){len=f.text_lenght;if(m){if(m.length>len&&m.length>0){var l=m+" ";l=m.substr(0,len);l=m.substr(0,l.lastIndexOf(" "));l=(l.length>0)?l:m.substr(0,len);return new Handlebars.SafeString(l+"...")}return m}});Handlebars.registerHelper("ifC2",function(o,l,n,m){switch(l){case"==":return(o==n)?m.fn(this):m.inverse(this);case"===":return(o===n)?m.fn(this):m.inverse(this);case"<":return(o<n)?m.fn(this):m.inverse(this);case"<=":return(o<=n)?m.fn(this):m.inverse(this);case">":return(o>n)?m.fn(this):m.inverse(this);case">=":return(o>=n)?m.fn(this):m.inverse(this);case"&&":return(o&&n)?m.fn(this):m.inverse(this);case"||":return(o||n)?m.fn(this):m.inverse(this);default:return m.inverse(this)}});Handlebars.registerHelper("ifC3",function(q,m,p,l,o,n){switch(m){case"&&":return(q&&p&&o)?n.fn(this):n.inverse(this);case"||":return(q||p||o)?n.fn(this):n.inverse(this);default:return n.inverse(this)}});Handlebars.registerHelper("ifC4",function(s,n,r,m,q,l,p,o){switch(n){case"&&":return(s&&r&&q&&p)?o.fn(this):o.inverse(this);case"||":return(s||r||q||p)?o.fn(this):o.inverse(this);default:return o.inverse(this)}})}})(jQuery);
    }
//    try {
        jQuery("#wrapper-infinite-scroll").ImxInfiniteScroll({
            /*configuration of site*/
            site: "actitudfem",
            append: "#infiniteAds",
            loading:"http://www.actitudfem.com/sites/www.actitudfem.com/themes/actitudfem/images/loader_florecita40.gif",
            text_lenght: 50,
            Cpageview: true,
            Cns_id: 7672322,
            Apageview: true,
            analitics: true,
            category_analytics: "IMxInfiniteScroll",
            action_analytics: "Infinite-Scroll",
            label_analytics: "Numero-Scroll- ",
            btnSeeMore: true,
            labelSeeMore: "",
            IMxInit: function() {

            },
            IMxEnd: function () {
                imx_smarts_render_block_by_invoque_id("#infiniteAds","info");
            }
        }, {
            limit: 6,
            fields: "id|title|summary|taxonomy|url|images|sinopsis",
            type: "article|gallerie|videos",
            category_ids: category,
            offset: 5
        });
//    } catch(e){
//        console.log("Hubo un error al cargar ImxInfiniteScroll");
//    }


//    var ar = jQuery('.footerSticky #relacionados-wrapper').length;
//    if (ar > 0) {
//        jQuery(window).scroll(function() {
//            var scrollWin = jQuery(window).scrollTop();
//            var altoRel = jQuery('.footerSticky #relacionados-wrapper').offset().top;
//            if (scrollWin >= altoRel) {
//                jQuery(".footerSticky #footerWrapper").fadeIn("fast", function() {
//                    jQuery(".footerSticky #lateral_right_wrapper .sticky_right").addClass('activeSticky');
//                });
//            } else {
//                jQuery('.footerSticky #footerWrapper').slideUp();
//                jQuery(".footerSticky #lateral_right_wrapper .sticky_right").removeClass('activeSticky');
//            }
//        });
//    }


});

//jQuery(window).load(function(){
//    
//});