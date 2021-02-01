$(document).ready(function() {
    $('.burger-btn').on('click', function(e) {
        e.preventDefault();
        $('.burger-btn').toggleClass('burger-btn--active');
        $('.header__nav').toggleClass('header__nav--active');

    $('.header__nav').click(function() {
    $('.burger-btn').removeClass('burger-btn--active');
    $('.header__nav').removeClass('header__nav--active');
});
        
    });
    

    $("#menu").on("click","a", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1500);
    });


    $('.intro__sliders').slick({
        autoplay:true,
        dots:true,
        infinite:true,
        pauseOnHover:false,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1
    }
);
});




