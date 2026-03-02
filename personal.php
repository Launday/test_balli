<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Личный кабинет");

use Bitrix\Main\Loader;
Loader::includeModule("iblock");
global $USER;
$userID = $USER->GetID();
$userBalance = getUserBalanceById($userID);

$pageSize = 10;
$transactions = getUserTransactionsById($userID, $pageSize);


if(isset($_POST['add_submit'])){
    $amount = (int)$_POST['add_amount'];
    $newBalance = $userBalance + $amount;

    $user = new CUser;
    $user->Update($userID, ["UF_BALANCE" => $newBalance]);

	$el = new CIBlockElement;
    $el->Add([
        "IBLOCK_ID" => 1,
        "NAME" => "Add points",
        "PROPERTY_VALUES" => [
            "user_id" => $userID,
            "amount" => $amount,
            "type" => "add"
        ],
        "ACTIVE" => "Y"
    ]);

    LocalRedirect("/personal.php"); 
}

if(isset($_POST['subtract_submit'])){
    $amount = (int)$_POST['subtract_amount'];
    if($amount > $userBalance) $amount = $userBalance; 
    $newBalance = $userBalance - $amount;

    $user = new CUser;
    $user->Update($userID, ["UF_BALANCE" => $newBalance]);

    $el = new CIBlockElement;
    $el->Add([
        "IBLOCK_ID" => 1,
        "NAME" => "Subtract points",
        "PROPERTY_VALUES" => [
            "user_id" => $userID,
            "amount" => $amount,
            "type" => "subtract"
        ],
        "ACTIVE" => "Y"
    ]);

    LocalRedirect("/personal.php"); 
}

?>

<a href="index.php">Назад</a>
<a href="swagger/index.php">Сваггер</a>
<h1>Личный кабинет</h1>
<h2>ID пользователя: <?= $userID ?></h2>
<h2>Баланс: <?= $userBalance ?></h2>
<h1> Личный кабинет </h1>
<form method="post">
    <input type="number" name="add_amount" placeholder="Начислить баллы">
    <button type="submit" name="add_submit">Начислить</button>
</form>

<form method="post">
    <input type="number" name="subtract_amount" placeholder="Списать баллы">
    <button type="submit" name="subtract_submit">Списать</button>
</form>

<?while($transaction = $transactions->GetNext()):?>

<div>
    <h4><?= $transaction["NAME"] ?></h4>
    <p>Дата: <?= $transaction["DATE_CREATE"] ?></p>
    <p>Сумма: <?= $transaction["PROPERTY_AMOUNT_VALUE"] ?></p>
</div>

<?php endwhile; ?>

<?= $transactions->GetPageNavString("Страницы") ?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>