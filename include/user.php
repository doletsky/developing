<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$rsUser = CUser::GetByID($USER->GetID());
$arUser = $rsUser->Fetch();
if($cc==1):?>
Уважаемый <?=$arUser['NAME']?> <?=$arUser['SECOND_NAME']?>!
<?else:?>
<div class="header-username"><?=$arUser['LAST_NAME']?><br/> <?=$arUser['NAME']?> <?=$arUser['SECOND_NAME']?></div>
<?endif?>