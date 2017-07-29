<?php
	require_once "engine/function.php";
	require_once "engine/connectToDB.php";
	mysqli_query($link, "SET NAMES 'utf8'");

	if(isset($_POST['add_new_message_to_journal'])){
		
		//код определения смены
		date_default_timezone_set('Europe/Moscow');
		$definition_shift = date('H', time());
		if($definition_shift >= 8 && $definition_shift < 20 ){
			$definition_shift = "Д";
		}
		else{
			$definition_shift = "Н";
		}//конец кода определения смены
		
		$user_login =  $_COOKIE['user_login'];
		$add_number_workshop =  trim(strip_tags($_POST['add_number_workshop']));
		$name_machine = trim(strip_tags($_POST['name_machine']));
		$breakdown = trim(strip_tags($_POST['breakdown']));
		$removal_breakdown = trim(strip_tags($_POST['removal_breakdown']));
		$caller_FIO = trim(strip_tags($_POST['caller_FIO']));
		$call_time = trim(strip_tags($_POST['call_time']));
		$end_of_work = trim(strip_tags($_POST['end_of_work']));
		$explode_call_time = explode(':', $call_time);
		$explode_end_of_work = explode(':', $end_of_work);
		$mktime_call_time = mktime($explode_call_time[0], $explode_call_time[1]) . "</br>";
		$mktime_end_of_work = mktime($explode_end_of_work[0], $explode_end_of_work[1]) . "</br>";
		$repair_time = date('H:i', ($mktime_end_of_work - $mktime_call_time) - 10800);
		$used_teh_mat_values = trim(strip_tags($_POST['used_teh_mat_values'])); 
		if(!$used_teh_mat_values){
			$used_teh_mat_values = "Не использовались";
		}
		
		if(!empty($name_machine)){
		
			$query_add_new_message_to_journal = "INSERT INTO journal_of_breakdowns (
													date_shift, shift, name_engineer, number_workshop, name_machine, caller_FIO,
													call_time, end_of_work, repair_time, breakdown, removal_breakdown, used_teh_mat_values) 
												VALUES (CURRENT_TIMESTAMP, '$definition_shift', '$user_login', '$add_number_workshop', '$name_machine', 
														'$caller_FIO', '$call_time', '$end_of_work', '$repair_time', '$breakdown', '$removal_breakdown',
														'$used_teh_mat_values')";
			$result_add_new_message_to_journal = mysqli_query($link, $query_add_new_message_to_journal) 
				or die("Не удается выполнить запрос  |||" . mysqli_error($link));
			$journal_of_breakdowns_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/journal_of_breakdowns.php';
			header('Location: ' . $journal_of_breakdowns_url);
		}
		else{
			echo "Не ввели какой то из параметров";
		}
	}
?>