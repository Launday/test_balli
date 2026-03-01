<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Главная");
?><h1>Главная</h1>
 <!-- <a href="authorization.php">Авторизация</a> <a href="registration.php">Регистрация</a><br> --> <br>
<?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"",
	Array(
		"FORGOT_PASSWORD_URL" => "",
		"PROFILE_URL" => "personal.php",
		"REGISTER_URL" => "",
		"SHOW_ERRORS" => "Y"
	)
);?><?$APPLICATION->IncludeComponent(
	"bitrix:main.register",
	"",
	Array(
		"AUTH" => "Y",
		"REQUIRED_FIELDS" => array("EMAIL"),
		"SET_TITLE" => "N",
		"SHOW_FIELDS" => array("EMAIL"),
		"SUCCESS_PAGE" => "personal.php",
		"USER_PROPERTY" => array(),
		"USER_PROPERTY_NAME" => "",
		"USE_BACKURL" => "Y"
	)
);?><?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>