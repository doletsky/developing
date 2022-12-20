$(document).ready(function(){
    var fImgH=0;
    var pFlag=0;
    var hFlag=0;
    var cSoc=0;
    $(".project-bg img").each(function(){
    if($(this).parent().height()-$(this).height()>1){
    $(this).css('max-width','none');
    $(this).css('max-height',$(this).parents('.project-content').height()+'px');
    }
});
setTimeout(function(){
    $('.full-width-image').each(function(){
        var imgHeight=$(this).children('img').height();
        fImgH=fImgH+imgHeight;
        $(this).css('min-height',imgHeight+'px');
        $(this).children('.subtitle-img').css('margin-top',imgHeight+'px');
        $(this).children('.subtitle-img').css('text-align','center');
    });
}, 300);
setTimeout(function(){
    fImgH=0;
    $('.full-width-image').each(function(){
    var imgHeight=$(this).children('img').height();
    fImgH=fImgH+imgHeight;
    $(this).css('min-height',imgHeight+'px');
    $(this).children('.subtitle-img').css('margin-top',imgHeight+'px');
    $(this).children('.subtitle-img').css('text-align','center');
    });
}, 1000);
setTimeout(function(){
    fImgH=0;
    $('.full-width-image').each(function(){
    var imgHeight=$(this).children('img').height();
    fImgH=fImgH+imgHeight;
    $(this).css('min-height',imgHeight+'px');
    $(this).children('.subtitle-img').css('margin-top',imgHeight+'px');
    $(this).children('.subtitle-img').css('text-align','center');
    });
if($('.social').length>0) cSoc=$('.social').offset().top;
}, 5000);
setTimeout(function(){
    fImgH=0;
    $('.full-width-image').each(function(){
    var imgHeight=$(this).children('img').height();
    fImgH=fImgH+imgHeight;
    $(this).css('min-height',imgHeight+'px');
    $(this).children('.subtitle-img').css('margin-top',imgHeight+'px');
    $(this).children('.subtitle-img').css('text-align','center');
    });
}, 15000);


$(window).scroll(function(){
    if($('#page-content-container').offset().top-$(window).scrollTop()<0){
    if(pFlag==0){
    $('.classic-navigation').css('position','fixed');
    $('.classic-navigation').css('background','rgba(64, 64, 64, 0.2');
    $('.classic-navigation').css('top',0);
    pFlag=1;
    }
}else{
    if(pFlag==1){
    $('.classic-navigation').css('position','absolute');
    $('.classic-navigation').css('background','inherit');
    $('.classic-navigation').css('top','20px');
    pFlag=0;
    }
}
if((cSoc-$(window).height()-$(window).scrollTop())>0){
    if(hFlag==0&&pFlag==1){
    $('.social').addClass('social-fx');
    hFlag=1;
    }
}else{
    if(hFlag==1||pFlag==0){
    $('.social').removeClass('social-fx');
    hFlag=0;
    }
}
});
    if($('.page-bg-image').attr('data-fimg-src')!=undefined){
        setTimeout(function(){
            fImgH=0;
            $('img.parallax-slider').attr('src',$('.page-bg-image').data('fimg-src'));
        }, 500);
    }

});
