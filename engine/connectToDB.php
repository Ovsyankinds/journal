<?php
	header("Content-type: text/html; charset = utf-8");
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASSWORD', '');
	define('DBNAME', 'emjournal');
	
	/*define('DBHOST', 'homeel.mysql');
	define('DBUSER', 'homeel_mysql');
	define('DBPASSWORD', 'k5cpsgrf');
	define('DBNAME', 'homeel_journal');*/
	
	/*define('DBHOST', 'emjournal.mysql');
	define('DBUSER', 'emjournal_mysql');
	define('DBPASSWORD', '2EtBNj-X');
	define('DBNAME', 'emjournal_journal');*/
	$link = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME) or die (mysqli_connect_error());
?>