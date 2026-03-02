<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

$userId = $_GET['user_id'];
$limit = $_GET['limit'];
if (!$userId) {
    echo json_encode(['error' => 'user_id required']);
    return;
}

$transactions = getUserTransactionsById($userId, $limit);
$result = [];

while ($tx = $transactions->GetNext()) {
    $result[] = [
        'id' => $tx['ID'],
        'date' => $tx['DATE_CREATE'],
        'amount' => $tx['PROPERTY_AMOUNT_VALUE'],
        'type' => $tx['PROPERTY_TYPE_VALUE']
    ];
}

echo json_encode([
    'user_id' => $userId,
    'transactions' => $result
]);