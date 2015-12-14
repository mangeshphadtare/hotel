<?php

require_once('class.database.php');
$dbConfig=Config::get('DB_CONFIG');

if (!empty($dbConfig['DB_HOST']) && !empty($dbConfig['DB_USERNAME']) && !empty($dbConfig['DB_NAME']))
{
	/******** Establish Connection Link - START ********/	
		
		//$db=Database::getInstance();
		
		$db = mysql_connect($dbConfig['DB_HOST'], $dbConfig['DB_USERNAME'], $dbConfig['DB_PASSWORD']);
		//$db->connect($dbConfig['DB_HOST'], $dbConfig['DB_USERNAME'], $dbConfig['DB_PASSWORD'], $dbConfig['DB_NAME']);
		if (!$db) 
		{
			die('Could not connect: ' . mysql_error());
		}
		//echo 'Connected successfully';
		
	/******** Establish Connection Link - END ********/

	//var_dump($db);
	
	/******** Make sbra current DB - START ********/	
		
		$db_selected = mysql_select_db($dbConfig['DB_NAME'], $db);
		
		if (!$db_selected) 
	{
			die ('Can\'t use database dbname : ' . mysql_error());
		}
		
	/******** Make sbra current DB - END ********/
	
	// attempt a connection
	/*
	try {
	   $pdo = new PDO('mysql:dbname=dbname;host=localhost', 'username', 'password');
	} catch (PDOException $e) {
	   die("ERROR: Could not establish database connection: " . $e->getMessage());
	}
	*/
}
else
{
	echo 'DB connection parameters need to be set in Config File';
}
?>
