$(document).ready(function () {
    listing();
});
var currentPage = 1;
var nextPage = 1;
listing = function (page) {
    jsonNotifyMessage(1);
    $('.load-more').hide();
    $('.not_found').hide();
    if (typeof page == undefined || page == null) {
        page = 1;
    }
    currentPage = page;
    fcom.ajax(fcom.makeUrl('restaurants', 'listing', [page]), {param: param}, function (json) {

        $('#loadMoreButton').removeAttr('disabled');
        json = $.parseJSON(json);
        if ("1" == json.status) {
            $('#listing').html($('#listing').html() + json.listing);
            $('#listing-heading').html(json.heading);
            if (json.no_search_msg != '') {
                $('.not_found').show();
                $('.not_found').html(json.no_search_msg);
            }
            jsonRemoveMessage();
            if (json.nextPage == '-1') {
                $('.load-more').hide();
            } else {
                nextPage = json.nextPage;
            }
            if (json.load_more == 0) {
                $('.load-more').hide();
            } else {
                $('.load-more').show();
            }
        } else {

            jsonErrorMessage(json.msg);
        }
    });
    jsonRemoveMessage();
}

getCoupon = function (restaurant_id) {
    if (typeof restaurant_id == undefined || restaurant_id == null) {
        return false;
    }
    CloseCustomPopup();
    jsonNotifyMessage(1);
    data = {restaurant_id: restaurant_id};
    fcom.ajax(fcom.makeUrl('coupons', 'restaurantCoupons'), data, function (json) {
        json = $.parseJSON(json);
        if (json.status == 1) {
            showCustomPopup(json.msg);
            jsonRemoveMessage();
        } else if (json.status == 2) {
            window.location = json.url;
        } else {
            jsonErrorMessage(json.msg);
        }
    });
}

showMoreCuisines = function (id) {
    $('#' + id + ' li.hide-cuisine').show();
    $('#' + id + ' span.hide-comma').show();
    $('.hide-cuisines').show();
    $('.more-cuisines').hide();
}
hideMoreCuisines = function (id) {
    $('#' + id + ' li.hide-cuisine').hide();
    $('#' + id + ' span.hide-comma').hide();
    $('.hide-cuisines').hide();
    $('.more-cuisines').show();
}

loadMore = function () {
    $('#loadMoreButton').attr('disabled', 'disabled');
    listing(nextPage);
}
/* $('.drop-down__link-js').click(function(){
 $('html').addClass('is-filter-active'); 
 
 if($(this).hasClass('is--active')){
 $(this).removeClass('is--active');
 $('html').removeClass('is-filter-active');
 $(this).siblings('.drop-down__target-js').slideUp();
 return false;
 }
 $('.drop-down__link-js').removeClass('is--active');
 $(this).addClass("is--active");
 
 $('.drop-down__target-js').slideUp();
 $(this).siblings('.drop-down__target-js').slideDown();
 });
 
 $('html').click(function(){
 if($('html').hasClass('is-filter-active')){
 $('.drop-down__link-js').removeClass("is--active");
 $('html').removeClass('is-filter-active');
 $('.drop-down__target-js').slideUp();
 }
 }); */

$('.section--sort').click(function (e) {
    e.stopPropagation();
});

$(window).scroll(function () {
    if ($(window).width() > 1200)
        if ($(this).scrollTop() > 105 && !$('.section--filters').hasClass('filters-fixed')) {
            $('html').addClass('filters-fixed');
            $('html').slideDown();
        } else if ($(this).scrollTop() <= 400) {
            $('html').removeClass('filters-fixed');
            $('html').slideDown();
        }
});


$(".btn--search-js").click(function () {
    $(".section--form-js").toggle();
    $('html').toggleClass('search--mobile-js');
});

$(".btn--filter-js").click(function () {
    $(".section--filters-js").toggle();
    $('html').toggleClass('filters--mobile-js');
});

$(window).load({
    noncache: new Date().getTime()
}, function () {
    $('.scrollbars').tinyscrollbar({
        sizethumb: 20
    });
});