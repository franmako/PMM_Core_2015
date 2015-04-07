<?php 
session_start();

$ini_path = "config/config.ini.php";
$ini = parse_ini_file($ini_path, true);

$db_host=$ini['Database']['hostname_local'];
$db_name= $ini['Database']['db_name'];
$db_user = $ini['Database']['db_user'];
$db_password= $ini['Database']['db_password'];

if($_SERVER["HTTP_HOST"]="193.190.65.94"){
	$db_host=$ini['Database']['hostname_local'];
}else{
	$db_host=$ini['Database']['hostname_external'];
}

define("HOST",$db_host);     
define("USER", $db_user);     
define("PASSWORD", $db_password);     
define("DATABASE", $db_name);    
?>