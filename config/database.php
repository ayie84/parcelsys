<?php

function con2db() //connection to db
{

	/*$user_name = "walimatu_postmel"; //username
	$password = "Pusatmel2016";//password
	$database = "walimatu_pusatmel";//dbname
	$host_name = "localhost"; //server
	*/
	
	function con2db() //connection to db
{
	$user_name = "root"; //username
	$password = "";//password
	$database = "ump_pmail";//dbname
	$host_name = "localhost"; //server

	$connect_db=mysql_connect($host_name, $user_name, $password);

	$find_db=mysql_select_db($database);

	if ($find_db) {

	$connect_db=mysql_connect($host_name, $user_name, $password);

	$find_db=mysql_select_db($database);

	if ($find_db) {

	//echo "Database exist";
	$con_mysql = 1;
	$_SESSION['mysql_con'] = $con_mysql;

	}
	else {

	//echo "Database does not exist";
	$con_mysql = 0;
	$_SESSION['mysql_con'] = $con_mysql;
	}
}

?>
