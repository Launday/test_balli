<? 
function AddInitialBalance(&$arFields){
	$user = new CUser;
	$user->Update($arFields["ID"], array("UF_BALANCE"=>1000));
}
AddEventHandler("main", "OnAfterUserAdd", "AddInitialBalance");
?>