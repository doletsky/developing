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
    <meta property="og:url" content="http://placetolive.ru<?=$APPLICATION->GetCurDir();?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?$APPLICATION->ShowTitle()?>" />
    
<!--	<script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>-->
<!--	<link rel="stylesheet" type="text/css" href="--><?//=SITE_TEMPLATE_PATH?><!--/common.css" />-->

	<?$APPLICATION->ShowHead();?>
<!---->
<!--		-->
<!--</head>-->


    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/normalize.css" type="text/css" media="screen">

    <link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/styles2.css" media="screen">
    <link rel="stylesheet" type="text/css" id="styles" href="<?=SITE_TEMPLATE_PATH?>/css/styles1.css" media="screen">

    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/shortcodes.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/theme-changer.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/js/pretty/prettyPhoto.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/js/tipSwift/tipSwift.html" type="text/css" media="screen">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/js/nivo/nivo-slider.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/js/jFlickr/jflickr_css/style.css" type="text/css" media="screen">
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter44799454 = new Ya.Metrika({
                        id:44799454,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true
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
    <noscript><link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/noscript.css" type="text/css" media="screen"></noscript>
    <!--[if IE 7]><link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/ie7.css" type="text/css" /><![endif]-->
</head>

<body>
<?$APPLICATION->ShowPanel();?>


<!-- HEADER -->

<div class="dark-line"></div>

<div id="wrapper">

    <!-- NAVIGATION MENU -->

    <?$APPLICATION->IncludeComponent("bitrix:menu","top_mede",Array(
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

    <div class="inner clearfix">
        <div class="clearfix bottom-35">

            <!-- LOGO AND DESCRIPTION -->

            <a href="/" class="alignleft"><img src="/images/content/logo.png" alt=""></a>

            <div class="description">
                <h1>Место, в котором мы живем.</h1>

                <p>Очень много о нас говорит место, в котором мы живем. И, более того, место, в котором живет человек, зависит от его характера. Мы обустраиваем пространство вокруг себя и делаем это, не задумываясь.</p>
            </div>
        </div>