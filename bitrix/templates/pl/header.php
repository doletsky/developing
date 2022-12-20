<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title><?$APPLICATION->ShowTitle()?></title>

	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
    <meta name="yandex-verification" content="6183942b3fb1d3f5" />
    <meta name="p:domain_verify" content="05f134924c6e444d920c96619f8f5dcb"/>
    <meta property="og:url" content="http://<?=$_SERVER['SERVER_NAME']?><?=$APPLICATION->GetCurDir();?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?$APPLICATION->ShowTitle()?>" />

    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="dns-prefetch" href="https://fonts.googleapis.com/">
    <link rel="stylesheet" id="wpa-css-group-css" href="<?=SITE_TEMPLATE_PATH?>/css/styles.css" type="text/css" media="all">
    <link rel="stylesheet" id="proper-lite-style-group-css" href="<?=SITE_TEMPLATE_PATH?>/css/styles1.css" type="text/css" media="all">
    <link rel="stylesheet" id="proper-lite-open-headings-css" href="<?=SITE_TEMPLATE_PATH?>/css/css.css" type="text/css" media="all">
    <link rel="stylesheet" id="proper-lite-open-body-css" href="<?=SITE_TEMPLATE_PATH?>/css/css.css" type="text/css" media="all">
    <link rel="stylesheet" id="sccss_style-css" href="<?=SITE_TEMPLATE_PATH?>/css/styles2.css" type="text/css" media="all">
    <?$APPLICATION->ShowMeta("keywords")?>
    <?$APPLICATION->ShowMeta("description")?>
    <?$APPLICATION->ShowHeadStrings()?>

    <?$APPLICATION->ShowCSS();?>

    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.ui.touch-punch.min.js");?>
    <script async defer src="//assets.pinterest.com/js/pinit.js" data-pin-hover="true"></script>
    <style>
        #secondary > #mt-testimonials .testimonial p, .shortcodes .testimonial p  { font-style: italic; }
        .news-info > div { text-align: left; }
        /*.bwWrapper { position:relative; display:block; }*/
    </style>
    <style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
    <style type="text/css" src="<?=SITE_TEMPLATE_PATH?>/css/styles3.css"></style>
</head>

<body class="home page-template page-template-template-home page-template-template-home-php page page-id-352">
<?if (!$USER->IsAdmin()):?>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter44799454 = new Ya.Metrika({
                        id:44799454,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/44799454" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-100077242-1', 'auto');
        ga('send', 'pageview');

    </script>
<?endif;?>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '522962684704330',
            xfbml      : true,
            version    : 'v2.10'
        });

        FB.AppEvents.logPageView();

    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<?global $USER; if($USER->GetID()==1)$APPLICATION->ShowPanel();?>
<div id="page" class="hfeed site">

    <header id="masthead" class="site-header animated fadeIn delay-2">
        <div class="site-branding">


            <hgroup>
                <div class="site-title">

                    <a href="/" title="Place to Live" rel="home" style="font-family: 'Gunny Rewritten'">
                        PL<div class="sub-title">design</div>
                    </a>

                </div>
            </hgroup>



        </div><!-- .site-branding -->




        <div class="classic-navigation">
            <nav id="site-navigation" class="main-navigation" role="navigation">
            <?$APPLICATION->IncludeComponent("bitrix:menu","top_pl",Array(
                    "ROOT_MENU_TYPE" => "top",
                    "MAX_LEVEL" => "1",
                    "CHILD_MENU_TYPE" => "top",
                    "USE_EXT" => "Y",
                    "DELAY" => "N",
                    "ALLOW_MULTI_SELECT" => "Y",
                    "MENU_CACHE_TYPE" => "N",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "MENU_CACHE_GET_VARS" => ""
                )
            );?>
            </nav><!-- #site-navigation -->
        </div><!-- navigation-container -->

        <div class="navigation-container classic-menu">
            <a id="sidr-menu" href="#sidr">

                <i class="fa fa-bars"></i>
            </a>
        </div>


    </header><!-- #masthead -->

    <div id="sidr" class="sidr right">
        <?$APPLICATION->IncludeComponent("bitrix:menu","top_pl",Array(
                "ROOT_MENU_TYPE" => "top",
                "MAX_LEVEL" => "1",
                "CHILD_MENU_TYPE" => "top",
                "USE_EXT" => "Y",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "Y",
                "MENU_CACHE_TYPE" => "N",
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "MENU_CACHE_GET_VARS" => ""
            )
        );?>
    </div>

    <div id="content" class="site-content">

<?if($APPLICATION->GetCurPage()=='/'):?>
<!--     begin for main page-->


        <section id="home-hero">

            <div class="hero-content-container">
                <div class="hero-content animated fadeInUp delay">
                    <h2><em>Place to Live</em><br>Вдохновение. Красота. Индивидуальность.</h2>
<!--                    <h2 style="text-shadow: 0.1em 0.1em 0.2em black">Пространство для <em>жизни</em></h2>-->
                    <a href="anonces" class="featured-link" id="scroll_to_anonces">
                        <button>смотреть</button>
                    </a>


                </div><!-- .hero-content -->
            </div><!-- .hero-content-container -->

            <div id="hero-background" data-parallax="scroll" data-image-src="<?=SITE_TEMPLATE_PATH?>/images/mpl2-3.jpg" data-z-index="1" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/images/mpl2-3.jpg'); background-size: cover; background-position: center center;opacity: 0.8;">
            </div>

        </section>


<?endif?>


