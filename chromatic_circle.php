<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/include/Mobile_Detect.php");
$APPLICATION->SetTitle("Хроматический круг");
$APPLICATION->SetPageProperty("keywords", "цвет в интерьере, сочетание цветов в интерьере, подбор цвета, подбор цветовой гаммы, подбор цвета стен, хроматический круг, подбор цветов в интерьере");
$APPLICATION->SetPageProperty("description", "Хроматический круг, это онлайн подбор цветовой гаммы, сочетания цветов для интерьера. Эскиз интерьера покажет картину сочетания цветов.");
$detect = new Mobile_Detect;$PC=1;
if($detect->isMobile() || $detect->isTablet()) $PC=0;
?>
    <header class="page-entry-header">
        <div class="grid grid-pad overflow">
            <div class="col-1-1">
                <div class="animated fadeInUp delay">
                    <h1 class="entry-title"><?$APPLICATION->ShowTitle()?></h1>
                </div>
            </div>
        </div>
        <div class="page-bg-image" data-parallax="scroll" data-image-src="<?=SITE_TEMPLATE_PATH."/images/krug_23.jpg"?>" data-z-index="1">
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
        </ul>
    </div>

    <article id="post-25" class="post-25 page type-page status-publish has-post-thumbnail hentry">
    <div class="entry-content first-box">
        <p>
            Хроматичеcкий круг — это онлайн сервис подбора цветовой гаммы для интерьера, вариантов сочетания цветов. Для общего представления<?if($PC==0):?> в полноэкранной версии<?endif;?> мы предложили эскизный вид, который позволит увидеть цельную картину сочетания цветов, подобрать наиболее подходящий.
        </p>
        <?if($PC!=1):?>
        <p class="noMobScr">Страница интерактивного хроматического круга временно доступна только на устройствах с большим разрешением.</p>
        <div class="noteRevert">Поверните устройство на 90<sup>0</sup></div>
        <?endif?>

<?


        if($PC==1){
            $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/include/cromcircle/circle.js");
            $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/include/cromcircle/circle_color.css");
            $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/include/cromcircle/circle_objects.css");
        }else{
            $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/include/cromcircle/circle_mobil.js");
            $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/include/cromcircle/circle_color_mobil.css");
            $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/include/cromcircle/circle_objects_mobil.css");
        }

        $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/include/cromcircle/circle.php",array("PC"=>$PC));


?>
    </div>
        <!-- .entry-content -->

    </article>
        <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/include/rand-art.php", array("REQUIRED_ID"=>"531"));
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/detail_script.js");?>
    </main><!-- #main -->
    </div><!-- #primary -->
    </div>
    </div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>