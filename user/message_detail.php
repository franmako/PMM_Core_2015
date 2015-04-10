<?php 
if(isset($_SESSION['userlevel']) AND $_SESSION['userlevel']  == 0){
	$messageID= $_GET['id'];
	//print_r($messageID);
	
	$db_connect=db_connect();
	$query= 'SELECT * FROM contact_messages WHERE id=$messageID;';
	$result= $db_connect->query($query);
	if (!$result) {
    	printf("Error: %s\n", mysqli_error($result));
    	exit();
	}
	$row = mysqli_fetch_array($result);
	
	echo'
	<p> ID du message:  '.$row['id'].' </p>
	<p>Sujet: '.$row['subject'].'</p>
	<p>E-Mail: ' .$row['email']. '</p>
	<p>Contenu: ' .$row['message']. '</p>
	<p>Temps Message: '.$row['time_sent'].' </p>
	'; 
}else{
	echo "!!! Vous n'êtes pas autoriser à accéder à cette page !!!";
} 
?>