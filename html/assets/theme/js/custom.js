$(window).on("load", function(){
    $('.product-list li').removeClass('hidden');
    $('.product-list li').removeClass('animated');
});

$(document).ready(function(){
    $('.product-btn').mouseenter(function(){
        $('.product-cat').fadeIn(300);
    });
    

    $('.product-btn').mouseleave(function(){
        $('.product-cat').fadeOut(300);
    });
});