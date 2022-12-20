<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?//разделяем ответы и параметры
$param=explode(":",$_REQUEST["param"]);//print_r($param);

//разворачиваем параметры в переменные
parse_str($param[0], $arParam);
  if(CModule::IncludeModule("iblock"))
   { 
if(1){
//читаем переменную с именем страницы
foreach($arParam as $k=>$v){if($k!="PID"&&$k!="UID"&&$k!="TID"){$page_name=$k;$page_value=$v;}}

//получаем строку ответов
$str_ans="";
for($i=1;$i<count($param);$i++)$str_ans.=":".$param[$i];

//читаем результат из проекта теста пользователя
$code=$arParam["PID"]."_".$arParam["UID"]."_".$arParam["TID"];
$arSelect = Array("IBLOCK_ID", "ID", "NAME", "PROPERTY_ANS_OK");
$arFilter = Array("IBLOCK_CODE"=>"result", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "CODE"=>$code);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$ob = $res->GetNext();
echo $stepValue=$ob["PROPERTY_ANS_OK_VALUE"];


//проверяем, пустой - пишем полностью, уже есть - пишем страницу:ответы
$new_stepValue=$page_name."=".$page_value.$str_ans;
if(strlen($stepValue))$stepValue.=";".$new_stepValue;
else $stepValue="PID=".$arParam["PID"]."&UID=".$arParam["UID"]."&TID=".$arParam["TID"].";".$new_stepValue;


 $ELEMENT_ID = $ob["ID"];  // код элемента
 $PROPERTY_CODE = "ANS_OK";  // код свойства
 $PROPERTY_VALUE = $stepValue;  // значение свойства

// Установим новое значение ответа

  $IBLOCK_ID = $ob["IBLOCK_ID"];
  echo CIBlockElement::SetPropertyValues($ELEMENT_ID, $IBLOCK_ID, $PROPERTY_VALUE, $PROPERTY_CODE);

$PROPERTY_CODE = "STATUS";  // код свойства
$PROPERTY_VALUE = $page_value;  // значение свойства

// Установим новое значение статуса

  echo CIBlockElement::SetPropertyValues($ELEMENT_ID, $IBLOCK_ID, $PROPERTY_VALUE, $PROPERTY_CODE);

//обновим статистику теста
$code="STAT_".$arParam["PID"]."_".$arParam["UID"]."_".$arParam["TID"];
$arSelect = Array("IBLOCK_ID", "ID", "NAME", "PROPERTY_OK_NUM");
$arFilter = Array("IBLOCK_CODE"=>"statistic", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "CODE"=>$code);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$ob = $res->GetNext();
?><pre><?print_r($arFilter)?></pre><?
$ELEMENT_ID = $ob["ID"];  // код элемента
$PROPERTY_CODE = "OK_NUM";  // код свойства
$stat=explode("/",$ob["PROPERTY_OK_NUM_VALUE"]);
$PROPERTY_VALUE = $page_value."/".$stat[1];  // значение свойства

// Установим новое значение ссылки

  $IBLOCK_ID = $ob["IBLOCK_ID"];
  echo CIBlockElement::SetPropertyValues($ELEMENT_ID, $IBLOCK_ID, $PROPERTY_VALUE, $PROPERTY_CODE);

//обновим ссылку для возобновления прерванного теста
$code=$arParam["UID"]."_".$arParam["PID"]."_".$arParam["TID"];
$arSelect = Array("IBLOCK_ID", "ID", "NAME");
$arFilter = Array("IBLOCK_CODE"=>"test_sotrudnica", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "CODE"=>$code);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$ob = $res->GetNext();

$ELEMENT_ID = $ob["ID"];  // код элемента
$PROPERTY_CODE = "LINK";  // код свойства
$page_next=$page_value+1;
$PROPERTY_VALUE = "PID=".$arParam["PID"]."&UID=".$arParam["UID"]."&TID=".$arParam["TID"]."&".$page_name."=".$page_next;  // значение свойства

// Установим новое значение ссылки

  $IBLOCK_ID = $ob["IBLOCK_ID"];
  echo CIBlockElement::SetPropertyValues($ELEMENT_ID, $IBLOCK_ID, $PROPERTY_VALUE, $PROPERTY_CODE);

}
//возвращем true/false
   } 

?>true<?//print_r($_REQUEST)?>
