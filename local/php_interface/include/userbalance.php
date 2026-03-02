<?
function getUserBalanceById($userId) {
    $rsUser = CUser::GetByID($userId);
    $user = $rsUser->Fetch();
    return (int)$user["UF_BALANCE"];
}