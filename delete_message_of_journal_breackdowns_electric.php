<?php
	require_once "engine/function.php";
	require_once "engine/connectToDB.php";
	mysqli_query($link, "SET NAMES 'utf8'");
	
	if(isset($_POST['delete_message_of_journal_electric'])){
		$query_id_to_delete = $_POST['id_delete'];
		//echo $query_id_to_delete;
		/*foreach($query_id_to_delete as $query_id){*/
			$query_delete_message_of_journal = "DELETE from journal_of_breakdowns_electric WHERE id = '$query_id_to_delete'";
			$result_delete_message_of_journal = mysqli_query($link, $query_delete_message_of_journal)
				or die("Не удается выполнить запрос  |||" . mysqli_error($link));
			$journal_of_breakdowns_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/journal_of_breakdowns_electric.php';
			header('Location: ' . $journal_of_breakdowns_url);
		//}
	}
?>