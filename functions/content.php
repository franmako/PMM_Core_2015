<?php
function GetContent(){
	switch (isset($_GET['rq']) ? $_GET['rq'] : '') {
	case 'newAccount':
		include'forms/register_form.php';
		break;
	case 'user_manage_detail':
		include 'user/user_manage_profile.php';
		break;
	case 'reset_pass':
		include'user/reset_password.php';
		break;
	case 'username_modify':
		include 'user/change_username_action.php';
		break;
	case 'change_username':
		include'user/change_username_form.php';
		break;
	case 'email_modify':
		include 'user/change_email_action.php';
		break;
	case 'change_email':
		include 'user/change_email_form.php';
		break;
	case 'change_password':
		include 'user/change_password_form.php';
		break;
	case 'password_modify':
		include 'user/change_password_action.php';
		break;
	case 'avatar_upload':
		include 'user/upload_avatar_form.php';
		break;
	case 'avatar_upload_action':
		include 'user/upload_avatar_action.php';
		break;
	case 'contact_action':
		include 'forms/contact_action.php';
		break;
	case 'config':
		include 'user/config_admin';
		break;
	case 'message_detail':
		include 'user/message_detail.php';
		break;
	case 'accountCreateRetry_username_verif':
		echo "Le nom d'utilisateur est trop court!";
		break;
	case 'messages_admin':
		include 'user/messages_admin.php';
		break;
	case 'account_activate':
		include 'user/account_activation.php';
		break;
	case 'accountCreateSuccess':
		echo "<p>Compte créé avec succès! Un e-mail de confirmation vous a été envoyé.</p>";
		break;
	case 'accountCreateRetry_pwd_verif':
		echo "<p>Les mots de passes entrés ne sont pas les mêmes!</p>";
		break;
	case 'accountCreateRetry_email_verif':
		echo "<p>Les e-mails entrés ne sont pas les mêmes!</p>";
		break;
	case 'account_create':
		include 'forms/register_action.php';
		break;
	case 'account_activation_fail':
		echo "<p>Erreur ! Votre compte ne peut être activé... Veuillez contacter l'admin.</p>";
		break;
	case 'accountCreateRetry_uname':
		echo "<p>Le nom d'utilisateur est déjà pris! Veuillez en choisir un autre.</p>";
		echo'<meta http-equiv="refresh" content="5" url="index.php?rq=accountCreateRetry_uname&uname=$username&email=$email&prn=$prenom"/>';
		break;
	case 'connection':
		include'forms/login_action.php';
		break;
	case 'admin':
		include 'user/admin_options.php';
		break;
	case 'user_manage':
		include 'user/user_manage.php';
		break;
	case 'verif_fail':
		include 'forms/verif_fail.php';
		break;
	case 'secretQuestion':
		include 'forms/secretQuestion_form.php';
		break;
	case 'secret_action':
		include 'forms/secretQuestion_action.php';
		break;
	case 'contact':
		include'forms/contact_form.php';
		break;
	case 'logout':
		include'logout.php';
		break;
	case 'logoutSuccess':
		echo "<p>Utilisateur déconnecté!</p>";
		break;
	case 'passwordReset':
		include 'forms/password_forgotten_form.php';
		break;
	case 'passwordReset_action':
		include 'forms/password_forgotten_action.php';
		break;
	case 'question_verif':
		include 'secretquestion_answer_form.php';
		break;
	case 'contactFail':
		echo "<p>Un ou plusieurs champs sont incomplets!</p>";
		break;
	case 'secret_answer':
		include 'forms/secretQuestion_answer_action.php';
		break;
	default:
		echo '<h2>Acceuil</h2><p>
		"We don\'t look nothing like the people on the screen, 
		you know the movie stars, picture perfect, beauty queens, 
		but we got dreams and we got the right to chase them, l
		ook at the nation that\'s a crooked smile, 
		braces couldn\'t even straighten." J. Cole
		</p>';
		break;
	}	
}
?>