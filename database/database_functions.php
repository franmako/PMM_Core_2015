<?php
function db_connect(){
	$db_connect=mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die("MySQL Error: " . mysql_error());
	return ($db_connect);
}
function getRow($query){
	$db_connect= db_connect();
	$result= $db_connect->query($query);
	if($result){
		$row = mysqli_fetch_array($result);
	}else {
		$row= FALSE;
	}
	
	return($row);
}
?>