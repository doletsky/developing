<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;
$aMenuLinksExt = array();


            $aMenuLinksExt = $APPLICATION->IncludeComponent("bitrix:menu.sections", "", array(
                "IS_SEF" => "Y",
                "SEF_BASE_URL" => "",
                "SECTION_PAGE_URL" => "",
                "DETAIL_PAGE_URL" => "",
                "IBLOCK_TYPE" => "news",
                "IBLOCK_ID" => 34,
                "DEPTH_LEVEL" => "2",
                "CACHE_TYPE" => "N",
            ), false, Array('HIDE_ICONS' => 'Y'));


$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>