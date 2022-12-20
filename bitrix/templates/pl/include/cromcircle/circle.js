$(document).ready(function() {

    arColor = {
        xp:{//zone x>0
            tg175:{//tg>1.75 - red
                110:'#F26065', 140:'#EF3544', 180:'#EC1B24', 220:'#910F13', 260:'#730B0E'
            },
            tg57:{
                110:'#F47769', 140:'#F2564D', 180:'#EE2C38', 220:'#92191F', 260:'#731316'
            },
            tg0:{
                110:'#F79B5C', 140:'#F58535', 180:'#F47115', 220:'#94430B', 260:'#6A2E07'
            },
            tgm57:{
                110:'#FABD5F', 140:'#F9B134', 180:'#F79C0E', 220:'#955D07', 260:'#804E06'
            },
            tgm175:{
                110:'#FFF765', 140:'#FFF432', 180:'#FFF100', 220:'#989000', 260:'#827B00'
            },
            tgmm175:{
                110:'#A5DB74', 140:'#7FCD51', 180:'#65C42F', 220:'#3D751A', 260:'#346415'
            }
        },
        xn:{//zone x<0
            tg175:{//tg>1.75 - green
                110:'#65C888', 140:'#32B76C', 180:'#00A65F', 220:'#006436', 260:'#00552D'
            },
            tg57:{
                110:'#65CBC4', 140:'#32BABC', 180:'#00AAAF', 220:'#00656A', 260:'#00555A'
            },
            tg0:{
                110:'#6285CC', 140:'#3871C1', 180:'#1B62B7', 220:'#0F386B', 260:'#0C2F5B'
            },
            tgm57:{
                110:'#535BB2', 140:'#4346A4', 180:'#293D9B', 220:'#162257', 260:'#121C48'
            },
            tgm175:{
                110:'#7D5AB3', 140:'#6D399E', 180:'#542790', 220:'#311550', 260:'#291142'
            },
            tgmm175:{
                110:'#BD65B9', 140:'#A83AA3', 180:'#A0138E', 220:'#610A4E', 260:'#530840'
            }
        }
    }
    tgG=0;
    xG=0;
    yG=0;
    kG=1.05;
    rG=0;

    $(".check_gamma input").click(function(){
        $(".gamma-help").removeClass("active-help");
        $('.triod').removeClass('active');
        var idClass=$(this).attr('id');
        $('.'+idClass).addClass('active');
        $(".check_gamma span").css('font-weight', 'normal');
        $(this).parent('div').children('span').css('font-weight', 'bold');
        kG=$(this).data('k');
        triodRotate();

        var modX=xG/Math.sqrt(xG*xG);
        getColor(modX,tgG,rG,'#colorP1');

        posCoPoints();
        colorInImg();
    });

    $("#rotColor1").click(function(){
        var cColor=$('#colorP1').css('background-color');
        var sColor=$('#colorP2').css('background-color');
        $('#colorP1').css('background-color',sColor);
        $('#colorP2').css('background-color',cColor);
        colorInImg();
    });

    $("#rotColor2").click(function(){
        var cColor=$('#colorP1').css('background-color');
        var tColor=$('#colorP3').css('background-color');
        $('#colorP1').css('background-color',tColor);
        $('#colorP3').css('background-color',cColor);
        colorInImg();
    });

    $("#rotColor3").click(function(){
        var sColor=$('#colorP2').css('background-color');
        var tColor=$('#colorP3').css('background-color');
        $('#colorP2').css('background-color',tColor);
        $('#colorP3').css('background-color',sColor);
        colorInImg();
    });

    $(".colorPBox input").mousedown(function(){
        $(".cBox-help").removeClass("active-help");
    });

    function triodRotate(){
        var deg=Math.floor(Math.atan(1/tgG)*180/3.14);
        if(yG<0)deg=deg+180;
        $('.triod').css('transform','rotate('+deg+'deg)');
    }

    function posCoPoints(){
        var ka=kG+3.14/2;
        var y2=0;
        var y3=0;
        if(xG>0){
            y2=rG*Math.sin(Math.asin(yG/rG)+ka);
            y3=rG*Math.sin(Math.asin(yG/rG)-ka);
        }
        else{
            y2=rG*Math.sin(Math.acos(yG/rG)+ka+3.14/2);
            y3=rG*Math.sin(Math.acos(yG/rG)-ka+3.14/2);
        }
        var Mx2=0;
        var Mx3=0;
        if(yG>0){
            Mx2=Math.cos(Math.acos(xG/rG)+ka);
            Mx3=Math.cos(Math.acos(xG/rG)-ka);
        }
        else{
            Mx2=Math.cos(3.14*2-Math.acos(xG/rG)+ka);
            Mx3=Math.cos(3.14*2-Math.acos(xG/rG)-ka);
        }
        var modX2=Mx2/Math.sqrt(Mx2*Mx2);
        var x2=modX2*Math.sqrt(rG*rG-y2*y2);
        var modX3=Mx3/Math.sqrt(Mx3*Mx3);
        var x3=modX3*Math.sqrt(rG*rG-y3*y3);


        $('#dragP2').css("left", Math.floor(x2+300));
        $('#dragP2').css("top", Math.floor(300-(y2)));
        $('#dragP2').css("display", "block");
        getColor(x2/Math.sqrt(x2*x2), y2/x2, rG, '#colorP2');

        $('#dragP3').css("left", Math.floor(x3+300));
        $('#dragP3').css("top", Math.floor(300-(y3)));
        $('#dragP3').css("display", "block");
        getColor(x3/Math.sqrt(x3*x3), y3/x3, rG, '#colorP3');
    }


    function getColor(modX, tg, r, id){

        var argX=(modX>0)?'xp':'xn';
        var argTg=(tg>1.75)?'tg175':
            (tg>0.57)?'tg57':
                (tg>0)?'tg0':
                    (tg>-0.57)?'tgm57':
                        (tg>-1.75)?'tgm175':'tgmm175';
        var argR=(r>260)?'260':
            (r>220)?'220':
                (r>180)?'180':
                    (r>140)?'140':'110';
        $(id).css('background-color', arColor[argX][argTg][argR]);
    }

    $("#dragP1").mousedown(function(){
        $(".circle-help").removeClass("active-help");
    });
    $("#dragP1").draggable({
        stop: function(event, ui) {
            var x=$("#dragP1").position().left-307;
            var y=307-$("#dragP1").position().top;
            var r=Math.sqrt(x*x+y*y);
            var tg=y/x;
            tgG=tg;
            xG=x;
            yG=y;
            rG=r;
            console.log(x+", "+y+", R="+r+", tg="+tg);
            triodRotate();
            //limit max radius
            var corR=0;
            if(r>292){
                r=292;
                corR=1;
            }
            if(r<110){
                r=110;
                corR=1;
            }
            var modX=x/Math.sqrt(x*x);
            var modY=y/Math.sqrt(y*y);
            if(corR==1){
                y=modX*r*Math.sin(Math.atan(tg));
                x=modX*r*Math.cos(Math.atan(tg));
                $("#dragP1").css("left", Math.floor(x+300));
                $("#dragP1").css("top", Math.floor(300-y));
                console.log(x+", "+y+", R="+r+", tg="+tg);
                corR=0;
            }
            getColor(modX,tg,r,'#colorP1');

            //position other points
            posCoPoints();

            colorInImg();

        }
    });

    function position(el){
        var x=el.position().left-307;
        var y=307-el.position().top;
        var r=Math.sqrt(x*x+y*y);
        var tg=y/x;
        tgG=tg;
        xG=x;
        yG=y;
        rG=r;
        console.log(x+", "+y+", R="+r+", tg="+tg);
        triodRotate();
        //limit max radius
        var corR=0;
        if(r>292){
            r=292;
            corR=1;
        }
        if(r<110){
            r=110;
            corR=1;
        }
        var modX=x/Math.sqrt(x*x);
        var modY=y/Math.sqrt(y*y);
        if(corR==1){
            y=modX*r*Math.sin(Math.atan(tg));
            x=modX*r*Math.cos(Math.atan(tg));
            $("#dragP1").css("left", Math.floor(x+300));
            $("#dragP1").css("top", Math.floor(300-y));
            console.log(x+", "+y+", R="+r+", tg="+tg);
            corR=0;
        }
        getColor(modX,tg,r,'#colorP1');

        //position other points
        posCoPoints();

        colorInImg();
    }

    function colorInImg(){
        var cColor=$('#colorP1').css('background-color');
        var sColor=$('#colorP2').css('background-color');
        var tColor=$('#colorP3').css('background-color');
        $('.p-background').css('background-color', cColor);
        $('.s-background').css('background-color', sColor);
        $('.t-background').css('background-color', tColor);
        $('.p-border').css('border-color', cColor);
        $('.s1').css('border-left', '16.8vw solid '+sColor);
        $('.s3').css('border-right', '15vw solid '+sColor);
        $('.t-border').css('border-color', tColor);


        $('.p5').css('background-color', tColor);
        $('.t1').css('background-color', sColor);
        $('.t2').css('background-color', sColor);
        $('.t6').css('background-color', tColor);
    }

    position($("#dragP1"));

    setTimeout(function(){
        $('.full-width-circle').each(function(){
            var imgHeight=$(this).height();
            $(this).parent('div').css('min-height',imgHeight+'px');
//        $(this).children('.subtitle-img').css('margin-top',imgHeight+'px');
//        $(this).children('.subtitle-img').css('text-align','center');
        });
    },500);


});