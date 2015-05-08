<?php
if(!empty($_SESSION) AND $_SESSION['userlevel'] == USER_ADMIN){
	$unread_messages= getNbUnreadMessages();
	echo'	
	<ul>
		<li>
			<a href="index.php?rq=user_manage" name="rq">Gestion des utilisateurs</a>
		</li>
		<li>
			<a href="index.php?rq=messages_admin&read=&id=" name="rq">Messages (Non-Lus: '.$unread_messages.')</a>
		</li>
		<li>
			<a href="index.php?rq=config" name="rq">Configuration du site</a>
		</li>
	</ul>';
}else{
	unauthorizedAccess();
}
?>