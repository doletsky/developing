<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
//���������� ����-������ ������
require($_SERVER["DOCUMENT_ROOT"]."/include/mailer/tmp1.php");

//���������� ������ �����������
require($_SERVER["DOCUMENT_ROOT"]."/include/mailer/list.php");

foreach($arTo as $k=>$v){

$tag = str_replace("#FIO#", $k, $strText);
if(mail($v, $strSub, $tag)) echo $v.": ���������� �������!<br />";
else echo $v.": �� ������.<br />";

}

?>