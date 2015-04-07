<?php 
$_SESSION = array(); 
session_destroy(); 
echo "Déconnexion en cours...";
echo '<meta http-equiv="refresh" content="3" url="index.php?rq=home"/>';
?>
