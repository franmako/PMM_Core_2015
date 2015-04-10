<?php
if(empty($_SESSION['connected'])){//User not connected or en demande de mot de passe
echo '
<nav id="navigation" class="nav_default">
	<ul >
		<li>
			<a href="index.php?rq=home" name="rq">Acceuil</a>
		</li>
		<li>
			<a href="index.php?rq=contact" name="rq">Contact</a>
		</li>
		<li>
			<a href="index.php?rq=newAccount" name="rq">Créer un compte</a>
		</li>
		<li>
			<a href="index.php?rq=connection" name="rq">Connexion</a>
		</li>
	</ul>
</nav>
';
}elseif($_SESSION['userlevel'] == 0){//User admin
$unread_messages= getNbNotif();
echo '
<nav id="navigation" class="nav_admin">
	<ul >
		<li>
			<a href="index.php?rq=home" name="rq">Acceuil</a>
		</li>
		<li>
			<a href="index.php?rq=connection" name="rq">Profil</a>
		</li>
		<li>
			<a href="index.php?rq=admin" name="rq">Administrateur ('.$unread_messages.')</a>
		</li>
		<li>
			<a href="index.php?rq=logout" name="rq">Déconnexion</a>
		</li>
	</ul>
</nav>';
}elseif($_SESSION['userlevel'] == 1){//User Sousadmin
$unread_messages= getNbNotif();
echo '
<nav id="navigation" class="nav_sousadmin">
	<ul >
		<li>
			<a href="index.php?rq=home" name="rq">Acceuil</a>
		</li>
		<li>
			<a href="index.php?rq=connection" name="rq">Profil</a>
		</li>
		<li>
			<a href="index.php?rq=admin" name="rq">Administrateur ('.$unread_messages.')</a>
		</li>
		<li>
			<a href="index.php?rq=logout" name="rq">Déconnexion</a>
		</li>
	</ul>
</nav>';
}elseif($_SESSION['userlevel'] == 2){//Normal user
echo '
<nav id="navigation" class="nav_normal">
	<ul >
		<li>
			<a href="index.php?rq=home" name="rq">Acceuil</a>
		</li>
		<li>
			<a href="index.php?rq=contact" name="rq">Contact</a>
		</li>
		<li>
			<a href="index.php?rq=connection" name="rq">Profil</a>
		</li>
		<li>
			<a href="index.php?rq=logout" name="rq">Déconnexion</a>
		</li>
	</ul>
</nav>';
}elseif($_SESSION['userlevel'] == 3){//En cours d'activation
echo '
<nav id="navigation" class="nav_activation">
	<ul >
		<li>
			<a href="index.php?rq=home" name="rq">Acceuil</a>
		</li>
		<li>
			<a href="index.php?rq=connection" name="rq">Profil</a>
		</li>
		<li>
			<a href="index.php?rq=logout" name="rq">Déconnexion</a>
		</li>
	</ul>
</nav>';
}elseif($_SESSION['userlevel'] == 4){//En cours de réactivation
echo '
<nav id="navigation" class="nav_reactivation">
	<ul >
		<li>
			<a href="index.php?rq=home" name="rq">Acceuil</a>
		</li>
		<li>
			<a href="index.php?rq=contact" name="rq">Contact</a>
		</li>
		<li>
			<a href="index.php?rq=connection" name="rq">Profil</a>
		</li>
		<li>
			<a href="index.php?rq=logout" name="rq">Déconnexion</a>
		</li>
	</ul>
</nav>';	
}elseif($_SESSION['userlevel'] == 5){//En demande de mot de passe
echo '
<nav id="navigation" class="nav_pass">
	<ul >
		<li>
			<a href="index.php?rq=home" name="rq">Acceuil</a>
		</li>
		<li>
			<a href="index.php?rq=contact" name="rq">Contact</a>
		</li>
		<li>
			<a href="index.php?rq=connection" name="rq">Profil</a>
		</li>
		<li>
			<a href="index.php?rq=logout" name="rq">Déconnexion</a>
		</li>
	</ul>
</nav>';
}elseif($_SESSION['userlevel'] == 6){//Gelé
echo '
<nav id="navigation" class="nav_frozen">
	<ul >
		<li>
			<a href="index.php?rq=home" name="rq">Acceuil</a>
		</li>
		<li>
			<a href="index.php?rq=contact" name="rq">Contact</a>
		</li>
		<li>
			<a href="index.php?rq=connection" name="rq">Profil</a>
		</li>
		<li>
			<a href="index.php?rq=logout" name="rq">Déconnexion</a>
		</li>
	</ul>
</nav>';
}
?>

