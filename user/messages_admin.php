<?php
$isAdmin= isAdmin();

if($isAdmin){
	$db_connect=db_connect();

	$query= 'SELECT * FROM contact_messages;';
	$result= $db_connect->query($query);
	echo '<table border="1" class="tftable" id="tfhover">';
	echo'
	<tr>
		<th> ID Message </th>
		<th> Sujet </th>
		<th> Adresse e-mail </th>
		<th> Temps Message </th>
	</tr>';

	while($row = mysqli_fetch_array($result)){
	$messageID= $row['id'];
	echo'
	<tr>
		<td> '.$row['id'].' </td>
		<td> '.$row['subject'].' </td>
		<td>' .$row['email']. '</td>
		<td> '.$row['time_sent'].' </td>
		<td> <a href="index.php?rq=message_detail&id='.$messageID.'">[Lire]</a></td>
	</tr>'; }
		
}else{
	echo "!!! Vous n'êtes pas autoriser à accéder à cette page !!!";
}  
?>