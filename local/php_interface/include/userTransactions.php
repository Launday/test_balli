<?
use Bitrix\Main\Loader;
function getUserTransactionsById($userId, $pageSize = 10) {
	Loader::includeModule("iblock");
    return CIBlockElement::GetList(["ID" => "DESC"],["IBLOCK_ID" => 1,"PROPERTY_USER_ID" => $userId,"ACTIVE" => "Y"],false,
["nPageSize" => $pageSize],["ID", "NAME", "DATE_CREATE", "PROPERTY_AMOUNT", "PROPERTY_TYPE"]);
}