<?php
if(isset($_SESSION['userlevel']) AND $_SESSION['userlevel']  == 0){
	echo'
	<form method="post" action="index.php?rq=user_manage">
		<h3>Recherche:</h3>
		<p>Utilisateur: <input type="text" name="user_search">
		E-Mail: <input type="text" name="email_search">
		Statut: <input type="text" name="status_search">
		</p>
		<input type="submit" value="Rechercher">
	</form>';

	$db_connect= db_connect();
	$query= 'SELECT * FROM users_noyau;';
	$result= $db_connect->query($query);
	$row= getRow($query);
	$userID= $row['id'];
	
	echo '<table border="1" class="tftable" id="tfhover">';
	echo'
	<tr>
		<th> UserID </th>
		<th> Utilisateur </th>
		<th> Adresse e-mail </th>
		<th> Statut </th>
	</tr>';
	if(isset($_POST['user_search']) OR isset($_POST['email_search']) OR isset($_POST['status_search'])){
		if ($_POST['user_search']) {
			$user_search= $_POST['user_search'];
			$query= "SELECT * FROM users_noyau WHERE username LIKE '%$user_search%'";
			$result= $db_connect->query($query);
			while($row = mysqli_fetch_array($result)){
			echo'
			<tr>
				<td> '.$row['id'].' </td>
				<td> '.$row['username'].' </td>
				<td> '.$row['email'].' </td>
				<td> '.getUserType_label($row['id']).' </td>
			</tr>'; 
			}			
		}elseif ($_POST['email_search']) {
			$email_search= $_POST['user_search'];
			$query= "SELECT * FROM users_noyau WHERE email LIKE '%$email_search%'";
			$result= $db_connect->query($query);
			while($row = mysqli_fetch_array($result)){
			echo'
			<tr>
				<td> '.$row['id'].' </td>
				<td> '.$row['username'].' </td>
				<td>' .$row['email']. '</td>
				<td> '.getUserType_label($row['id']).' </td>
			</tr>'; 
			}
		} 		
	}else {
		while($row = mysqli_fetch_array($result)){
			echo'
			<tr>
				<td> '.$row['id'].' </td>
				<td> '.$row['username'].' </td>
				<td>' .$row['email']. '</td>
				<td> '.getUserType_label($row['id']).' </td>
			</tr>'; 
		}
	}
	
}else{
	echo "!!! Vous n'êtes pas autoriser à accéder à cette page !!!";
}        

?>