<?php
define("USER_ADMIN", 0);
define("USER_SOUS_ADMIN", 1);
define("USER_NORMAL", 2);
define("USER_ACTIVATION", 3);
define("USER_REACTIVATION", 4);
define('USER_DEMANDEMDP', 5);
define("USER_FROZEN", 6);
define("USER_DESINSCRIT", 7);
define("USER_BANNED", 8);

include 'database/database_functions.php';
include 'user/user_functions.php';
include 'admin/admin_functions.php';
include 'content/content_functions.php';
?>