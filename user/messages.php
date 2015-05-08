<?php
if(!empty($_SESSION)){
	$db_connect=db_connect();
	$email= $_SESSION['email'];
	
	if (!empty($_GET['sort'])) {
		switch ($_GET['sort']) {
			case 'recent':
				$query= "SELECT * FROM contact_messages WHERE email=$email ORDER BY time_sent";
				break;
			case 'no_reply':
				$query= "SELECT * FROM contact_messages WHERE email=$email AND WHERE reply_parent_id IS NULL";
				break;
		}
	} else {
		$query= 'SELECT * FROM contact_messages WHERE email=$email;';
	}
} else {
	unauthorizedAccess();
}
?>