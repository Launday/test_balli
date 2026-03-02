<?
function getUserBalanceById($userId) {
    $rsUser = CUser::GetByID($userId);
    $user = $rsUser->Fetch();
    return $user["UF_BALANCE"];
}