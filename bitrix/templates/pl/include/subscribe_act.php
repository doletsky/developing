<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<!--<pre>--><?//print_r($_REQUEST)?><!--</pre>-->
<!--<pre>--><?//print_r($_SESSION)?><!--</pre>-->
<?
$rsGroups = CGroup::GetList ($by = "c_sort", $order = "asc", Array ("STRING_ID" => 'subscribers'));
$arGroup=$rsGroups->GetNext();
?>
<?
$tmpPass=time();
$user = new CUser;
$arFields = Array(
    "NAME"              => $_REQUEST['name'],
    "EMAIL"             => $_REQUEST['email'],
    "LOGIN"             => $_REQUEST['email'],
    "ACTIVE"            => "Y",
    "GROUP_ID"          => array($arGroup['ID']),
    "ADMIN_NOTES"       => ConvertTimeStamp(false, "FULL")." Подписка оформлена на странице ".$_REQUEST['page'],
    "PASSWORD"          => $tmpPass,
    "CONFIRM_PASSWORD"  => $tmpPass
);

$ID = $user->Add($arFields);
if (intval($ID) > 0){
    echo "Вы успешно подписались. На указанный адрес отправлено подтверждение.";
    /* получатели */
    $to= $_REQUEST['email'];

    /* тема/subject */
    $subject = "Подписка на новые идеи";

    /* сообщение */
    $message = '
<html>
<head>
 <title>Подписка на новые идеи"</title>
</head>
<body>
<p>Здравствуйте!<br>
Вы успешно подписались на новые идеи!<br>
Мы благодарим Вас за то, что Вы с нами!<br>
С уважением команда <a href="http://placetolive.ru">Place to Live!</a></p>
<p><small>Что бы отписаться от рассылки нажмите <a href="http://'.$_SERVER['HTTP_HOST'].'/unsubscribe.php?email='.$_REQUEST['email'].'">Отписаться</a> </small></p>
</body>
</html>
';

    /* Для отправки HTML-почты вы можете установить шапку Content-type. */
    $headers= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=windows-1251\r\n";

    /* дополнительные шапки */
    $headers .= "From: info@placetolive.ru\r\n";
    /* и теперь отправим из */
    mail($to, $subject, $message, $headers);
}

else{
    $errStr=$user->LAST_ERROR;
    if(substr_count($errStr, "уже существует")==1){
        $rsUser = CUser::GetByLogin($arFields["LOGIN"]);
        $arUser = $rsUser->Fetch();
        if($arUser["ACTIVE"]=="N"){
            $fields = Array(
                "ACTIVE"            => "Y",
                "ADMIN_NOTES"       => $arUser["ADMIN_NOTES"]."\n".ConvertTimeStamp(false, "FULL")." Подписка активирована на странице ".$_REQUEST['page']
            );
            $user->Update($arUser["ID"], $fields);
            echo $user->LAST_ERROR;
        }
        echo "На эту почту новые идеи уже отправляются! Если Вы не получаете наши письма, то напишите нам на mail@placetolive.ru!";
    }
    //TODO отправить сообщение об ошибке
}

?>