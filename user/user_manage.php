<?php
if($_SESSION['userlevel']  == 0){
	echo'
	<form method="post" action="index.php?rq=user_manage">
		<h3>Recherche:</h3>
		<p><input type="text" name="search"></p>
		<input type="submit" value="Rechercher">
	</form>';
	
	echo 
	'
	<ul>
		<li> Cliquez sur le nom d\'un utilisateur pour des détails sur son profil</li>
	</ul>
	';

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
	/*users_noyau.id,username,email,users_id,label_level */
	if(isset($_POST['search'])){
		$search= $_POST['search'];
		$query= "SELECT users_noyau.id,username,email,users_id,label_level
		FROM users_noyau,user_status WHERE users_noyau.id = users_id AND 
		label_level LIKE '%$search%' OR username LIKE '%$search%' OR email LIKE '%$search%'";
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
	}else {
		while($row = mysqli_fetch_array($result)){
			$userID= $row['id'];
			echo'
			<tr>
				<td> '.$row['id'].' </td>
				<td> <a href="index.php?rq=user_manage_detail&id='.$userID.'">'.$row['username'].'</a> </td>
				<td>' .$row['email']. '</td>
				<td> '.getUserType_label($row['id']).' </td>
			</tr>'; 
		}
	}	
}else{
	echo "!!! Vous n'êtes pas autoriser à accéder à cette page !!!";
}        

?>