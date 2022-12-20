<?php
AddEventHandler("iblock", "OnBeforeIBlockElementAdd", Array("MyClass", "translitNamePrePic"));
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("MyClass", "translitNamePrePic"));

class MyClass
{
    function translitNamePrePic(&$arFields)
    {

        if(strlen($arFields['PREVIEW_PICTURE']['name'])>0){
            if ( preg_match( '~[à-ÿÀ-ß¨¸]~',$arFields['PREVIEW_PICTURE']['name'] ) ){
                $trlit = Cutil::translit($arFields['PREVIEW_PICTURE']['name'],"ru", array('safe_chars'=>'.'));
                $arFields['PREVIEW_PICTURE']['name']=$trlit;
            }
        }
    }
}

AddEventHandler("main", "OnEpilog", "Redirect404");
function Redirect404() {
    if(
        !defined('ADMIN_SECTION') &&
        defined("ERROR_404")
    ) {
        global $APPLICATION;
        $APPLICATION->RestartBuffer();
//        CHTTP::SetStatus("404 Not Found");
        include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/header.php");
        include($_SERVER["DOCUMENT_ROOT"]."/404.php");
        include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/footer.php");
    }
}