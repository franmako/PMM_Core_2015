<?php
if(empty($_SESSION)){//User not connected or en demande de mot de passe
echo '
<nav id="navigation" class="nav_default">
	<ul >
		<li>
			<a href="index.php?rq=home" name="rq">Accueil</a>
		</li>
		<li>
			<a href="index.php?rq=contact" name="rq">Contact</a>
		</li>
		<li>
			<a href="index.php?rq=wiki_form" name="rq">Wiki</a>
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
}elseif(!empty($_SESSION) AND $_SESSION['userlevel'] == USER_ADMIN){
$unread_messages= getNbNotif();
echo '
<nav id="navigation" class="nav_admin">
	<ul >
		<li>
			<a href="index.php?rq=home" name="rq">Accueil</a>
		</li>
		<li>
			<a href="index.php?rq=connection" name="rq">Profil</a>
		</li>
		<li>
			<a href="index.php?rq=wiki_form" name="rq">Wiki</a>
		</li>
		<li>
			<a href="index.php?rq=admin" name="rq">Administrateur ('.$unread_messages.')</a>
		</li>
		<li>
			<a href="index.php?rq=logout" name="rq">Déconnexion</a>
		</li>
	</ul>
</nav>';
}elseif(!empty($_SESSION) AND $_SESSION['userlevel'] == USER_SOUS_ADMIN){
$unread_messages= getNbNotif();
echo '
<nav id="navigation" class="nav_sousadmin">
	<ul >
		<li>
			<a href="index.php?rq=home" name="rq">Accueil</a>
		</li>
		<li>
			<a href="index.php?rq=connection" name="rq">Profil</a>
		</li>
		<li>
			<a href="index.php?rq=wiki_form" name="rq">Wiki</a>
		</li>
		<li>
			<a href="index.php?rq=admin" name="rq">Administrateur ('.$unread_messages.')</a>
		</li>
		<li>
			<a href="index.php?rq=logout" name="rq">Déconnexion</a>
		</li>
	</ul>
</nav>';
}elseif(!empty($_SESSION) AND $_SESSION['userlevel'] == USER_NORMAL){//Normal user
echo '
<nav id="navigation" class="nav_normal">
	<ul >
		<li>
			<a href="index.php?rq=home" name="rq">Accueil</a>
		</li>
		<li>
			<a href="index.php?rq=contact" name="rq">Contact</a>
		</li>
		<li>
			<a href="index.php?rq=connection" name="rq">Profil</a>
		</li>
		<li>
			<a href="index.php?rq=wiki_form" name="rq">Wiki</a>
		</li>
		<li>
			<a href="index.php?rq=logout" name="rq">Déconnexion</a>
		</li>
	</ul>
</nav>';
}elseif(!empty($_SESSION) AND $_SESSION['userlevel'] == USER_REACTIVATION){
echo '
<nav id="navigation" class="nav_reactivation">
	<ul >
		<li>
			<a href="index.php?rq=home" name="rq">Accueil</a>
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
}elseif(!empty($_SESSION) AND $_SESSION['userlevel'] == USER_DEMANDEMDP){
echo '
<nav id="navigation" class="nav_pass">
	<ul >
		<li>
			<a href="index.php?rq=home" name="rq">Accueil</a>
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
}elseif(!empty($_SESSION) AND $_SESSION['userlevel'] == USER_FROZEN){//Gelé
echo '
<nav id="navigation" class="nav_frozen">
	<ul >
		<li>
			<a href="index.php?rq=home" name="rq">Accueil</a>
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

