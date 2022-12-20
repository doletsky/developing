<?php
CModule::IncludeModule("iblock");
foreach($arResult["SEARCH"] as $key=>$arItem){
    $res = CIBlockElement::GetByID($arItem["ITEM_ID"]);
    if($ar_res = $res->GetNext()){
        $arFile = CFile::GetFileArray($ar_res['PREVIEW_PICTURE']);
        $arResult["SEARCH"][$key]["PIC"]=$arFile['SRC'];
        $arResult["SEARCH"][$key]["TEXT"]=TruncateText(strip_tags($ar_res['DETAIL_TEXT']), 150);
        $arResult["SEARCH"][$key]["TITLE_FORMATED"]=strip_tags($arResult["SEARCH"][$key]["TITLE_FORMATED"]);
    }

}

