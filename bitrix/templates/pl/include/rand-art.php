<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("iblock");
$arFilter = Array(
    "IBLOCK_CODE"=>'articles',
    "ACTIVE"=>"Y"
);
if($REQUIRED_ID>0){
    $arFilter["!ID"]=$REQUIRED_ID;
    $resOne = CIBlockElement::GetByID($REQUIRED_ID);
    if($ar_resOne = $resOne->GetNext()){
        $arResult['RAND_ELEMENT'][] = array("NAME" => $ar_resOne["NAME"], "PREVIEW_PICTURE" => CFile::GetPath($ar_resOne["PREVIEW_PICTURE"]), "DETAIL_PAGE_URL" => $ar_resOne["DETAIL_PAGE_URL"]) ;
    }
}

$res = CIBlockElement::GetList(Array("RAND"=>"ASC"), $arFilter, false, Array ("nTopCount" => 3));
while($ar_fields = $res->GetNext())
{
    $arResult['RAND_ELEMENT'][] = array("NAME" => $ar_fields["NAME"], "PREVIEW_PICTURE" => CFile::GetPath($ar_fields["PREVIEW_PICTURE"]), "DETAIL_PAGE_URL" => $ar_fields["DETAIL_PAGE_URL"]) ;
}?>
<article id="post-249" class="post-249 page type-page status-publish has-post-thumbnail hentry">
    <div class="entry-content">
        <h4 style="text-align: center">Возможно Вам будет интересно:</h4>
        <section id="mt-projects">

            <div class="grid grid-pad">

                <?$i=0;
                foreach($arResult['RAND_ELEMENT'] as $k=>$el):$i++;?>
                    <div class="col-1-3 mt-column-clear" style="padding: 5px">
                        <div class="project-box">
                            <a href="<?=$el["DETAIL_PAGE_URL"]?>">
                                <div class="project-content">
                                    <div>
                                                <span>
                                                    <h3><?=$el["NAME"]?></h3>
                                                    <div id="recom" class="project-bg">
                                                        <img src="<?=$el["PREVIEW_PICTURE"]?>" alt="<?=$el["NAME"]?>">
                                                    </div>
                                                </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?if($i>2) break;endforeach?>

            </div>
        </section>
    </div><!-- .entry-content -->

</article>