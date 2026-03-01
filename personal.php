<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Личный кабинет");
global $USER;
$userID = $USER->GetID();
$rsUser = CUser::GetByID($userID);
$arUser = $rsUser->Fetch();
$userBalance = $arUser["UF_BALANCE"]
?>

<a href="index.php">Назад</a>
<h1>Личный кабинет</h1>
<h2>ID пользователя: <?= $userID ?></h2>
<h2>Баланс: <?= $userBalance ?></h2>
<h1> Личный кабинет </h1>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>