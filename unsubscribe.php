<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отписка");
?>
    <header class="page-entry-header">
        <div class="grid grid-pad overflow">
            <div class="col-1-1">
                <div class="animated fadeInUp delay">
                        <h1 class="entry-title">Отписка</h1>
                </div>
            </div>
        </div>


        <img class="page-bg-image" data-parallax="scroll" src="<?=SITE_TEMPLATE_PATH?>/images/page-bg.jpg?<?echo time()?>" data-z-index="1">



    </header><!-- .entry-header -->

<div class="home-widget home-widget-one shortcodes"><a name="anonces"></a>

    <div class="grid grid-pad">
    <div class="col-1-1">
    <div class="main-navigation breadcrump">
        <ul>
            <li><a href="/">Главная</a></li>
                <li>Отписка</li>
        </ul>
    </div>

<?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH.'/include/unsubscribe_act.php');?>
<div>
    <p style="color: red">Вы успешно отписались от рассылки.</p>
    <h3>Благодарим за то, что были с нами!<br>Ждем Вас на страницах нашего сайта <a href="http://placetolive.ru">http://placetolive.ru</a> </h3>
</div>


    </div>
    </div>
</div>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>