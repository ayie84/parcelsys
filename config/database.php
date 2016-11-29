<?php


function con2db() //connection to db
{


	error_reporting( ~E_DEPRECATED & ~E_NOTICE );

	//Configure Database
	define('DB_HOST', 'localhost:8889');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_DATABASE', 'pusatmel');
	
	//Connect to mysql server
	$connect_db = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$connect_db) {
		die('Failed to connect to server: ' . mysql_error());
	}

	//Select database
	$find_db = mysql_select_db(DB_DATABASE);
	if(!$find_db) {
		die("Unable to select database");
	}

}





?>
