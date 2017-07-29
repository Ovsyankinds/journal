<?php
	header("Content-type: text/html; charset = utf-8");
	/*define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASSWORD', 'ovsosilva55555');
	define('DBNAME', 'journal');*/
	
	define('DBHOST', 'homeel.mysql');
	define('DBUSER', 'homeel_mysql');
	define('DBPASSWORD', 'k5cpsgrf');
	define('DBNAME', 'homeel_journal');
	$link = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME) or die (mysqli_connect_error());
?>