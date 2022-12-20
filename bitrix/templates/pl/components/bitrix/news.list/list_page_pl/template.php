<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(!is_array($arResult['SECTION'])){
    include($_SERVER["DOCUMENT_ROOT"]."/404.php");
}else{



$APPLICATION->SetTitle($arResult['SECTION']['PATH'][0]['NAME']);?>




<header class="page-entry-header">
    <div class="grid grid-pad overflow">
        <div class="col-1-1">
            <div class="animated fadeInUp delay">
                <h1 class="entry-title"><?=$arResult['SECTION']['PATH'][0]['NAME']?></h1>
            </div>
        </div>
    </div>


    <div class="page-bg-image" data-parallax="scroll" data-image-src="<?=CFile::GetPath($arResult['SECTION']['PATH'][0]['DETAIL_PICTURE'])?>?<?=time()?>" data-z-index="1">
    <img class="page-bg-image" data-parallax="scroll" src="<?=CFile::GetPath($arResult['SECTION']['PATH'][0]['DETAIL_PICTURE'])?>?<?=time()?>" data-z-index="1"></div>


</header><!-- .entry-header -->

<div class="home-widget home-widget-one shortcodes"><a name="anonces"></a>

    <div class="grid grid-pad">
        <div class="col-1-1">
            <div class="main-navigation breadcrump">
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><?=$arResult['SECTION']['PATH'][0]['NAME']?></li>
                </ul>
            </div>
            <div class="first-letter"><?=$arResult['SECTION']['PATH'][0]['DESCRIPTION']{0}?></div>
            <p style="text-align: left"><?=substr($arResult['SECTION']['PATH'][0]['DESCRIPTION'],1)?></p>

            <section id="mt-projects">



                <div class="grid grid-pad overflow">

                    <?foreach($arResult["ITEMS"] as $cnt=>$arItem): if($arParams['NEWS_COUNT']==$cnt) break;?>
                        <div class="col-1-2 mt-column-clear">
                            <div class="project-box">
                                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                                    <div class="project-content"><div>

                        <span>

							<h3><?=$arItem["NAME"]?></h3>

                        	<div class="project-bg">
                                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>">
                        	</div>

                        </span>

                                        </div></div>
                                </a>
                            </div>
                        </div>
                    <?endforeach?>




                </div>



            </section>
            <div id="fin-content" pcount="<?=$arResult["NAV_RESULT"]->NavPageCount?>" pcurent="1" code="<?=$arParams["PARENT_SECTION_CODE"]?>"></div>









        </div>
    </div>
</div>
<?}?>