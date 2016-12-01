<?php

/*START SQL COLLECTION 

- Total Parcel Tahun Ini
SELECT count(*) FROM parcel WHERE YEAR(parcel_timestamp)

- Total Parcel Bulan Ini
SELECT count(*) FROM parcel WHERE MONTH(parcel_timestamp) = 1 AND YEAR(parcel_timestamp) = 2016

- Total Parcel Hari Ini
SELECT count(*) FROM parcel WHERE DAY(parcel_timestamp) = 1 AND MONTH(parcel_timestamp) = 12 AND YEAR(parcel_timestamp) = 2016

- Total Parcel Hari Ini Not Taken Today
SELECT count(*) FROM parcel WHERE DAY(parcel_timestamp) = 1 AND MONTH(parcel_timestamp) = 12 AND YEAR(parcel_timestamp) = 2016 AND NULLIF(parcel_takenby, ' ') IS NULL

- Total Parcel Hari Ini Is Taken
SELECT count(*) FROM parcel WHERE DAY(parcel_timestamp) = 1 AND MONTH(parcel_timestamp) = 12 AND YEAR(parcel_timestamp) = 2016 AND parcel_takenby <> '' 

END SQL COLLECTION*/


function con2db() //connection to db
{


	error_reporting( ~E_DEPRECATED & ~E_NOTICE );

	//Configure Database on My PC
	define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '4dm1n');
    define('DB_DATABASE', 'pms');
	
	//Configure Database
	/*define('DB_HOST', 'localhost:8889');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_DATABASE', 'pusatmel');
	*/
    /*

	define('DB_HOST', 'localhost');
    define('DB_USER', 'walimatu_postmel');
    define('DB_PASSWORD', 'Pusatmel2016');
    define('DB_DATABASE', 'walimatu_pusatmel');

    */
	
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
