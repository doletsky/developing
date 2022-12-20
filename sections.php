<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Разделы");
?>
    <header class="page-entry-header">
        <div class="grid grid-pad overflow">
            <div class="col-1-1">
                <div class="animated fadeInUp delay">
                        <h1 class="entry-title">Разделы</h1>
                </div>
            </div>
        </div>


        <div class="page-bg-image" data-parallax="scroll" data-image-src="<?=SITE_TEMPLATE_PATH?>/images/sections.jpg?<?echo time()?>" data-z-index="1">
            <img class="page-bg-image" data-parallax="scroll" src="<?=SITE_TEMPLATE_PATH?>/images/sections.jpg?<?echo time()?>" data-z-index="1">
        </div>



    </header><!-- .entry-header -->

<div class="home-widget home-widget-one shortcodes"><a name="anonces"></a>

    <div class="grid grid-pad">
    <div class="col-1-1">
    <div class="main-navigation breadcrump">
        <ul>
            <li><a href="/">Главная</a></li>
                <li>Разделы</li>
        </ul>
    </div>


<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list","pl",
    Array(
        "VIEW_MODE" => "TEXT",
        "SHOW_PARENT_NAME" => "Y",
        "IBLOCK_TYPE" => "",
        "IBLOCK_ID" => "34",
        "SECTION_ID" => "",
        "SECTION_CODE" => "",
        "SECTION_URL" => "",
        "COUNT_ELEMENTS" => "Y",
        "TOP_DEPTH" => "2",
        "SECTION_FIELDS" => "PICTURE",
        "SECTION_USER_FIELDS" => "",
        "ADD_SECTIONS_CHAIN" => "Y",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_NOTES" => "",
        "CACHE_GROUPS" => "Y"
    )
);?>


    </div>
    </div>
</div>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>