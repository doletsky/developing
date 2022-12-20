<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/specialty/(.*)#",
		"PATH" => "/specialty/index.php",
	),
	array(
		"CONDITION" => "#^/(.*)/(.*)/(.*)#",
		"RULE" => "CODE=\$2",
		"ID" => "bitrix:news.detail",
		"PATH" => "/detail.php",
	),
	array(
		"CONDITION" => "#^/(.*)/(.*)#",
		"RULE" => "CODE=\$1",
		"ID" => "bitrix:news.list",
		"PATH" => "/list.php",
	),
);

?>