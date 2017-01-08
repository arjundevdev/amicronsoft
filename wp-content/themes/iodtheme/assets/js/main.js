/*-----------------------------------------------------------------------------------*/
/* 		Mian Js Start 
 /*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function ($) {

/**

 * Copyright (c) 2007-2012 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * @author Ariel Flesler
 * @version 1.4.3
 */

(function($){var h=$.scrollTo=function(a,b,c){$(window).scrollTo(a,b,c)};h.defaults={axis:'xy',duration:parseFloat($.fn.jquery)>=1.3?0:1,limit:true};h.window=function(a){return $(window)._scrollable()};$.fn._scrollable=function(){return this.map(function(){var a=this,isWin=!a.nodeName||$.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!isWin)return a;var b=(a.contentWindow||a).document||a.ownerDocument||a;return/webkit/i.test(navigator.userAgent)||b.compatMode=='BackCompat'?b.body:b.documentElement})};$.fn.scrollTo=function(e,f,g){if(typeof f=='object'){g=f;f=0}if(typeof g=='function')g={onAfter:g};if(e=='max')e=9e9;g=$.extend({},h.defaults,g);f=f||g.duration;g.queue=g.queue&&g.axis.length>1;if(g.queue)f/=2;g.offset=both(g.offset);g.over=both(g.over);return this._scrollable().each(function(){if(!e)return;var d=this,$elem=$(d),targ=e,toff,attr={},win=$elem.is('html,body');switch(typeof targ){case'number':case'string':if(/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(targ)){targ=both(targ);break}targ=$(targ,this);if(!targ.length)return;case'object':if(targ.is||targ.style)toff=(targ=$(targ)).offset()}$.each(g.axis.split(''),function(i,a){var b=a=='x'?'Left':'Top',pos=b.toLowerCase(),key='scroll'+b,old=d[key],max=h.max(d,a);if(toff){attr[key]=toff[pos]+(win?0:old-$elem.offset()[pos]);if(g.margin){attr[key]-=parseInt(targ.css('margin'+b))||0;attr[key]-=parseInt(targ.css('border'+b+'Width'))||0}attr[key]+=g.offset[pos]||0;if(g.over[pos])attr[key]+=targ[a=='x'?'width':'height']()*g.over[pos]}else{var c=targ[pos];attr[key]=c.slice&&c.slice(-1)=='%'?parseFloat(c)/100*max:c}if(g.limit&&/^\d+$/.test(attr[key]))attr[key]=attr[key]<=0?0:Math.min(attr[key],max);if(!i&&g.queue){if(old!=attr[key])animate(g.onAfterFirst);delete attr[key]}});animate(g.onAfter);function animate(a){$elem.animate(attr,f,g.easing,a&&function(){a.call(this,e,g)})}}).end()};h.max=function(a,b){var c=b=='x'?'Width':'Height',scroll='scroll'+c;if(!$(a).is('html,body'))return a[scroll]-$(a)[c.toLowerCase()]();var d='client'+c,html=a.ownerDocument.documentElement,body=a.ownerDocument.body;return Math.max(html[scroll],body[scroll])-Math.min(html[d],body[d])};function both(a){return typeof a=='object'?a:{top:a,left:a}}})(jQuery);
    /************************************************************************************ TO TOP STARTS */

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').on("click", function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    "use strict";
    /*-----------------------------------------------------------------------------------*/
    /* 	LOADER
     /*-----------------------------------------------------------------------------------*/
    $("#loader").delay(500).fadeOut("slow");
    /*-----------------------------------------------------------------------------------*/
    /*		STICKY NAVIGATION
     /*-----------------------------------------------------------------------------------*/
