<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="col-1-4 bm">
    <ul id="menu-primary-menu" class="menu">
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item current_page_item">
            <a href="/">Главная</a></li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="/sections.php">Разделы</a></li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/chromatic_circle.php">Хроматический круг</a></li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/colors_image/">Палитра цветов</a></li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/search.php">Найти</a></li>
    </ul>
</div>
<div class="col-1-4 bm">

    <ul class="menu">
        <?foreach($arResult as $arItem):?>
            <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
        <?endforeach?>
    </ul>
</div>