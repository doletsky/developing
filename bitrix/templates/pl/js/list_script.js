jQuery(function($){
    $(document).ready(function(){
        $(".project-bg img").each(function(){
            console.log($(this).height());
            console.log($(this).parent().height());
            if($(this).parent().height()-$(this).height()>1){
                console.log('chaging');
                $(this).css('max-width','none');
                $(this).css('max-height',$(this).parents('.project-content').height()+'px');
            }
        });

        var delay=false;
        var finContentTop=$('#fin-content').position().top;
        var pcount=$('#fin-content').attr('pcount');
        var pcurent=$('#fin-content').attr('pcurent');
        var  code=$('#fin-content').attr('code');
        $(window).scroll(function(){
            if(pcount>pcurent){
                if($(window).scrollTop()+$(window).height()>=finContentTop+100){

                    if(delay==false){
                        delay=true;
                        pcurent++;
                        $.post('/ajax.php',
                            {
                                CODE: code,
                                PAGEN_1: pcurent
                            },
                            function(data){
                                $(".col-1-2.mt-column-clear:last").after(data);
                                $(".col-1-2.mt-column-clear:hidden").slideDown(1000,function(){
                                    finContentTop=$('#fin-content').position().top;
                                    $('#fin-content').attr('pcurent', pcurent);
                                    delay=false;
                                    $(".project-bg img").each(function(){
                                        if($(this).parent().height()-$(this).height()>1){
                                            $(this).css('max-width','none');
                                            $(this).css('max-height',$(this).parents('.project-content').height()+'px');
                                        }
                                    });
                                });

                            });

                    }

                }
            }


        });

    });
});
