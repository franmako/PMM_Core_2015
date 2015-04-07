<?php 
$isAdmin= isAdmin();

if($isAdmin){
	
echo "Config";
	
}else{
	echo "!!! Vous n'êtes pas autoriser à accéder à cette page !!!";
} 
?>