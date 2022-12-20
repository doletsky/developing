<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
//подключить файл-шаблон письма
require($_SERVER["DOCUMENT_ROOT"]."/include/mailer/tmp1.php");

//подключить список получателей
require($_SERVER["DOCUMENT_ROOT"]."/include/mailer/list.php");

foreach($arTo as $k=>$v){

$tag = str_replace("#FIO#", $k, $strText);
if(mail($v, $strSub, $tag)) echo $v.": отправлено успешно!<br />";
else echo $v.": не удачно.<br />";

}

?>