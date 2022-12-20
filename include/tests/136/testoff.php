 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>


<?php

// Транслитерация строк.

function tlit($st) {

  $st = strtr($st, 

    "абвгдежзийклмнопрстуфыэАБВГДЕЖЗИЙКЛМНОПРСТУФЫЭ",

    "abvgdegziyklmnoprstufieABVGDEGZIYKLMNOPRSTUFIE"

  );

  $st = strtr($st, array(

    'ё'=>"yo",    'х'=>"h",  'ц'=>"ts",  'ч'=>"ch", 'ш'=>"sh",  

    'щ'=>"shch",  'ъ'=>'',   'ь'=>'',    'ю'=>"yu", 'я'=>"ya",

    'Ё'=>"Yo",    'Х'=>"H",  'Ц'=>"Ts",  'Ч'=>"Ch", 'Ш'=>"Sh",

    'Щ'=>"Shch",  'Ъ'=>'',   'Ь'=>'',    'Ю'=>"Yu", 'Я'=>"Ya",

  ));

  return $st;

}


?>



<?
//разделяем ответы и параметры
$param=explode(":",$_REQUEST["param"]);//print_r($param);

//разворачиваем параметры в переменные
parse_str($param[0], $arParam);

  if(CModule::IncludeModule("iblock"))
   {

//обулим ссылку для деактивации теста
$code=$arParam["UID"]."_".$arParam["PID"]."_".$arParam["TID"];


$arSelect = Array("IBLOCK_ID", "ID", "NAME","IBLOCK_SECTION_ID");
$arFilter = Array("IBLOCK_CODE"=>"test_sotrudnica", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "CODE"=>$code);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$ob = $res->GetNext();



$ELEMENT_ID = $ob["ID"];  // код элемента
$PROPERTY_CODE = "LINK";  // код свойства
$PROPERTY_VALUE = "";
// Установим пустое значение ссылки

$IBLOCK_ID = $ob["IBLOCK_ID"];
CIBlockElement::SetPropertyValues($ELEMENT_ID, $IBLOCK_ID, $PROPERTY_VALUE, $PROPERTY_CODE);

//обновим кол-во выполненных тестов пользователем в проекте

$arSelect = Array("IBLOCK_ID", "ID", "NAME", "UF_TEND");
$arFilter = Array("IBLOCK_ID"=>$ob["IBLOCK_ID"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$ob["IBLOCK_SECTION_ID"]);
$sres = CIBlockSection::GetList(Array(), $arFilter, false, $arSelect);
$sob = $sres->GetNext();

$user_test_f=explode("/",$sob["UF_TEND"]);
$user_test_f[0]++;
$bs = new CIBlockSection;


$arFields = Array(
  "IBLOCK_ID" => $ob["IBLOCK_ID"],
  "UF_TEND" => $user_test_f[0]."/".$user_test_f[1]
  );

$res = $bs->Update($ob["IBLOCK_SECTION_ID"], $arFields);


//создаем массив для индивид. отчета csv
$test_name=$ob["NAME"];

$rsUser = CUser::GetByID($arParam["UID"]);
$arUser = $rsUser->Fetch();

$user_name=$arUser["NAME"]." ".$arUser["LAST_NAME"];
$test_user=$arUser["NAME"]." ".$arUser["LAST_NAME"].", ".$arUser["EMAIL"];
$test_data=ConvertTimeStamp();

//читаем результат из проекта теста пользователя
$code=$arParam["PID"]."_".$arParam["UID"]."_".$arParam["TID"];
$arSelect = Array("IBLOCK_ID", "ID", "NAME", "PROPERTY_ANS_OK");
$arFilter = Array("IBLOCK_CODE"=>"result", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "CODE"=>$code);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$ob = $res->GetNext();
$resl=explode(";",$ob["PROPERTY_ANS_OK_VALUE"]);
array_splice($resl, 0, 1);
$resAns=array();
foreach($resl as $r)
$resAns=array_merge(explode(":",$r),$resAns);

//читаем вопросы
$arSelect = Array("IBLOCK_ID", "ID", "NAME", "SECTION_ID", "PROPERTY_ANS");
$arFilter = Array("IBLOCK_CODE"=>"tests", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "SECTION_ID"=>$arParam["TID"]);
$tres = CIBlockElement::GetList(Array("ID"=>"ASC","PROPERTY_ANS"=>"ASC"), $arFilter, false, false, $arSelect);
while($tob = $tres->GetNext()){
 if(in_array($tob["PROPERTY_ANS_VALUE_ID"],$resAns))  $data[$tob["NAME"]].=";".$tob["PROPERTY_ANS_VALUE"];

}
$str_data=$test_user.";".$test_name.";".$test_data."\n";
foreach($data as $k=>$v) $str_data.=$k.";".str_replace(";", "/", substr($v,1))."\n";

//проверить наличие папки upload/tests (создать)

$filename = $_SERVER["DOCUMENT_ROOT"].'/upload/tests';

if (file_exists($filename)) {
    //echo "The file $filename exists";
} else {
    mkdir($filename);
    //echo "The file $filename created";
}

//сохранить с уникальным именем $code
// индивидуальный отчет

echo $fname=tlit(str_replace(" ", "_", $user_name));
file_put_contents ( $filename."/".$code.".csv", $str_data);



//индивид-сводный отчет

$sum_data=str_replace("\n", ";", $str_data);
$old=file_get_contents ( $filename."/SV_".$arParam["PID"].".csv", $str_data);
file_put_contents ( $filename."/SV_".$arParam["PID"].".csv", $old.$sum_data."\n");




//зарег. в системе и присоединить к элементу результата

 $ELEMENT_ID = $ob["ID"];  // код элемента
 $PROPERTY_CODE = "CSV";  // код свойства
//$PROPERTY_VALUE = CFile::MakeFileArray($filename."/".$code.".csv");  // значение свойства

// Установим новое значение ответа

  $IBLOCK_ID = $ob["IBLOCK_ID"];
//echo CIBlockElement::SetPropertyValues($ELEMENT_ID, $IBLOCK_ID, $PROPERTY_VALUE, $PROPERTY_CODE);

//запишем общестатистический csv

$sum_data=str_replace("\n", ";", $str_data);
$old=file_get_contents ( $filename."/".$arParam["TID"].".csv");
file_put_contents ( $filename."/".$arParam["TID"].".csv", $old.$sum_data."\n");



//сводный по группе тестируемых и группе тестов

$sum_data=str_replace("\n", ";", $str_data);
$old=file_get_contents ( $filename."/".$arParam["PID"].".csv");
$sdnew=array();$flg=1;

if(strlen($old)){
$sa=str_replace("\n", "??", $old);
$old2=explode("??",$sa);
foreach($old2 as $ln){ if(strlen($ln)) {
 if($flg&&substr_count($ln, $user_name)){ $sdnew[]=$ln; $sdnew[]=$sum_data; $flg=0;}
 else $sdnew[]=$ln;            }
}
         }
else {$sdnew[]=$sum_data;$flg=0;}
if($flg) $sdnew[]=$sum_data;
$nStr=implode("??", $sdnew);
$sa=str_replace("??", "\n", $nStr);

file_put_contents ( $filename."/".$arParam["PID"].".csv", $sa);


   } 