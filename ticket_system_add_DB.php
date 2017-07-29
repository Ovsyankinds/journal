<?php	
	require_once "engine/connectToDB.php";
	require_once "engine/function.php";
	mysqli_query($link, "SET NAMES 'utf8'");


	$user_add_ticket =  $_COOKIE['user_login']; // кука фамилии вошедшего в журнал пользователя
	if( isset($_POST['submit_add_ticket']) ){
		if( $_POST['textarea_add_ticket'] || $_POST['date_end'] ){
			if( $user_add_ticket === "Березин" || $user_add_ticket === "Вдовин" || 
					$user_add_ticket === "Овсянкин"){
				$value_select =  trim(strip_tags($_POST['who_directed']));
				$array_value_select = explode(".", $value_select);
				$who_directed = $array_value_select[0];
				$ticket_color = $array_value_select[1];
				
				$ticket_message = trim(strip_tags($_POST['textarea_add_ticket']));
				$date_end = trim(strip_tags($_POST['date_end']));
				 
				$query_add_ticket = "INSERT INTO tickets (user_add_ticket, who_directed, 
							ticket_message, date_add, date_end, ticket_color ,checked) 
							VALUES ('$user_add_ticket', '$who_directed', '$ticket_message',
							CURRENT_TIMESTAMP, '$date_end', '$ticket_color' ,'N')";
				
				$result_mysql = mysqli_query($link, $query_add_ticket)
					or die("Не удается выполнить вставку данных В БД " . mysqli_error($link));
			}
		}
	}
	
	$ticket_system_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . 
					'ticket_system_view.php';
	//echo $ticket_system_url;
	header('Location: ' . $ticket_system_url);
?>	
	
	
	
	
	