<?php
//if( !defined("_PRIVATE_INCLUDE"../class_lib_mysqli/) or _PRIVATE_INCLUDE != 'loaded' ) die("Permission denied...");
error_reporting(E_ALL ^ E_NOTICE);
	ini_set('display_errors', "1");
define( 'DB_HOST', 'localhost' ); // set database host
define( 'DB_USER', 'root' ); // set database user
define( 'DB_PASS', '' );
//define( 'DB_PASS', 'pccpbn' );
define( 'DB_PORT', '3306' ); // set port
define('DB_NAME','bmr');
define( 'SEND_ERRORS_TO', 'josaha1244@gmail.com' );
define( 'DISPLAY_DEBUG', true ); //display db errors?

?>
