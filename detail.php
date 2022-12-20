<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
if(substr_count($_SERVER["REQUEST_URI"],"?")>0) LocalRedirect($APPLICATION->GetCurDir(), true, "301 Moved permanently");
//$APPLICATION->SetTitle("Title");
?>
        <!-- POST WITH IMAGE -->
<?if($USER->GetID()!=1000 && in_array("1", $USER->GetUserGroupArray())){
    $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/include/hide-art.php", array("CODE"=>$_REQUEST["CODE"]));
}else{
    $APPLICATION->IncludeComponent("bitrix:news.detail","pl",Array(
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "USE_SHARE" => "Y",
            "SHARE_HIDE" => "N",
            "SHARE_TEMPLATE" => "",
            "SHARE_HANDLERS" => array("delicious"),
            "SHARE_SHORTEN_URL_LOGIN" => "",
            "SHARE_SHORTEN_URL_KEY" => "",
            "AJAX_MODE" => "N",
            "IBLOCK_TYPE" => "news",
            "IBLOCK_ID" => "34",
            "ELEMENT_ID" => "",
            "ELEMENT_CODE" => $_REQUEST["CODE"],
            "CHECK_DATES" => "Y",
            "FIELD_CODE" => Array("ID", "PREVIEW_PICTURE", "TAGS", "SECTION_CODE"),
            "PROPERTY_CODE" => Array("RESOURSE", "PHOTOS", "NEW_TMP"),
            "IBLOCK_URL" => "news.php?ID=#IBLOCK_ID#\"",
            "DETAIL_URL" => "",
            "SET_TITLE" => "Y",
            "SET_CANONICAL_URL" => "Y",
            "SET_BROWSER_TITLE" => "Y",
            "BROWSER_TITLE" => "-",
            "SET_META_KEYWORDS" => "Y",
            "META_KEYWORDS" => "-",
            "SET_META_DESCRIPTION" => "Y",
            "META_DESCRIPTION" => "-",
            "SET_STATUS_404" => "Y",
            "SET_LAST_MODIFIED" => "Y",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
            "ADD_SECTIONS_CHAIN" => "Y",
            "ADD_ELEMENT_CHAIN" => "N",
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "USE_PERMISSIONS" => "N",
            "GROUP_PERMISSIONS" => Array(),
            "CACHE_TYPE" => "N",
            "CACHE_TIME" => "3600",
            "CACHE_GROUPS" => "Y",
            "DISPLAY_TOP_PAGER" => "Y",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "PAGER_TITLE" => "Страница",
            "PAGER_TEMPLATE" => "",
            "PAGER_SHOW_ALL" => "Y",
            "PAGER_BASE_LINK_ENABLE" => "Y",
            "SHOW_404" => "Y",
            "FILE_404" => "/404.php",
            "MESSAGE_404" => "",
            "STRICT_SECTION_CHECK" => "Y",
            "PAGER_BASE_LINK" => "",
            "PAGER_PARAMS_NAME" => "arrPager",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "N",
            "AJAX_OPTION_HISTORY" => "N"
        )
    );
}

        ?>



    <!-- SIDEBAR -->


<!--    </div>-->


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>