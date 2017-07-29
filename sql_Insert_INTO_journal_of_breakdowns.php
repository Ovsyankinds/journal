<?php

	require_once "engine/connectToDB.php";
	require_once "engine/function.php";
mysqli_query($link, "SET NAMES 'utf8'");

$array_message_of_breakdown_name_engineer = array('1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 
												  '1', '1', '1', '1', '1', '1', '1', '1', '1', '1',
												  '1', '1', '1', '1', '1', '1', '1', '1', '1', '1',
												  '1', '1', '1', '1', '1', '1', '1', '1', '1', '1',
												  '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
									
$array_message_of_breakdown_time_breakdowns =  array('NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 
												  'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()',
												  'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()',
												  'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()',
												  'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()', 'NOW()');
								
$array_message_of_breakdown_number_workshop =  array('1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 
												  '1', '1', '1', '1', '1', '1', '1', '1', '1', '1',
												  '1', '1', '1', '1', '1', '1', '1', '1', '1', '1',
												  '1', '1', '1', '1', '1', '1', '1', '1', '1', '1',
												  '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
									
$array_message_of_breakdown_name_mashine =  array('1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 
												  '1', '1', '1', '1', '1', '1', '1', '1', '1', '1',
												  '1', '1', '1', '1', '1', '1', '1', '1', '1', '1',
												  '1', '1', '1', '1', '1', '1', '1', '1', '1', '1',
												  '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
									
$array_message_of_breakdown_breakdown =  array('1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 
												  '1', '1', '1', '1', '1', '1', '1', '1', '1', '1',
												  '1', '1', '1', '1', '1', '1', '1', '1', '1', '1',
												  '1', '1', '1', '1', '1', '1', '1', '1', '1', '1',
												  '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
												  
$array_message_of_breakdown_removal_breakdown =  array('1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 
												  '1', '1', '1', '1', '1', '1', '1', '1', '1', '1',
												  '1', '1', '1', '1', '1', '1', '1', '1', '1', '1',
												  '1', '1', '1', '1', '1', '1', '1', '1', '1', '1',
												  '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');

for($i = 0; $i < 50; $i++){
		
		$aa = $array_message_of_breakdown_name_engineer[$i];
		//$a = $array_message_of_breakdown_time_breakdowns[$i];
		$b = $array_message_of_breakdown_number_workshop[$i];
		$c = $array_message_of_breakdown_name_mashine[$i];
		$d = $array_message_of_breakdown_breakdown[$i]; 
		$e = $array_message_of_breakdown_removal_breakdown[$i];
		
		$query_message_of_breakdown_name_engineer = "INSERT INTO journal_of_breakdowns (name_engineer, time_breakdowns, number_workshop,
													name_machine, breakdown, removal_breakdown) 
													VALUES ('$aa', NOW(), '$b', '$c', '$d', '$e')";
		$result_query = mysqli_query($link, $query_message_of_breakdown_name_engineer)
			or die("Не удается выполнить запрос  |||" . mysqli_error($link));
}

?>