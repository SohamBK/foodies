
/* global fcom */

$(window).load(function () {
    /* home page main slider */
    $('.slides--single-js').slick({
        dots: false,
        arrows: false,
        autoplay: true,
        fade: false,
        pauseOnHover: false
    });
    /* cuisines slider */
    $('.slides--seven-js').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: true,
        autoplay: false,
        centerMode: true,
        centerPadding: '0',
        pauseOnHover: false,
        infinite: true,
        prevArrow: '<a data-role="none" class="slick-prev" aria-label="previous"></a>',
        nextArrow: '<a data-role="none" class="slick-next" aria-label="next"></a>',
        responsive: [
            {breakpoint: 1050, settings: {slidesToShow: 5, centerMode: false }},
            {breakpoint: 990, settings: {slidesToShow: 3 }},
            {breakpoint: 767, settings: {slidesToShow: 2, centerMode: false }},
            {breakpoint: 400, settings: {slidesToShow: 1, centerMode: false }}
        ]
    });
    loadMiddleContent();
    function loadMiddleContent() {
        $.ajax({
            type: "POST",
            url: fcom.makeUrl("home", "getPopularRestaurants"),
            success: function (result) {
                $('#popular_restaurants').addClass('section section-bg--white');
                $('#popular_restaurants').html(result);
                loadPopularRestSliders();
            }
        });
        $.ajax({
            type: "POST",
            url: fcom.makeUrl("home", "getRecentlyRatedRestaurants"),
            success: function (result) {
                $('#latest_orders').addClass('section section-bg--white');
                $('#latest_orders').html(result);
                loadRecentSliders();
            }
        });
        /* $.ajax({
            type: "POST",
            url: fcom.makeUrl("home", "getRecentOrders"),
            success: function (result) {
                $('#latest_orders').addClass('section section-bg--white');
                $('#latest_orders').html(result);
                loadRecentSliders();
            }
        }); */
    }
    function loadPopularRestSliders() {
        $('.slides--onethird-js').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            autoplay: false,
            pauseOnHover: false,
            infinite: true,
            prevArrow: '<a data-role="none" class="slick-prev" aria-label="previous"></a>',
            nextArrow: '<a data-role="none" class="slick-next" aria-label="next"></a>',
            responsive: [
                {breakpoint: 1400, settings: {slidesToShow: 2 }},
                {breakpoint: 1200, settings: {slidesToShow: 2, centerMode: false, centerMode: true, arrows: false, centerPadding: '25px 0 0' }},
                {breakpoint: 767, settings: {slidesToShow: 2, centerMode: true, arrows: false, centerPadding: '25px 0 0' }},
                {breakpoint: 600, settings: {slidesToShow: 1, arrows: false, centerMode: true, centerPadding: '25px 0 0' }}
            ]
        });
    }
    function loadRecentSliders() {
        /* recent orders */
        $('.slides--six-js').slick({
            slidesToShow: 5,
            adaptiveHeight: true,
            autoplay: false,
            infinite: false,
            centerMode: false,
            autoplaySpeed: 2000,
            speed: 1000,
            variableWidth: false,
            arrows: true,
            prevArrow: '<a data-role="none" class="slick-prev" aria-label="previous"></a>',
            nextArrow: '<a data-role="none" class="slick-next" aria-label="next"></a>',
            responsive: [
                {breakpoint: 1499, settings: {slidesToShow:4 }},
                {breakpoint: 1050, settings: {slidesToShow:3 }},
                {breakpoint: 990, settings: {slidesToShow: 2 }},
                {breakpoint: 767, settings: {slidesToShow: 2 }},
                {breakpoint: 400, settings: {slidesToShow: 1 }}
            ]
        });
        /* recent orders */
        $('.slides--six-even-js').slick({
            slidesToShow: 5,
            adaptiveHeight: true,
            autoplay: false,
            infinite: false,
            centerMode: false,
            autoplaySpeed: 2000,
            rtl: true,
            speed: 1000,
            arrows: true,
            variableWidth: false,
            prevArrow: '<a data-role="none" class="slick-prev" aria-label="previous"></a>',
            nextArrow: '<a data-role="none" class="slick-next" aria-label="next"></a>',
            responsive: [
                {breakpoint: 1499, settings: {slidesToShow:4 }},  
                {breakpoint: 1050, settings: {slidesToShow: 3 }},
                {breakpoint: 990, settings: {slidesToShow: 2 }},
                {breakpoint: 767, settings: {slidesToShow: 2 }},
                {breakpoint: 400, settings: {slidesToShow: 1, centerPadding: '0' }}
            ]
        });
    }
});