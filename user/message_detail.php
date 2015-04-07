<?php 
if(isset($_SESSION['userlevel']) AND $_SESSION['userlevel']  == 0){
	$messageID= $_GET['id'];
	
	$db_connect=mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die("MySQL Error: " . mysql_error());
	$query= 'SELECT * FROM contact_messages WHERE id=$messageID;';
	$result= $db_connect->query($query);
	
	while($row = mysqli_fetch_array($result)){
	echo'
	ID du message: <p> '.$row['id'].' </p>
	Sujet: <p>'.$row['subject'].'</p>
	E-Mail: <p>' .$row['email']. '</p>
	Contenu: <p>' .$row['message']. '</p>
	Temps Message: <p> '.$row['time_sent'].' </p>
	'; 
	}
}else{
	echo "!!! Vous n'êtes pas autoriser à accéder à cette page !!!";
} 
?>