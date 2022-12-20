<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
?>

    <header class="page-entry-header">
        <div class="grid grid-pad overflow">
            <div class="col-1-1">
                <div class="animated fadeInUp delay">
                    <h1 class="entry-title">Поиск</h1>
                </div>
            </div>
        </div>

        <div class="page-bg-image" data-parallax="scroll" data-image-src="<?=SITE_TEMPLATE_PATH?>/images/page-bg.jpg?<?echo time()?>" data-z-index="1">
        <img class="page-bg-image" data-parallax="scroll" src="<?=SITE_TEMPLATE_PATH?>/images/page-bg.jpg?<?echo time()?>" data-z-index="1"></div>



    </header><!-- .entry-header -->

<div class="home-widget home-widget-one shortcodes"><a name="anonces"></a>

    <div class="grid grid-pad">
    <div class="col-1-1">
    <div class="main-navigation breadcrump">
        <ul>
            <li><a href="/">Главная</a></li>
            <li>Поиск</li>
        </ul>
    </div>


<?$APPLICATION->IncludeComponent("bitrix:search.page","pl",Array(
        "TAGS_SORT" => "NAME",
        "TAGS_PAGE_ELEMENTS" => "150",
        "TAGS_PERIOD" => "30",
        "TAGS_URL_SEARCH" => "/search.php",
        "TAGS_INHERIT" => "Y",
        "FONT_MAX" => "50",
        "FONT_MIN" => "10",
        "COLOR_NEW" => "000000",
        "COLOR_OLD" => "C8C8C8",
        "PERIOD_NEW_TAGS" => "",
        "SHOW_CHAIN" => "Y",
        "COLOR_TYPE" => "Y",
        "WIDTH" => "100%",
        "USE_SUGGEST" => "Y",
        "SHOW_RATING" => "Y",
        "PATH_TO_USER_PROFILE" => "",
        "AJAX_MODE" => "N",
        "RESTART" => "Y",
        "NO_WORD_LOGIC" => "N",
        "USE_LANGUAGE_GUESS" => "Y",
        "CHECK_DATES" => "Y",
        "USE_TITLE_RANK" => "Y",
        "DEFAULT_SORT" => "rank",
        "FILTER_NAME" => "",
        "arrFILTER" => array("iblock_news"),
        "arrFILTER_iblock_news" => array(0=>"34"),
        "SHOW_WHERE" => "N",
        "arrWHERE" => array(),
        "SHOW_WHEN" => "N",
        "SHOW_ITEM_DATE_CHANGE" =>"N",
        "PAGE_RESULT_COUNT" => "9",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "DISPLAY_TOP_PAGER" => "Y",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_TITLE" => "Результаты поиска",
        "PAGER_SHOW_ALWAYS" => "Y",
        "PAGER_TEMPLATE" => "",
        "AJAX_OPTION_SHADOW" => "Y",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => ""
    )
);?>

</div>
    </div>

    <!-- SIDEBAR -->


        </div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>