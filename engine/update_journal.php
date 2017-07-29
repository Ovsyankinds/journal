<?php
	//require_once "/home/homeel/homeelectrical.ru/docs/engine/connectToDB.php";
	//require_once "/home/homeel/homeelectrical.ru/docs/engine/function.php";
	require_once "connectToDB.php";
	require_once "function.php";
	mysqli_query($link, "SET NAMES 'utf8'");
	$errors = ' '; 
	
	//$a = $_POST['call_time'];
	//$b = $_POST['end_of_work'];
	//echo $a;
	//echo $b;
	//echo $_POST['select'][0];
	//$b = $_POST['select'];
	//echo $a;
	//echo $b;
	//$explode_a = explode('_', $a);
	//print_r($explode_a);
	
	$change_id = $_GET['change_id'];
	$call_time = $_GET['call_time'];
	$end_of_work = $_GET['end_of_work'];
	$repair_time = $_GET['repair_time'];
	
	if(!empty($_POST['date_shift']) && $_POST['select'][0] === 'date_shift'){
		//$change_id = $_GET['change_id'];
		$value = $_POST['date_shift'];
		$select = $_POST['select'][0];
		//echo $value, $select;
		$query_change_note_to_DB = "UPDATE journal_of_breakdowns SET 
																$select = '$value'
																WHERE id = '$change_id'";

	}
	
	elseif(!empty($_POST['shift']) && $_POST['select'][1] === 'shift'){
		//$change_id = $_GET['change_id'];
		$value = $_POST['shift'];
		//echo $value;
		$select = $_POST['select'][1];
		$query_change_note_to_DB = "UPDATE journal_of_breakdowns SET 
																$select = '$value'
																WHERE id = '$change_id'";

	}
	
	elseif(!empty($_POST['select_login_engineer']) && $_POST['select'][2] === 'name_engineer'){
		//$change_id = $_GET['change_id'];
		$value = $_POST['select_login_engineer'];
		$select = $_POST['select'][2];
		$query_change_note_to_DB = "UPDATE journal_of_breakdowns SET 
																$select = '$value'
																WHERE id = '$change_id'";

	}
	
	elseif(!empty($_POST['number_workshop']) && $_POST['select'][3] === 'number_workshop'){
		//$change_id = $_GET['change_id'];
		$value = $_POST['number_workshop'];
		$select = $_POST['select'][3];
		$query_change_note_to_DB = "UPDATE journal_of_breakdowns SET 
																$select = '$value'
																WHERE id = '$change_id'";

	}
		
	elseif(!empty($_POST['name_machine']) && $_POST['select'][4] === 'name_machine'){
		//$change_id = $_GET['change_id'];
		$value = $_POST['name_machine'];
		$select = $_POST['select'][4];
		$query_change_note_to_DB = "UPDATE journal_of_breakdowns SET 
																$select = '$value'
																WHERE id = '$change_id'";

	}
	
	elseif(!empty($_POST['caller_FIO']) && $_POST['select'][5] === 'caller_FIO'){
		//$change_id = $_GET['change_id'];
		$value = $_POST['caller_FIO'];
		$select = $_POST['select'][5];
		$query_change_note_to_DB = "UPDATE journal_of_breakdowns SET 
																$select = '$value'
																WHERE id = '$change_id'";

	}
	
	elseif(!empty($_POST['call_time']) && $_POST['select'][6] === 'call_time'){
		//$change_id = $_GET['change_id'];
		$value = $_POST['call_time'];
		$explode_call_time = explode(':', $value);
		$explode_end_of_work = explode(':', $end_of_work);
		$mktime_call_time = mktime($explode_call_time[0], $explode_call_time[1]) . "</br>";
		$mktime_end_of_work = mktime($explode_end_of_work[0], $explode_end_of_work[1]) . "</br>";
		$repair_time = date('H:i', ($mktime_end_of_work - $mktime_call_time) - 10800);
		$select = $_POST['select'][6];
		$query_change_note_to_DB = "UPDATE journal_of_breakdowns SET 
																	call_time = '$value',
																	end_of_work = '$end_of_work',
																	repair_time = '$repair_time'
																WHERE id = '$change_id'";
	}
		
	elseif(!empty($_POST['end_of_work']) && $_POST['select'][7] === 'end_of_work'){
		//$change_id = $_GET['change_id'];
		$value = $_POST['end_of_work'];
		$explode_call_time = explode(':', $call_time);
		$explode_end_of_work = explode(':', $value);
		$mktime_call_time = mktime($explode_call_time[0], $explode_call_time[1]) . "</br>";
		$mktime_end_of_work = mktime($explode_end_of_work[0], $explode_end_of_work[1]) . "</br>";
		$repair_time = date('H:i', ($mktime_end_of_work - $mktime_call_time) - 10800);
		$select = $_POST['select'][7];
		$query_change_note_to_DB = "UPDATE journal_of_breakdowns SET 
																	call_time = '$call_time',
																	end_of_work = '$value',
																	repair_time = '$repair_time'
																WHERE id = '$change_id'";
	}
	
	elseif(!empty($_POST['used_teh_mat_values']) && 
					$_POST['select'][8] === 'used_teh_mat_values'){
		$value = $_POST['used_teh_mat_values'];
		$select = $_POST['select'][8];
		$query_change_note_to_DB = "UPDATE journal_of_breakdowns SET 
																$select = '$value'
																WHERE id = '$change_id'";

	}else{
		$errors = 'Не введено значение в поле';
		$change_note_url = 'http://' . $_SERVER['HTTP_HOST'] . '/' . 
						"change_note.php?change_id=$change_id&errors=$errors";
				header('Location: ' . $change_note_url);
	}
		
	$result_query_change_note_to_DB  = mysqli_query($link, $query_change_note_to_DB)
									or die("Не удается выполнить запрос  |||" . mysqli_error($link));
	
	
	//echo dirname($_SERVER['DOCUMENT_ROOT']);
	//echo $_SERVER['HTTP_HOST'];
	$journal_breakdowns_url = 'http://' . $_SERVER['HTTP_HOST'] . '/' . 
						'journal_of_breakdowns.php';
	//echo $journal_breakdowns_url;
				header('Location: ' . $journal_breakdowns_url);
	
?>