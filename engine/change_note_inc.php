<?php
	require_once "connectToDB.php";
	require_once "function.php";
	mysqli_query($link, "SET NAMES 'utf8'");

	if(isset($_POST['change_note_submit'])){
		$change_breakdown = $_POST['change_breakdown'];
		$change_removal_breakdown = $_POST['change_removal_breakdown'];
		$change_used_teh_mat_values = $_POST['change_used_teh_mat_values'];
		if(!$change_used_teh_mat_values){
			$change_used_teh_mat_values = "Не использовались";
		}
		$change_id = $_GET['change_id'];
		
		$query_change_note_to_DB = "UPDATE journal_of_breakdowns SET 
									breakdown = '$change_breakdown',
									removal_breakdown = '$change_removal_breakdown', 
									used_teh_mat_values = '$change_used_teh_mat_values'
									WHERE id = '$change_id'";
		$result_query_change_note_to_DB  = mysqli_query($link, $query_change_note_to_DB)
									or die("Не удается выполнить запрос  |||" . mysqli_error($link));
	}
	
	$journal_breakdowns_url = 'http://' . $_SERVER['HTTP_HOST'] . '/' . 
														'journal_of_breakdowns.php';
	$journal_breakdowns_url;
					header('Location: ' . $journal_breakdowns_url);
	
?>