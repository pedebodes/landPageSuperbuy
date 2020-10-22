// <![CDATA[
$(function() {
    $('#page-all').css('min-height', $(window).height() - 200 + 'px');
    // altura topo
    var altheader = null,
        padheader = null;

    /*$('.form-group').popup({
        on: 'focus'
    }).popup('show');*/
    $(window).scroll(function() {
        altheader = $('#header').height();

        if ($("#header").offset().top > 0) {
            $("#header").addClass("navbar-fixed-top");
            if($('#wrapper').hasClass('toggled')) {
                $("#header").addClass("headerfix");
            } else {
                $("#header").removeClass("headerfix");
            }

            padheader = 12;
        } else {
            $("#header").removeClass("navbar-fixed-top");
            $("#header").removeClass("headerfix");

            padheader = 48;
        }

        $('#page-all').css('padding-top', altheader + padheader + 'px');
    });
    $(window).resize(function() {
        $('#page').css('min-height', $(window).height() - 200 + 'px');
        altheader = $('#header').height();

        if ($("#header").offset().top > 0) {
            $("#header").addClass("navbar-fixed-top");

            padheader = 12;
        } else {
            $("#header").removeClass("navbar-fixed-top");

            padheader = 48;
        }

        $('#page-all').css('padding-top', altheader + padheader + 'px');
    });
    // menu
    $('.navbar-nav li:last-child').css('background', 'none');
    $('.nav.navbar-nav li').stop().mouseover(function() {
        $(this).children().next('ul').stop().slideDown();
    }).mouseleave(function() {
        $('.submenu').stop().slideUp();
    });
    $('.nav.navbar-nav li').click(function() {
        $(this).children().next('ul').stop().slideToggle();
    });
    // owlCarousel rotate
    $("#owl-slider").owlCarousel({
        autoPlay: 7000,
        stopOnHover: true,
        navigation: false,
        paginationSpeed: 1000,
        goToFirstSpeed: 2000,
        singleItem: true,
        autoHeight: true,
        transitionStyle: "fade"
    });
    $('#owl-banners').owlCarousel({
        autoPlay: 8000,
        navigation: false,
        paginationSpeed: 1000,
        goToFirstSpeed: 2000,
        singleItem: true,
        autoHeight: true,
        transitionStyle: "fade"
    });
    $("#owl-clientes").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds
        navigation: false,
        /*navigationText: [
      "<i class='icon-chevron-left icon-white'></i>",
      "<i class='icon-chevron-right icon-white'></i>"
      ],*/
        items: 8
    });
    $("#owl-fornecedores").owlCarousel({
        autoPlay: 5000, //Set AutoPlay to 3 seconds
        navigation: false,
        /*navigationText: [
      "<i class='icon-chevron-left icon-white'></i>",
      "<i class='icon-chevron-right icon-white'></i>"
      ],*/
        items: 8
    });
    // Slider
    $('#coin-slider').coinslider({
        width: 500,
        height: 298,
        opacity: 1
    });
    // wrap 'span' to nav page link
    $('.topnav ul').children('li').each(function() {
        $(this).children('a').html('<span>' + $(this).children('a').text() + '</span>'); // add tags span to a href
    });
    // navigation slide down menu
    $("ul.sf-menu").superfish({
        autoArrows: false,
        delay: 400, // one second delay on mouseout 
        animation: {
            opacity: 'show',
            height: 'show'
        }, // fade-in and slide-down animation 
        speed: 'fast', // faster animation speed 
        autoArrows: false, // disable generation of arrow mark-up 
        dropShadows: false // disable drop shadows          
    });
    // if navigation on Right
    $('ul.list li').each(function() {
        var a = $(this).children('a');
        var aClass = a.attr('rel');
        if (a.hasClass('active')) {
            $('.' + aClass).css({
                'display': 'block'
            });
        } else {
            $('.' + aClass).css({
                'display': 'none'
            });
        }
    });
    $('ul.list li a').click(function() {
        var thisaClass = $(this).attr('rel');
        $(this).parent('li').parent('ul').children('li').each(function() {
            var a = $(this).children('a');
            var aClass = a.attr('rel');
            if (thisaClass == aClass) {
                $('.' + aClass).show();
                a.attr('class', 'active');
            } else {
                $('.' + aClass).hide();
                a.attr('class', '');
            }
        });
        return false;
    });

    /**/
});
// ]]>