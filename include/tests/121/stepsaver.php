<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?//��������� ������ � ���������
$param=explode(":",$_REQUEST["param"]);//print_r($param);

//������������� ��������� � ����������
parse_str($param[0], $arParam);
  if(CModule::IncludeModule("iblock"))
   { 
if(1){
//������ ���������� � ������ ��������
foreach($arParam as $k=>$v){if($k!="PID"&&$k!="UID"&&$k!="TID"){$page_name=$k;$page_value=$v;}}

//�������� ������ �������
$str_ans="";
for($i=1;$i<count($param);$i++)$str_ans.=":".$param[$i];

//������ ��������� �� ������� ����� ������������
$code=$arParam["PID"]."_".$arParam["UID"]."_".$arParam["TID"];
$arSelect = Array("IBLOCK_ID", "ID", "NAME", "PROPERTY_ANS_OK");
$arFilter = Array("IBLOCK_CODE"=>"result", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "CODE"=>$code);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$ob = $res->GetNext();
echo $stepValue=$ob["PROPERTY_ANS_OK_VALUE"];


//���������, ������ - ����� ���������, ��� ���� - ����� ��������:������
$new_stepValue=$page_name."=".$page_value.$str_ans;
if(strlen($stepValue))$stepValue.=";".$new_stepValue;
else $stepValue="PID=".$arParam["PID"]."&UID=".$arParam["UID"]."&TID=".$arParam["TID"].";".$new_stepValue;


 $ELEMENT_ID = $ob["ID"];  // ��� ��������
 $PROPERTY_CODE = "ANS_OK";  // ��� ��������
 $PROPERTY_VALUE = $stepValue;  // �������� ��������

// ��������� ����� �������� ������

  $IBLOCK_ID = $ob["IBLOCK_ID"];
  echo CIBlockElement::SetPropertyValues($ELEMENT_ID, $IBLOCK_ID, $PROPERTY_VALUE, $PROPERTY_CODE);

$PROPERTY_CODE = "STATUS";  // ��� ��������
$PROPERTY_VALUE = $page_value;  // �������� ��������

// ��������� ����� �������� �������

  echo CIBlockElement::SetPropertyValues($ELEMENT_ID, $IBLOCK_ID, $PROPERTY_VALUE, $PROPERTY_CODE);

//������� ���������� �����
$code="STAT_".$arParam["PID"]."_".$arParam["UID"]."_".$arParam["TID"];
$arSelect = Array("IBLOCK_ID", "ID", "NAME", "PROPERTY_OK_NUM");
$arFilter = Array("IBLOCK_CODE"=>"statistic", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "CODE"=>$code);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$ob = $res->GetNext();
?><pre><?print_r($arFilter)?></pre><?
$ELEMENT_ID = $ob["ID"];  // ��� ��������
$PROPERTY_CODE = "OK_NUM";  // ��� ��������
$stat=explode("/",$ob["PROPERTY_OK_NUM_VALUE"]);
$PROPERTY_VALUE = $page_value."/".$stat[1];  // �������� ��������

// ��������� ����� �������� ������

  $IBLOCK_ID = $ob["IBLOCK_ID"];
  echo CIBlockElement::SetPropertyValues($ELEMENT_ID, $IBLOCK_ID, $PROPERTY_VALUE, $PROPERTY_CODE);

//������� ������ ��� ������������� ����������� �����
$code=$arParam["UID"]."_".$arParam["PID"]."_".$arParam["TID"];
$arSelect = Array("IBLOCK_ID", "ID", "NAME");
$arFilter = Array("IBLOCK_CODE"=>"test_sotrudnica", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "CODE"=>$code);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$ob = $res->GetNext();

$ELEMENT_ID = $ob["ID"];  // ��� ��������
$PROPERTY_CODE = "LINK";  // ��� ��������
$page_next=$page_value+1;
$PROPERTY_VALUE = "PID=".$arParam["PID"]."&UID=".$arParam["UID"]."&TID=".$arParam["TID"]."&".$page_name."=".$page_next;  // �������� ��������

// ��������� ����� �������� ������

  $IBLOCK_ID = $ob["IBLOCK_ID"];
  echo CIBlockElement::SetPropertyValues($ELEMENT_ID, $IBLOCK_ID, $PROPERTY_VALUE, $PROPERTY_CODE);

}
//��������� true/false
   } 

?>true<?//print_r($_REQUEST)?>
