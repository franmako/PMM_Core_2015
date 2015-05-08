<?php
function getContent(){
	switch (isset($_GET['rq']) ? $_GET['rq'] : '') {
	//Wiki
	case 'wiki_form':
		include 'user/wiki_form.php';
		break;
	case 'wiki_action':
		include 'user/wiki_action.php';
		break;
	//Register
	case 'newAccount':
		include'forms/register_form.php';
		break;
	case 'account_activate':
		include 'user/account_activation.php';
		break;
	//Admin options
	case 'user_manage_detail':
		include 'admin/user_manage_profile.php';
		break;
	case 'config':
		include 'admin/config_admin_form.php';
		break;
	case 'config_modify':
		include 'admin/config_admin_action.php';
		break;
	case 'message_detail':
		include 'admin/message_detail.php';
		break;
	case 'messages_admin':
		include 'admin/messages_admin.php';
		break;
	case 'admin':
		include 'admin/admin_options.php';
		break;
	case 'user_manage':
		include 'admin/user_manage.php';
		break;
	case 'change_status':
		include 'admin/change_status_action.php';
		break;
	case 'avatar_logo':
		include 'admin/upload_logo_form.php';
		break;
	case 'user_messages':
		include 'admin/user_messages.php';
		break;
	case 'admin_contact_action':
		include 'admin/admin_contact_action.php';
		break;
	//Profile mgmt
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
	//Contact
	case 'contact_action':
		include 'forms/contact_action.php';
		break;
	case 'account_create':
		include 'forms/register_action.php';
		break;
	case 'contact':
		include'forms/contact_form.php';
		break;
	//Login&logout
	case 'connection':
		include'forms/login_action.php';
		break;
	case 'logout':
		include 'user/logout.php';
		break;
	//Forgotten password
	case 'secretQuestion_set':
		include 'user/secretQuestion_set_form.php';
		break;
	case 'secretQuestion_set_action':
		include 'user/secretQuestion_set_action.php';
		break;
	case 'passwordReset':
		include 'forms/password_forgotten_form.php';
		break;
	case 'passwordReset_action':
		include 'forms/password_forgotten_action.php';
		break;
	case 'secret_answer_action':
		include 'forms/secretQuestion_answer_action.php';
		break;
	case 'password_reset_action':
		include 'forms/password_reset_action.php';
		break;
	//Acceuil
	default:
		include 'accueil.php';
	}	
}
?>