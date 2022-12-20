<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<!--<pre>--><?//print_r($arResult)?><!--</pre>-->

<section id="mt-projects">

    <div class="grid grid-pad overflow">

        <?foreach($arResult["SECTIONS"] as $cnt=>$arItem):?>
            <div class="col-1-2 mt-column-clear">
                <div class="project-box">
                    <a href="<?=$arItem["SECTION_PAGE_URL"]?>">
                        <div class="project-content"><div>

                        <span>

							<h3><?=$arItem["NAME"]?></h3>

                        	<div class="project-bg" style="background-image: url(<?=CFile::GetPath($arItem["DETAIL_PICTURE"])?>);"></div>

                        </span>

                            </div></div>
                    </a>
                </div>
            </div>
        <?endforeach?>

    </div>



</section>
