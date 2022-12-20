<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$APPLICATION->AddHeadString('<meta property="og:description" content="'.$arResult['og_description'].'" />');
$APPLICATION->AddHeadString('<meta property="og:image"  content="'.$arResult['og_image'].'" />');
$APPLICATION->SetPageProperty("description", $arResult['og_description']);
?>