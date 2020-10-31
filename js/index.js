$(function(){
    "use strict";
    var interoH = $(".intro").innerHeight(),
        winH = $(window).height();
    $(".slider").height(winH);
//================================*/
//===== nav scrolling ============*/
//================================*/
    function scrollingNav(){
        if($(window).scrollTop() >= 35){
            $("nav").css({
                'background':'#fff',
                'position':'fixed',
                'width':'100%',
                'top':'0',
                'box-shadow':'2px 2px 50px rgba(0,0,0,.4)'
            });
        } else {
            $("nav").css({
                'background':'transparent',
                'position':'static',
                'width':'100%',
                'box-shadow':'none'
            });
        }
    }
    scrollingNav();
    $(window).scroll(function(){
        scrollingNav();
    });
//================================*/
//===== End nav scrolling ============*/
//================================*/
    $(".owl-carousel").owlCarousel({
        items:2,
        margin:30,
        stagePadding:30,
        smartSpeed:450,
        loop:true,
        autoplay:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true,
                animateOut: 'slideOutDown',
                animateIn: 'flipInX'
            },
            600:{
                items:2,
                nav:false
            },
            1000:{
                items:4,
                nav:true,
                loop:true
            }
        }
    });
    // =====================End owlCarousel =====================
    
    // ===================== Start profile =====================
    $(".img-profile-person").mouseenter(function () {
        $(".img-profile-person .btn").css({
            'display':'inline'
        });
    });
    $(".img-profile-person").mouseleave(function () {
        $(".img-profile-person .btn").css({
            'display': 'none'
        });
    });

    $(".img-profile-cover .btn").mouseenter(function () {
        
        $(this).css({
            'width':'150px'
        });
        $(".img-profile-cover .btn span").delay("20000").css({
            'display': 'inline'            
        });
    });
    $(".img-profile-cover .btn").mouseleave(function () {
        
        $(this).css({
            'width':'48px'
        });
        $(".img-profile-cover .btn span").css({
            'display': 'none'
        });
    });


/**************************************************************************************** */
    $(".form-control").keypress(function (event) {
        // console.log(event.keyCode);
        if (event.keyCode >=  1575){
            console.log(event.keyCode);
        
            $(this).css({
                'textAlign': 'right'
            }).attr('placeholder','');
        } else {
            
            $(this).css({
                'textAlign': 'left'
                });
            
        }
    });
    //************************************************************** */

    $(".single-post .dropdown-menu-cust .fa-caret-down").click(function () {
        console.log("sayed");
        $(".single-post .dropdown-menu-cust .menu").toggle();
    });

    
    $('.form-post-file').change(function (e) {
        var fileName = e.target.files[0].name;
        $(".name-file").html(fileName);
    });
    $(".img-profile-cover img").click(function () {
        $(".full-coverimg-show").fadeIn();
        $("body").css({
            'overflow':'hidden'
        });
    });
    $(".img-profile-person img  ").click(function () {
        $(".full-profileimg-show").fadeIn();
        $("body").css({
            'overflow': 'hidden'
        });
    });

    $(".close-img").click(function () {
        $(".full-profileimg-show").fadeOut();
        $(".full-coverimg-show").fadeOut();
        $("body").css({
            'overflow': 'scroll'
        });
    });
    // $(".edit-post-link ").click(function (e) {
    //     // e.preventDefault();
    //     $(".form-edit").show();
    // })
    
});

