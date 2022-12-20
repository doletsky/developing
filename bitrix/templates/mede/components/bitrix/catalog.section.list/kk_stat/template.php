<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<pre><?//print_r($arResult)?></pre>

<div class="catalog-section-list">

<?
$par=array("SECTION_ID"=>$_GET["SECTION_ID"]);
$CURRENT_DEPTH=$arResult["SECTION"]["DEPTH_LEVEL"]+1;
$uid=$USER->GetID();?>

<?foreach($arResult["SECTIONS"] as $arSection):
$uflag = stripos($arSection["CODE"], 'k:'.$uid.'_');//раздел пользователя?
  if($arSection["DEPTH_LEVEL"]>1&&$uflag!==false)://не выводить раздел 1го уровня и чужой раздел
?>
<?
$par[$arSection["ID"]]["UF_DEP"]=$arSection["UF_DEP"];
$par[$arSection["ID"]]["SORT"]=$arSection["SORT"];
$par[$arSection["ID"]]["NAME"]=$arSection["NAME"];?>

  <?endif;?>
<?endforeach?>


<?
$APPLICATION->IncludeFile("/cabinet_clienta/table_stat1.php", $par);
?>
</div>