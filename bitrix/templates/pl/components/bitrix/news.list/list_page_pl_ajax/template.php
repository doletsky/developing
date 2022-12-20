<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


                    <?foreach($arResult["ITEMS"] as $cnt=>$arItem): if($arParams['NEWS_COUNT']==$cnt) break;?>
                        <div class="col-1-2 mt-column-clear" style="display: none">
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
