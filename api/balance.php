<?
require($_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/main/include/prolog_before.php');
$userId = $_GET['user_id'];

if (!$userId) {
    echo json_encode(['error' => 'user_id required']);
    return;
}

echo json_encode([
    'user_id' => $userId,
    'balance' => getUserBalanceById($userId)]);
?>