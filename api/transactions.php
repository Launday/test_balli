<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

$userId = isset($_GET['user_id']) ? (int)$_GET['user_id'] : 0;

echo json_encode([
    'user_id' => $userId,
    'balance' => getUserBalanceById($userId)
]);