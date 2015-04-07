<?php
include_once'database/db_init.php';
include 'functions/functions_all.php';
?>
<html>
	<head>
		<meta charset="UTF-8" />
		<title><?php $title= $ini['Header']['title']; echo "$title"; ?></title>
		<link rel="stylesheet" type="text/css" href="css/2_colonnes.css" media="screen">
	</head>
	
	<body>
		<div id="global">
			<header>
			<!-- Header -->
			
			</header>
			<!-- Menu -->
			<?php include 'menu/default.php'; ?>
			<!-- Contenu principal -->
			<?php include'content/main_bloc.php';?>	
			<!-- Pied de page -->
			<?php include'foot/footer.php';?>		
		</div>
	</body>
</html>