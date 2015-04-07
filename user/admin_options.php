<?php
$isAdmin= isAdmin();
if($isAdmin){
	$unread_messages= getNbUnreadMessages();
echo'	
<ul>
	<li>
		<a href="index.php?rq=user_manage" name="rq">Gestion Utilisateurs</a>
	</li>
	<li>
		<a href="index.php?rq=messages_admin" name="rq">Messages (Non-Lus: '.$unread_messages.')</a>
	</li>
	<li>
		<a href="index.php?rq=config" name="rq">Configuration Site</a>
	</li>
</ul>';
}else{
	echo "!!! Vous n'êtes pas autoriser à accéder à cette page !!!";
}
?>