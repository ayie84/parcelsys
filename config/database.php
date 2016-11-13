<?php
<<<<<<< HEAD

function con2db() //connection to db
{

	$user_name = "walimatu_postmel"; //username
=======
	
	/*$user_name = "walimatu_postmel"; //username
>>>>>>> 3360b78a538c7172743be7de779e19ab9cb5a166
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

<<<<<<< HEAD

	$connect_db=mysql_connect($host_name, $user_name, $password);

	$find_db=mysql_select_db($database);

	if ($find_db) {

=======
>>>>>>> 3360b78a538c7172743be7de779e19ab9cb5a166
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
<<<<<<< HEAD

?>
=======
	
	
?>	
>>>>>>> 3360b78a538c7172743be7de779e19ab9cb5a166
