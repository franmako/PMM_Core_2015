<?php
include_once 'config/config_variables.php';
include_once 'database/db_init.php';
include_once 'init.php';
?>
<html>
	<head>
		<meta charset="UTF-8" />
		<title><?php echo "".TITLE.""; ?></title>
		<link rel="stylesheet" type="text/css" href="css/webstyle.css" media="screen">
	</head>
	
	<body>
		<div id="global">
			<!-- Header -->
			<?php include 'content/header.php'?>
			<!-- Menu -->
			<?php include 'menu/default.php'; ?>
			<!-- Contenu principal -->
			<?php include'content/main_bloc.php';?>	
			<!-- Pied de page -->
			<?php include'content/footer.php';?>		
		</div>
	</body>
</html>