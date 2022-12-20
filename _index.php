<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?>

    <div class="page">
        <div class="page-col01">

<?$APPLICATION->IncludeComponent("bitrix:system.auth.form","auth_a",Array(
     "REGISTER_URL" => "/auth.php",
     "FORGOT_PASSWORD_URL" => "",
     "PROFILE_URL" => "profile.php",
     "SHOW_ERRORS" => "Y" 
     )
);?>

        </div>
        <div class="page-col02">
            <h1 class="welc-title">Вас приветствует <br/>сервис дистанционного <br/>тестирования S&A.</h1>
        </div>
    </div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>