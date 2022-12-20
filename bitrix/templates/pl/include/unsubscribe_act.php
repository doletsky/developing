<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<!--<pre>--><?//print_r($_REQUEST)?><!--</pre>-->
<!--<pre>--><?//print_r($_SESSION)?><!--</pre>-->
<?
$rsGroups = CGroup::GetList ($by = "c_sort", $order = "asc", Array ("STRING_ID" => 'subscribers'));
$arGroup=$rsGroups->GetNext();

$user = new CUser;
$rsUser = CUser::GetByLogin($_REQUEST['email']);
$arUser = $rsUser->Fetch();
if($arUser["ACTIVE"]=="Y"){
    $fields = Array(
        "ACTIVE"            => "N",
        "ADMIN_NOTES"       => $arUser["ADMIN_NOTES"]."\n".ConvertTimeStamp(false, "FULL")." Подписка деактивирована"
    );
    $user->Update($arUser["ID"], $fields);
    echo $user->LAST_ERROR;
}

    //TODO отправить на email уведомление подпсчику и администратору

?>