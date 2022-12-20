<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;


//string tags in array
$arTags=explode(",",$arResult["TAGS"]);
$arResult["arTAGS"]=$arTags;

CModule::IncludeModule("iblock");
$arSec=end($arResult['SECTION']);
$arFilter = Array(
    "IBLOCK_ID"=>$arSec[0]["IBLOCK_ID"],
    "!ID" => $arResult['ID'],
    "ACTIVE" => "Y"
);
//$arResult['RAND_ELEMENT']["FILTER"]=$arFilter;
$res = CIBlockElement::GetList(Array("RAND"=>"ASC"), $arFilter, false, Array ("nTopCount" => 3));
while($ar_fields = $res->GetNext())
{
    $arResult['RAND_ELEMENT'][] = array("NAME" => $ar_fields["NAME"], "PREVIEW_PICTURE" => CFile::GetPath($ar_fields["PREVIEW_PICTURE"]), "DETAIL_PAGE_URL" => $ar_fields["DETAIL_PAGE_URL"]) ;
}
$arParams['TEST']="data in cash";

//formating text
if($arResult["ID"]>507 || $arResult['DISPLAY_PROPERTIES']['NEW_TMP']['VALUE']==1){
    $nDETAIL_TEXT=explode("\n", strip_tags($arResult["DETAIL_TEXT"]));
    $arSearch=array(
        '[h]',
        '[/h]',
        '[cc]',
        '[/cc]',
        '[cl]',
        '[/cl]',
        '[cr]',
        '[/cr]',
        '[line]',
        '[/line]',
        '[row]',
        '[/row]',
        '[imgl',
        '[imgr',
        '[imgc',
        '[imgf',
        '[b]',
        '[/b]',
        '[ls]',
        '[/ls]',
        '[link=',
        ';]',
        '[/link]'
    );
    $arReplace=array(
        '<h3>',
        '</h3>',
        '<blockquote class="fa fa-quote-left"><p>',
        '</p></blockquote>',
        '<blockquote class="fa fa-quote-left alignleft"><p>',
        '</p></blockquote>',
        '<blockquote class="fa fa-quote-left alignright"><p>',
        '</p></blockquote>',
        '<div class="img-in-line">',
        '</div>',
        '<div class="img-in-row">',
        '</div>',
        '<div class="alignleft img"><img ',
        '<div class="alignright img"><img ',
        '<div class="aligncenter img"><img ',
        '<div class="full-width-image"><img ',
        '<span style="font-weight: bold">',
        '</span>',
        '<div class="list">',
        '</div>',
        '<a target="_blank" href="',
        '">',
        '</a>'
    );
    foreach($arResult['DISPLAY_PROPERTIES']['PHOTOS']['FILE_VALUE'] as $num=>$pPhoto){
        $arSearch[]='_'.(1+$num).']';
        if(strlen($pPhoto['DESCRIPTION'])>2)
        $arReplace[]='src="'.$pPhoto['SRC'].'" alt="'.str_replace('"','&quot;',$pPhoto['DESCRIPTION']).'" data-pin-description="'.str_replace('"','&quot;',$pPhoto['DESCRIPTION']).'"><div class="subtitle-img">'.str_replace('"','&quot;',$pPhoto['DESCRIPTION']).'</div></div>';
        else
            $arReplace[]='src="'.$pPhoto['SRC'].'" alt="'.str_replace('"','&quot;',$arResult['NAME']).'" data-pin-description="'.str_replace('"','&quot;',$arResult['NAME']).'"></div>';
    }
    $arTmp=array();
    foreach($nDETAIL_TEXT as $str){
        $tmpStr=str_replace($arSearch,$arReplace,$str,$cntRepl);
        if($cntRepl==0)$tmpStr="<p>".$tmpStr."</p>";
        $arTmp[]=$tmpStr;
    }
    $arResult["DETAIL_TEXT"]=implode($arTmp,'');
}
$cp = $this->__component; // объект компонента

if (is_object($cp))
{
    // добавим в arResult компонента два поля - MY_TITLE и IS_OBJECT
    if(is_array( $arResult['DETAIL_PICTURE'])) $cp->arResult['og_image'] = 'http://'.$_SERVER['SERVER_NAME'].$arResult['DETAIL_PICTURE']['SRC'];
    else $cp->arResult['og_image'] = 'http://'.$_SERVER['SERVER_NAME'].$arResult['PREVIEW_PICTURE']['SRC'];
    $cp->arResult['og_description'] = str_replace(array("\r", "\n"), "",TruncateText(strip_tags($arResult['DETAIL_TEXT']),300));
    $cp->SetResultCacheKeys(array('og_image','og_description'));
    // сохраним их в копии arResult, с которой работает шаблон
    $arResult['og_image'] = $cp->arResult['og_image'];
    $arResult['og_description'] = $cp->arResult['og_description'];

}