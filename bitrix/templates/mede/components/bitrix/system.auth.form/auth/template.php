<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if ($arResult["FORM_TYPE"] != "login") 
{
 if($APPLICATION->GetCurPage(false)==SITE_DIR)
  {
   $rsUser = CUser::GetByLogin($arResult["USER_LOGIN"]);
   $arUser = $rsUser->Fetch();
   $arGroups = CUser::GetUserGroup($arUser ["ID"]);$APPLICATION->set_cookie("EMAIL", $arUser ["EMAIL"]);
   /*обновить дату авторизации -храниться в сортировке- в ИБ#33*/
   if(CModule::IncludeModule("iblock"))
   {
$data=ConvertTimeStamp();
$sdata=ConvertDateTime($data, "YYYYMMDD", "ru");
  $arFilter = Array('IBLOCK_ID'=>33,'CODE'=>'%_s:'.$arUser ["ID"]);
  $db_list = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilter, true);
  $ar_result = $db_list->GetNext();
   if(count($ar_result ))
    {
$bs = new CIBlockSection;

$arFields = Array(
  "IBLOCK_ID" => 33,
  "SORT" => $sdata
  );
  $res = $bs->Update($ar_result["ID"], $arFields);
    }
   }
   if (in_array("10", $arGroups)) { $APPLICATION->set_cookie("UID", $arUser ["ID"]); LocalRedirect("/cabinet_administratora/");}
   elseif (in_array("11", $arGroups)) {$APPLICATION->set_cookie("UID", $arUser ["ID"]); LocalRedirect("/cabinet_clienta/");}
   elseif (in_array("12", $arGroups)) {$APPLICATION->set_cookie("UID", $arUser ["ID"]); LocalRedirect("/cabinet_sotrudnica/");}
   else { LocalRedirect("/?logout=yes");}
   //echo "<pre>"; print_r($arGroups); echo "</pre>";
  }
?>
<div id="user-menu">
	<div id="user-name"><?=$arResult["USER_NAME"]?></a></div>
	<a href="/?logout=yes" id="logout" title="<?=GetMessage("AUTH_LOGOUT")?>"><?=GetMessage("AUTH_LOGOUT")?></a>
</div>
<? 
} 
else 
{
?>
<form action="/" METHOD="POST" target="_top">
	<input type="hidden" name="AUTH_FORM" value="Y" />
	<input type="hidden" name="TYPE" value="AUTH" />
	
	<table id="auth-form" cellspacing="0">

		<tr>
			<td class="field-name"><label for="login-textbox"><?=GetMessage("AUTH_LOGIN")?>:</label></td>
			<td><input type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["USER_LOGIN"]?>" class="textbox" id="login-textbox" /></td>
		</tr>
		<tr>
			<td class="field-name"><label for="password-textbox"><?=GetMessage("AUTH_PASSWORD")?>:</label></td>
			<td><input type="password" name="USER_PASSWORD" maxlength="50" class="textbox" id="password-textbox" /></td>
		</tr>
<?
	if ($arResult["STORE_PASSWORD"] == "Y")
	{
?>
		<tr>
			<td>&nbsp;</td>
			<td><input type="checkbox" id="remember-checkbox" class="checkbox" name="USER_REMEMBER" value="Y" /><?
				?><label for="remember-checkbox" class="remember"><?=GetMessage("AUTH_REMEMBER_ME")?></label></td>
		</tr>
<?
	}
?>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>" /></td>
		</tr>							
	</table>
</form>
<?
}
?>