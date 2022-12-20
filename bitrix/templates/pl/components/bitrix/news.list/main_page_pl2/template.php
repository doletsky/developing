<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!--<section id="mt-projects">-->
<!---->
<!---->
<!--    <div class="grid grid-pad">-->
<!--        <div class="col-1-1">-->
<!--            <h3 class="widget-title">Новые публикации</h3>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="grid grid-pad overflow">-->
<?//foreach($arResult["ITEMS"] as $cnt=>$arItem): if($arParams['NEWS_COUNT']==$cnt) break;?>
<!--    <div class="col-1-2 mt-column-clear">-->
<!--        <div class="project-box">-->
<!--            <a href="--><?//=$arItem["DETAIL_PAGE_URL"]?><!--">-->
<!--                <div class="project-content"><div>-->
<!---->
<!--                        <span>-->
<!---->
<!--							<h3>--><?//=$arItem["NAME"]?><!--</h3>-->
<!---->
<!--                        	<div class="project-bg" style="background-image: url(--><?//=$arItem["PREVIEW_PICTURE"]["SRC"]?><!--);"></div>-->
<!---->
<!--                        </span>-->
<!---->
<!--                    </div></div>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<?//endforeach?>
<!---->
<!--    </div>-->
<!---->
<!---->
<!---->
<!--</section>-->

<h3 class="widget-title">Новые публикации</h3>

<section id="home-news" class="home-news-area">

    <div class="grid grid-pad">

        <?foreach($arResult["ITEMS"] as $cnt=>$arItem): if($arParams['NEWS_COUNT']==$cnt) break;?>
        <div class="col-1-1" style="margin-bottom:10px; ">

            <div class="news-box">
                <div class="news-content">
                    <div>
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><div class="news-image" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);"></div></a>



                        <div class="news-info" style="width:25%;">

                            <div>
                                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                                    <h3><?=$arItem["NAME"]?>.</h3></a>
<!--                                <h6>April 8, 2015</h6>-->
                                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">View More</a>
                            </div>


                        </div>


                    </div>
                </div>
            </div>

        </div><!-- col -->
        <?endforeach?>

    </div><!-- grid -->



    <a href="/proper-lite/blog.html" class="all-news">
        <button>See All</button>
    </a>




</section>