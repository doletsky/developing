<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вдохновение. Красота. Индивидуальность.");
?>
    <div class="home-widget home-widget-one shortcodes"><a name="anonces"></a>
        <div class="grid grid-pad about-text">
            <div class="col-1-1" style="text-align: left">
                <p><div class="first-letter">В</div>ы цените красоту, готовитесь к ремонту квартиры и хотите, чтобы итог этого трудоемкого процесса радовал глаз и вызывал исключительно положительные эмоции?</p>
                <p>Этот сайт создан для вашего вдохновения.</p>
                <p>Здесь вы найдете статьи о том, как создать современный интерьер своими руками, в каком стиле оформить дом, как гармонично сочетать цвета и как грамотно организовать пространство для комфортной жизни.</p>
                <p>Мы поделимся с Вами своими идеями для того, чтобы вы могли наслаждаться результатом.</p>
                <p>Place to Live – проект, созданный для вдохновения, с любовью к красоте и уважением к индивидуальности.</p>
            </div>
        </div>


        <div class="grid grid-pad">
            <div class="col-1-1">
                        <?$APPLICATION->IncludeComponent("bitrix:news.list","main_page_pl",Array(
                                "DISPLAY_DATE" => "Y",
                                "DISPLAY_NAME" => "Y",
                                "DISPLAY_PICTURE" => "Y",
                                "DISPLAY_PREVIEW_TEXT" => "Y",
                                "AJAX_MODE" => "Y",
                                "IBLOCK_TYPE" => "news",
                                "IBLOCK_ID" => "34",
                                "NEWS_COUNT" => "6",
                                "SORT_BY1" => "ACTIVE_FROM",
                                "SORT_ORDER1" => "DESC",
                                "SORT_BY2" => "SORT",
                                "SORT_ORDER2" => "ASC",
                                "FILTER_NAME" => "",
                                "FIELD_CODE" => Array("ID"),
                                "PROPERTY_CODE" => Array("DESCRIPTION"),
                                "CHECK_DATES" => "Y",
                                "DETAIL_URL" => "",
                                "PREVIEW_TRUNCATE_LEN" => "",
                                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                "SET_TITLE" => "N",
                                "SET_BROWSER_TITLE" => "N",
                                "SET_META_KEYWORDS" => "N",
                                "SET_META_DESCRIPTION" => "N",
                                "SET_LAST_MODIFIED" => "Y",
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                "ADD_SECTIONS_CHAIN" => "N",
                                "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
                                "PARENT_SECTION" => "",
                                "PARENT_SECTION_CODE" => "",
                                "INCLUDE_SUBSECTIONS" => "Y",
                                "CACHE_TYPE" => "A",
                                "CACHE_TIME" => "3600",
                                "CACHE_FILTER" => "Y",
                                "CACHE_GROUPS" => "Y",
                                "DISPLAY_TOP_PAGER" => "Y",
                                "DISPLAY_BOTTOM_PAGER" => "Y",
                                "PAGER_TITLE" => "Новости",
                                "PAGER_SHOW_ALWAYS" => "Y",
                                "PAGER_TEMPLATE" => "",
                                "PAGER_DESC_NUMBERING" => "Y",
                                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                "PAGER_SHOW_ALL" => "Y",
                                "PAGER_BASE_LINK_ENABLE" => "Y",
                                "SET_STATUS_404" => "Y",
                                "SHOW_404" => "Y",
                                "MESSAGE_404" => "",
                                "PAGER_BASE_LINK" => "",
                                "PAGER_PARAMS_NAME" => "arrPager",
                                "AJAX_OPTION_JUMP" => "N",
                                "AJAX_OPTION_STYLE" => "Y",
                                "AJAX_OPTION_HISTORY" => "N",
                                "AJAX_OPTION_ADDITIONAL" => ""
                            )
                        );?>


            </div>
        </div>
    </div><!-- .home-widget -->


    </div><!-- #content -->


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>