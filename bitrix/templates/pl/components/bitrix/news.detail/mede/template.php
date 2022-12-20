<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<!--<pre>--><?//print_r($arResult)?><!--</pre>-->
<!-- BREADCRUMBS NAVIGATION -->
<div class="leftBox">
    <div class="social">
        <a target="_blank" href="http://www.facebook.com/sharer.php?u=http://placetolive.ru<?=$APPLICATION->GetCurDir();?>" class="facebook" style="background-color: rgb(136, 136, 136);"><span style="left: 50%; right: 50%; top: 50%; bottom: 50%;"></span></a><br>
        <a target="_blank" href="https://vk.com/share.php?url=http://placetolive.ru<?=$APPLICATION->GetCurDir();?>" class="vk" style="background-color: rgb(136, 136, 136);"><span style="left: 50%; right: 50%; top: 50%; bottom: 50%;"></span></a>
    </div>
</div>

<div class="breadcrumb clearfix bottom-50">
    <div class="alignleft">
        <a href="/">Главная</a><img src="/images/breadcr-dvdr.gif" alt=""><a href="/list.php">Статьи</a><img src="/images/breadcr-dvdr.gif" alt=""><a href="<?=end($arResult['SECTION']['PATH'])['SECTION_PAGE_URL']?>"><?=end($arResult['SECTION']['PATH'])['NAME']?></a>
    </div>
</div>

<div class="wrap690">

<div class="post-img bottom-50">
    <h3 class="bottom-20"><?=$arResult['NAME']?></h3>

    <div class="proj-img1 bottom-20">
        <a class="prettyPhoto zoom" href="<?=$arResult['PREVIEW_PICTURE']['SRC']?>">
            <img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arResult['PREVIEW_PICTURE']['ALT']?>" title="<?=$arResult['PREVIEW_PICTURE']['ALT']?>"></a>
    </div>
    <?=$arResult['DETAIL_TEXT']?>

</div>
    <?if(strlen($arResult['DISPLAY_PROPERTIES']['RESOURSE']['VALUE']))://?>
        <p>Источник: <?=$arResult['DISPLAY_PROPERTIES']['RESOURSE']['VALUE']?></p>
    <?endif?>
</div>

<div class="sidebar col1-4 omega">

    <?if(count($arResult['arTAGS'])>1):?>
    <div class="widget_tag_cloud bottom-40">
        <h5>Теги статьи</h5>

        <ul>
            <?foreach($arResult['arTAGS'] as $tag):?>
            <li><a href="/search.php?tags=<?=$tag?>"><?=$tag?></a></li>
            <?endforeach?>
        </ul>
    </div>
    <?endif?>

    <div class="min_img bottom-40">
        <h5>Еще статьи</h5>
        <div id="" class="min_img_container clearfix">
            <div class="min_img_images clearfix">
                <?foreach($arResult['RAND_ELEMENT'] as $k=>$el):?>
                <div class="min_img_image" style="width: 64px; height: 64px;">
<!--                    <a href="--><?//=$el["DETAIL_PAGE_URL"]?><!--">-->
                        <img src="<?=$el["PREVIEW_PICTURE"]?>" alt="<?=$el["NAME"]?>" style="cursor:pointer; width: 64px;" onclick="location.href='<?=$el["DETAIL_PAGE_URL"]?>';">
<!--                    </a>-->
                </div>
                <?endforeach?>
            </div>
        </div>
    </div>

</div>