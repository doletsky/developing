<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;

$cp = $this->__component; // объект компонента

if (is_object($cp))
{
    // добавим в arResult компонента два поля - MY_TITLE и IS_OBJECT
    $cp->arResult['og_image'] = 'http://placetolive.ru'.$arResult['PREVIEW_PICTURE']['SRC'];
    $cp->arResult['og_description'] = str_replace(array("\r", "\n"), "",TruncateText(strip_tags($arResult['DETAIL_TEXT']),300));
    $cp->SetResultCacheKeys(array('og_image','og_description'));
    // сохраним их в копии arResult, с которой работает шаблон
    $arResult['og_image'] = $cp->arResult['og_image'];
    $arResult['og_description'] = $cp->arResult['og_description'];

}
//string tags in array
$arTags=explode(",",$arResult["TAGS"]);
$arResult["arTAGS"]=$arTags;

CModule::IncludeModule("iblock");
$arSec=end($arResult['SECTION']);
$arFilter = Array(
    "IBLOCK_ID"=>$arSec[0]["IBLOCK_ID"],
    "!ID" => $arResult['ID']
);
//$arResult['RAND_ELEMENT']["FILTER"]=$arFilter;
$res = CIBlockElement::GetList(Array("RAND"=>"ASC"), $arFilter, false, Array ("nTopCount" => 6));
while($ar_fields = $res->GetNext())
{
    $arResult['RAND_ELEMENT'][] = array("NAME" => $ar_fields["NAME"], "PREVIEW_PICTURE" => CFile::GetPath($ar_fields["PREVIEW_PICTURE"]), "DETAIL_PAGE_URL" => $ar_fields["DETAIL_PAGE_URL"]) ;
}
$arParams['TEST']="data in cash";