<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
$fstr=file_get_contents ( $_SERVER["DOCUMENT_ROOT"].'/upload/tests/427_16_121.csv');
?>
<pre><?print_r($fstr)?></pre>