//$(".sticky").sticky({topSpacing:0});
    /*-----------------------------------------------------------------------------------*/
    /*	SERVICE LIST
     /*-----------------------------------------------------------------------------------*/
    $('.best-services .list').colio({
        id: 'demo_1',
        theme: 'black',
        placement: 'inside'
    });
    /*-----------------------------------------------------------------------------------*/
    /* 		HOMA MAIN SLIDER
     /*-----------------------------------------------------------------------------------*/
    $('.home-slide').flexslider({
        animation: "fade"
    });
    /*-----------------------------------------------------------------------------------*/
    /* 		Parallax
     /*-----------------------------------------------------------------------------------*/
//jQuery(document).ready(function(){
//  jQuery.stellar({
//    horizontalScrolling: false,
//    scrollProperty: 'scroll',
//    positionProperty: 'position',
//  });
//});
    /*-----------------------------------------------------------------------------------*/
    /* 		WORK FILTER
     /*-----------------------------------------------------------------------------------*/
    var $container = $('.team-wrap .items');
    $container.imagesLoaded(function () {
        $container.isotope({
            itemSelector: '.item',
            layoutMode: 'fitRows'
        });
    });
    $('.filter li a').on('click', function () {
        $('.filter li a').removeClass('active');
        $(this).addClass('active');
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector
        });
        return false;
    });
    /*-----------------------------------------------------------------------------------*/
    /*	COUNTER
     /*-----------------------------------------------------------------------------------*/
    $('.counter .timer').countTo();
    /*-----------------------------------------------------------------------------------*/
    /*	CUBE PORTFOLIO
     /*-----------------------------------------------------------------------------------*/

    function reinitAjax() {

    $('.ajax-work').cubeportfolio({
        filters: '#ajax-work-filter',
        loadMoreAction: 'click',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 0,
        gapVertical: 0,
        gridAdjustment: '',
        caption: 'zoom',
        displayType: 'lazyLoading',
        displayTypeSpeed: 400,
        // singlePage popup
        singlePageDelegate: '.cbp-singlePage',
        singlePageDeeplinking: true,
        singlePageStickyNavigation: true,
        singlePageCounter: '<div class="cbp-popup-singlePage-counter">{{current}} of {{total}}</div>',
        singlePageCallback: function (url, element) {
// to update singlePage content use the following method: this.updateSinglePage(yourContent)
            var t = this;
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                timeout: 10000
            })
                .done(function (result) {
                    t.updateSinglePage(result);
                })
                .fail(function () {
                    t.updateSinglePage('AJAX Error! Please refresh the page!');
                });
        },
    });

    }

    reinitAjax();

    $(document).on('click', '.load-more', function(e){
        e.preventDefault();
        var this_load_b = $('.load-more'),
            num = this_load_b.data('amount'),
            max_pages = this_load_b.data('max-page'),
            item_cat = this_load_b.data('category'),
            current_page = this_load_b.data('current-page'),
            next_page = parseInt(current_page)+1;
        if(current_page == max_pages){
            this_load_b.fadeOut(500);
            return false;}


        $.post( ajaxurl, {
            'action' 		: 'load_portfolio_items',
            'num'   		: num,
            'next_page' 	: next_page,
            'item_cat' 	    : item_cat
        })
        .done(function(response) {

            var insert_p = this_load_b.closest('.portfolio').find('.cbp-wrapper');
                console.log(response);
            insert_p.append(response);
                $('.ajax-work').cubeportfolio('destroy');
                reinitAjax();
                this_load_b.data('current-page', next_page);
            if( (current_page+1) == max_pages){
                $('.cbp-l-loadMore-defaultText').fadeOut();
                $('.cbp-l-loadMore-noMoreLoading').fadeIn();

            }
        });

        return false;
    });




    /*-----------------------------------------------------------------------------------*/
    /* 	TESTIMONIAL SLIDER
     /*-----------------------------------------------------------------------------------*/
    $(".single-slide").owlCarousel({
        items: 1,
        autoplay: true,
        loop: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        singleItem: true,
        navigation: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        pagination: true,
        animateOut: 'fadeOut'
    });
    $('.testi-two').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            800: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    });
    $('.blog-slide').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            800: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });

    /*-----------------------------------------------------------------------------------*/
    /*    ACCORDION MENU
     /*-----------------------------------------------------------------------------------*/
    var tabCount = 0;
    var tabCont = 0;

    $('#issues li').each(function () {
        tabCount++;
        $(this).attr('id', 'date' + tabCount);
    });

    $('#dates li').each(function () {
        tabCont++;
        $(this).find('a').attr('id', 'date' + tabCont).attr('href', '#date' + tabCont);
    });


    var menuCount = 0;
    var tabcollapsCont = 0;

    $('.side-bar-revenues').each(function () {
        menuCount++;
        $(this).find('h6 a').attr('href', '#menu' + menuCount);
    });

    $('.side-bar-revenues').each(function () {
        tabcollapsCont++;
        $(this).find('.collapse').attr('id', 'menu' + tabcollapsCont);
    });

    $('.search_jobs').prepend('<h5 class="side-tittle">Search</h5>');
    $('.job_types').prepend('<h5 class="side-tittle">Filter Results</h5>');


    $(window).on('load', function () {

        jQuery(function(){
            jQuery().timelinr({
                orientation: 'horizontal',
                // value: horizontal | vertical, default to horizontal
                containerDiv: '#timeline',
                // value: any HTML tag or #id, default to #timeline
                datesDiv: '#dates',
                // value: any HTML tag or #id, default to #dates
                datesSelectedClass: 'selected',
                // value: any class, default to selected
                datesSpeed: 'normal',
                // value: integer between 100 and 1000 (recommended) or 'slow', 'normal' or 'fast'; default to normal
                issuesDiv : '#issues',
                // value: any HTML tag or #id, default to #issues
                issuesSelectedClass: 'selected',
                // value: any class, default to selected
                issuesSpeed: 'fast',
                // value: integer between 100 and 1000 (recommended) or 'slow', 'normal' or 'fast'; default to fast
                issuesTransparency: 0.2,
                // value: integer between 0 and 1 (recommended), default to 0.2
                issuesTransparencySpeed: 500,
                // value: integer between 100 and 1000 (recommended), default to 500 (normal)
                prevButton: '#prev',
                // value: any HTML tag or #id, default to #prev
                nextButton: '#next',
                // value: any HTML tag or #id, default to #next
                arrowKeys: 'false',
                // value: true/false, default to false
                startAt: 1,
                // value: integer, default to 1 (first)
                autoPlay: 'false',
                // value: true | false, default to false
                autoPlayDirection: 'forward',
                // value: forward | backward, default to forward
                autoPlayPause: 2000
                // value: integer (1000 = 1 seg), default to 2000 (2segs)< });
            });
        });

    });

    /*-----------------------------------------------------------------------------------*/
    /*    google map
     /*-----------------------------------------------------------------------------------*/
    var map;
    function initialize_map() {
        if (jQuery('#map').length) {
            var lat = jQuery('#map').data('lat');
            var lon = jQuery('#map').data('lon');
            var zoom = jQuery('#map').data('zoom');
            var marker = jQuery('#map').data('img');
            var title = jQuery('#map').data('title');
            var myLatLng = new google.maps.LatLng(lat, lon);
            var mapOptions = {
                zoom: zoom,
                center: myLatLng,
                scrollwheel: false,
                panControl: false,
                zoomControl: true,
                scaleControl: false,
                mapTypeControl: false,
                streetViewControl: false
            };
            map = new google.maps.Map(document.getElementById('map'), mapOptions);
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                tittle: title,
                icon: marker
            });
        } else {
            return false;
        }
    }
	if (jQuery('#map').length) {
		google.maps.event.addDomListener(window, 'load', initialize_map);
	}


    /*-----------------------------------------------------------------------------------*/
    /* 	SEARCH
     /*-----------------------------------------------------------------------------------*/
	$('.search-icon > a').on("click", function(e){
		$(this).parent('.search-icon').toggleClass('active');
		e.preventDefault();
	});
	
});



