<?php
if((isset($_POST['subject']) AND $_POST['subject'] != null) AND (isset($_POST['content']) AND $_POST['content'] != null)){
	if (isset($_POST['email'])) {
		$email= $_POST['email'];
		$userID= 0; //Utilisateur anonyme
	}else {
		$email= $_SESSION['email'];
		$userID= $_SESSION['userID'];
	}
	
	$subject = $_POST['subject'];
	$content= $_POST['content']; 
	
	$db_connect=db_connect();
    $query= "INSERT INTO contact_messages (id,subject,message,email,users_id,reply_parent_id,time_sent,message_read) VALUES(null,'$subject','$content','$email',$userID,NULL,NOW(),0);";
    $messagequery= $db_connect->query($query);
    
    if($messagequery){
    	//Envoi e-mail de notification à l'utilisateur
		$emailfrom=CONTACT_NOTIFY;
		$from="From:";
		$from .= $emailfrom;
		$sujet=$subject;
		$contenu="
		Le message suivant a été envoyé à l'administrateur:
		$sujet :
		$content .";
		$to=$email;
		$sent = mail($to,$sujet,$contenu,$from);
    	
    	echo "Le message a été envoyé à l'admin.";
		echo '<meta http-equiv="refresh" content="4" url="index.php"/>';
    }else {
        echo "Erreur de l'envoi! Veuillez recommencer.";
    }
}else{
	echo "Erreur! Les champs requis sont incomplets!";
}
?>