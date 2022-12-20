<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("iblock");
$arFilter = Array(
    "IBLOCK_CODE"=>'articles',
    "CODE" => $CODE
);
$arSelect = array(
    "ID",
    "IBLOCK_ID",
    "NAME",
    "PREVIEW_PICTURE",
    "DETAIL_PAGE_URL",
    "DETAIL_TEXT",
    "IBLOCK_SECTION_ID",
    "PROPERTY_RESOURSE",
    "PROPERTY_NEW_TMP"
);
$res = CIBlockElement::GetList(Array("created_date"=>"DESC"), $arFilter, false, false, $arSelect);
if($ar_fields = $res->GetNext())
{

    $APPLICATION->SetTitle($ar_fields['NAME']);
    $ar_fields["PREVIEW_PICTURE_SRC"]=CFile::GetPath($ar_fields["PREVIEW_PICTURE"]);

    $resSec = CIBlockSection::GetByID($ar_fields["IBLOCK_SECTION_ID"]);
    if($arSec = $resSec->GetNext())
        $ar_fields["SECTION"]=$arSec;

    $VALUES = array();
    $resFields = CIBlockElement::GetProperty($ar_fields["IBLOCK_ID"], $ar_fields["ID"], "sort", "asc", array("CODE" => "PHOTOS"));
    while ($ob = $resFields->GetNext())
    {
        $VALUES[] = array("SRC" => CFile::GetPath($ob['VALUE']), "DESCRIPTION" => $ob["DESCRIPTION"]);
    }
    $ar_fields["PHOTOS"]=$VALUES;

    if($ar_fields["ID"]>507 || $ar_fields['PROPERTY_NEW_TMP_VALUE']==1){
        $nDETAIL_TEXT=explode("\n", strip_tags($ar_fields["DETAIL_TEXT"]));
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
        foreach($ar_fields['PHOTOS'] as $num=>$pPhoto){
            $arSearch[]='_'.(1+$num).']';
            if(strlen($pPhoto['DESCRIPTION'])>2)
                $arReplace[]='src="'.$pPhoto['SRC'].'" alt="'.$pPhoto['DESCRIPTION'].'"><div class="subtitle-img">'.$pPhoto['DESCRIPTION'].'</div></div>';
            else
                $arReplace[]='src="'.$pPhoto['SRC'].'" alt="'.$ar_fields['NAME'].'"></div>';
        }
        $arTmp=array();
        foreach($nDETAIL_TEXT as $str){
            $tmpStr=str_replace($arSearch,$arReplace,$str,$cntRepl);
            if($cntRepl==0)$tmpStr="<p>".$tmpStr."</p>";
            $arTmp[]=$tmpStr;
        }
        $ar_fields["DETAIL_TEXT"]=implode($arTmp,'');
    }
?>
    <?if(0&&$USER->GetID()==1):?>
    <pre><?print_r($ar_fields)?></pre>
<?endif?>
    <header class="page-entry-header">
        <div class="grid grid-pad overflow">
            <div class="col-1-1">
                <div class="animated fadeInUp delay">
                    <h1 class="entry-title"><?$APPLICATION->ShowTitle()?></h1>
                </div>
            </div>
        </div>
        <div class="page-bg-image" data-parallax="scroll" data-image-src="<?=$ar_fields['PREVIEW_PICTURE_SRC']?>" data-z-index="1">
        </div>
    </header><!-- .entry-header -->

    <section id="page-content-container" class="animated fadeIn delay-2">
        <div class="grid grid-pad page-contain-full">
            <div class="col-1-1">

                <div id="primary" class="content-area shortcodes">
                    <main id="main" class="site-main" role="main">
                        <div class="main-navigation breadcrump">
                            <ul>
                                <li><a href="/">Главная</a></li>
                                <li><a href="<?=$ar_fields['SECTION']['SECTION_PAGE_URL']?>"><?=$ar_fields['SECTION']['NAME']?></a></li>
                            </ul>
                        </div>

                        <article id="post-25" class="post-25 page type-page status-publish has-post-thumbnail hentry">
                            <div class="entry-content">
                                <?=$ar_fields['DETAIL_TEXT']?>
                                <?if(strlen($ar_fields['PROPERTY_RESOURSE_VALUE'])):?>
                                    <p>Источник: <?=$ar_fields['PROPERTY_RESOURSE_VALUE']?></p>
                                <?endif?>
                            </div>
                            <!-- .entry-content -->

                            <div class="social">
                                <span>Поделиться статьей: </span>
                                <a target="_blank" href="http://www.facebook.com/sharer.php?u=http://<?=$_SERVER['SERVER_NAME']?><?=$APPLICATION->GetCurPage()?>">
                                    <i class="fa fa-facebook"></i> </a>
                                <a target="_blank" href="https://vk.com/share.php?url=http://<?=$_SERVER['SERVER_NAME']?>/<?=$APPLICATION->GetCurPage()?>" >
                                    <i class="fa fa-vk"></i> </a>
                            </div>
                        </article><!-- #post-## -->





                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
        </div>
    </section>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/detail_script.js");?>
<?}?>
