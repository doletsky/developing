<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;
$arResult['HIDE_ELEMENT']=array();
if(in_array("1", $USER->GetUserGroupArray())){
    CModule::IncludeModule("iblock");
//$arSec=end($arResult['SECTION']);
    $arFilter = Array(
    "IBLOCK_ID"=>$arResult["ID"],
        "ACTIVE" => "N"
    );
    $res = CIBlockElement::GetList(Array("created_date"=>"DESC"), $arFilter);
    while($ar_fields = $res->GetNext())
    {
        $arResult['HIDE_ELEMENT'][] = array("NAME" => $ar_fields["NAME"], "PREVIEW_PICTURE" => CFile::GetPath($ar_fields["PREVIEW_PICTURE"]), "DETAIL_PAGE_URL" => $ar_fields["DETAIL_PAGE_URL"]) ;
    }
}
