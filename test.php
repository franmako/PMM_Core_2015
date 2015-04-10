<?php
if($_SESSION['userlebvel'] == 0){
	if(isset($_POST['password']) AND isset($_POST['username_new'])){
		echo "success";
		/*$email_new= $_POST['email_new'];
		$password= $_POST['password'];
		$db_connect= db_connect();
		$userID_admin= $_SESSION['userID'];
		$userID_user= $_GET['id'];
		
		$query_password_check= "SELECT * FROM users_noyau WHERE id=$userID_admin AND password='$password'";
		$password_check= $db_connect->query($query_password_check);
		if (mysqli_num_rows($password_check) == 1) {
			echo "Un compte est déjà associé à cette adresse e-mail.";
		}else {
			$query_update_db= "UPDATE users_noyau SET email='$email_new' WHERE id=$userID_user";
			$update_username= $db_connect->query($query_update_db);
			
			
		}*/
	}
}else {
	echo "Champs invalides";
} 
?>