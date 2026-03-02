<? 
function AddInitialBalance(&$arFields){
	$user = new CUser;
	$user->Update($arFields["ID"], array("UF_BALANCE"=>1000));
}
AddEventHandler("main", "OnAfterUserAdd", "AddInitialBalance");
?>
<?
require_once(__DIR__ . '/include/userTransactions.php');
require_once(__DIR__ . '/include/userbalance.php');
?>
