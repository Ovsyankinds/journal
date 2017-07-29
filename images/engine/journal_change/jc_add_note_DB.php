<?php
	//$path = 'D:\xampp\htdocs\journalOfDuty/engine/';
	$path = "/home/homeel/homeelectrical.ru/docs/engine/";
	require_once $path . "connectToDB.php";
	require_once $path . "function.php";
	mysqli_query($link, "SET NAMES 'utf8'");	
	
	if(isset($_POST['submit_change_journal'])){
		//$date_change = $_POST['date_change'];
		$area_change = $_POST['area_change'];
		$discription_change = $_POST['discription_change'];
		$query = "INSERT INTO journal_change (date_change, area_change, 
								discription_change) 
								VALUES (CURRENT_TIMESTAMP, '$area_change', '$discription_change')";
		
		$result_journal_change = mysqli_query($link, $query) 
				or die("Не удается выполнить запрос  |||" . mysqli_error($link));
	}
	
	$journal_change_url = 'http://' . $_SERVER['HTTP_HOST'] . '/' . 
						'journal_change.php';
	//echo $journal_change_url;
				header('Location: ' . $journal_change_url);
	
?>