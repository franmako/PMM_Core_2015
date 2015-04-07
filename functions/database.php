<?php
function db_connect(){
	$db_connect=mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die("MySQL Error: " . mysql_error());
	return ($db_connect);
}
function getRow($query){
	$db_connect= db_connect();
	$result= $db_connect->query($query);
	$row = mysqli_fetch_array($result);
	return($row);
}
?>