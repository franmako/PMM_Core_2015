<?php
if(!empty($_SESSION) AND $_SESSION['userlevel'] == USER_ADMIN){
	$db_connect=db_connect();
	
	if (!empty($_GET['sort'])) {
		switch ($_GET['sort']) {
			case 'recent':
				$query= "SELECT * FROM contact_messages ORDER BY time_sent";
				break;
			case 'no_reply':
				$query= "SELECT * FROM contact_messages WHERE reply_parent_id IS NULL";
				break;
			case 'anonyme':
				$query= "SELECT * FROM contact_messages WHERE users_id= 0";
				break;
			case 'user':
				$query= "SELECT * FROM contact_messages WHERE users_id <> 0";
				break;
			case 'non_read':
				$query= "SELECT * FROM contact_messages WHERE message_read= 0";
		}
	} else {
		$query= 'SELECT * FROM contact_messages;';
	}
	
	
	
	
	$result= $db_connect->query($query);
		
	echo '&nbsp;<a href="index.php?rq=messages_admin&sort=recent">[Messages Récents]</a>&nbsp;';
	echo '&nbsp;<a href="index.php?rq=messages_admin&sort=no_reply">[Non-Répondus]</a>&nbsp;';
	echo '&nbsp;<a href="index.php?rq=messages_admin&sort=anonyme">[Envoyé Par Anonyme]</a>&nbsp;';
	echo '&nbsp;<a href="index.php?rq=messages_admin&sort=user">[Envoyé Par Utilisateur]</a>&nbsp;';
	echo '&nbsp;<a href="index.php?rq=messages_admin&sort=non_read">[Non-Lus]</a>&nbsp;';
	echo '<table border="1" class="tftable" id="tfhover">';
	echo'
	<tr>
		<th> Sujet </th>
		<th> Reçu le </th>
		<th> Marquer "Lu" </th>
	</tr>';

	while($row = mysqli_fetch_array($result)){
		$messageID= $row['id'];
		$time= new DateTime($row['time_sent']);
		echo'
		<tr>
			<td> <a href="index.php?rq=message_detail&id='.$messageID.'&read=1">'.$row['subject'].'<a/> </td>
			<td> '.date_format($time, 'd-m-Y H:i:s').' </td>
			<td> <a href="index.php?rq=messages_admin&read=1&id='.$messageID.'">[Lu]</a>&nbsp; <a href="index.php?rq=messages_admin&read=0&id='.$messageID.'">[Non-Lu]</a></td>
		</tr>'; 
	}
	echo "</table>";
	
	if ($_GET['read'] == 1 AND !empty($_GET['id'])) {
		$messageID= $_GET['id'];
		$query_update= "UPDATE contact_messages SET message_read = 1 WHERE id=$messageID";
		$result= $db_connect->query($query_update);
		if ($result) {
			echo "Message marqué comme lu.";
		} else {
			echo "Erreur!";
		}		
	}elseif ($_GET['read'] == 0 AND !empty($_GET['id'])) {
		$messageID= $_GET['id'];
		$query_update= "UPDATE contact_messages SET message_read = 0 WHERE id=$messageID";
		$result= $db_connect->query($query_update);
		if ($result) {
			echo "Message marqué comme non-lu.";
		} else {
			echo "Erreur!";
		}	
	}
}else{
	unauthorizedAccess();
}  
?>