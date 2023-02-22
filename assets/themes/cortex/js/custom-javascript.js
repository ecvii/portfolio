$(document).ready(function () {
    'use strict';
    // Slider Javascript
   

    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        effect: 'fade',
        speed: 600,
        loop: true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },
        keyboard: {
            enabled: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    });

    // Navbar Scoll Animation
    $(window).on('scroll', function () {
        if ($(window).scrollTop()) {
            $('nav.navbar').addClass('padding fixed-top');
        } else {
            $('nav.navbar').removeClass('padding');
        }
    });

    $("nav ul li a").on('change', function () {
        $(".navbar-collapse").removeClass("show");
    });



    


    // Owl Carousel


    $("#owl-team").owlCarousel({
        items: 3,
        itemsCustom: false,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [991, 2],
        itemsTablet: [768, 1],
        itemsTabletSmall: [600, 1],
        itemsMobile: [479, 1],
        singleItem: false,
        itemsScaleUp: false,

        //Autoplay
        autoPlay: true,
        stopOnHover: true,

        // Navigation
        navigation: false,
        navigationText: false,
        rewindNav: true,
        scrollPerPage: false,

        //Pagination
        pagination: true,
        paginationNumbers: false,

        // Responsive 
        responsive: true,
        responsiveRefreshRate: 200,
        responsiveBaseWidth: window,
    });

    $("#owl-tst").owlCarousel({
        items: 1,
        itemsCustom: false,
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [991, 1],
        itemsTablet: [768, 1],
        itemsTabletSmall: [600, 1],
        itemsMobile: [479, 1],
        singleItem: false,
        itemsScaleUp: false,

        //Autoplay
        autoPlay: true,
        stopOnHover: true,

        // Navigation
        navigation: false,
        navigationText: false,
        rewindNav: true,
        scrollPerPage: false,

        //Pagination
        pagination: true,
        paginationNumbers: false,

        // Responsive 
        responsive: true,
        responsiveRefreshRate: 200,
        responsiveBaseWidth: window,
    });



    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();



    // ============================ScrollReveal=======================

    window.sr = ScrollReveal();

    sr.reveal('.top30', {
        duration: 1000,
        origin: 'top',
        distance: '30px'
    });


    sr.reveal('.bottom30', {
        duration: 1000,
        origin: 'bottom',
        distance: '30px'
    });


    // side navbar
    $(".sidenav-open").click(function (e) {
        e.preventDefault();
        $(".sidenav").addClass("slide");
        $(".bg-overlay-nav").addClass("slide");
    });
    
    $(".bg-overlay-nav,.sidenav ul li a").click(function (e) {
        $(".sidenav").removeClass("slide");
        $(".bg-overlay-nav").removeClass("slide");
    });
    
    // Sidenav Links Active Class Change
    $(".sidenav ul li a").click(function (e) {
        $(".sidenav ul li a.bg-active").removeClass("bg-active");
        $(this).addClass("bg-active");
    });


});