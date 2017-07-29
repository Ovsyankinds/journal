<?php
	require_once "engine/connectToDB.php";
	require_once "engine/function.php";
	mysqli_query($link, "SET NAMES 'utf8'");

//-----код для изменения или удаления тикета
		//если нажата кнопка "изменить" и поле ввода сообщения не пусто и выбран номер тикета
		//то изменяем запись тикета
	$user_add_ticket =  $_COOKIE['user_login'];
	if( $user_add_ticket === "Березин" || $user_add_ticket === "Вдовин" || $user_add_ticket === "Овсянкин"  ){
		if( isset($_POST['change_ticket_message']) && !
			empty($_POST['textarea_change_ticket_message']) && $_POST['select_num_tickets'] ){
			
			$text_change_ticket_message = trim(strip_tags($_POST['textarea_change_ticket_message']));
			$change_ticket_id = $_POST['select_num_tickets']; //имя selet_num_tickets из функции number_ticket
			$query_change_ticket_message = "UPDATE tickets SET 
							ticket_message = '$text_change_ticket_message' 
							WHERE id = '$change_ticket_id'";
			$result_mysql = mysqli_query($link, $query_change_ticket_message)
							or die("Не удается выполнить выборку данных из БД " . mysqli_error($link));
		}
		
			//если нажата кнопка "удалить" и выбран номер тикета, то удаляем тикет
		if(isset($_POST['delete_ticket_message']) && $_POST['select_num_tickets']){
			
			$delete_ticket_id = $_POST['select_num_tickets'];
			$array_delete_ticket = explode("_", $delete_ticket_id);
			$delete_ticket_id = $array_delete_ticket[0];
			switch($array_delete_ticket[1]){
				case 'Овсянкин':
					$delete_cookie_job = "job_Ovsyankin";
					break;
				case 'Сюваев':
					$delete_cookie_job = "job_Suvaev";
					break;
				case 'Касаткин':
					$delete_cookie_job = "job_Kasatkin";
					break;
				case 'Железнов':
					$delete_cookie_job = "job_Zeleznov";
					break;
				case 'Касимов':
					$delete_cookie_job = "job_Kasimov";
					break;
				case 'Для всех':
					$delete_cookie_job = "job_all";
			}	
			
			$query_delete_ticket = "DELETE from tickets WHERE id = '$delete_ticket_id'";
			$result_mysql = mysqli_query($link, $query_delete_ticket)
							or die("Не удается выполнить выборку данных из БД " . mysqli_error($link));
					
			setcookie($delete_cookie_job, '', time() - 3600);
		}
	}
	
	if(isset($_POST['ok_job_engineer']) && $_POST['select_num_tickets']){
		$num_ok_job = $_POST['select_num_tickets'];
		$query_ok_job = "UPDATE tickets SET checked = 'K' where id = '$num_ok_job'";	
		$result_mysql = mysqli_query($link, $query_ok_job)
							or die("Не удается выполнить выборку данных из БД " . mysqli_error($link));		
	}
	
	
	
	$ticket_system_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . 
					'ticket_system_view.php';
	header('Location: ' . $ticket_system_url);
				
	?>
		
	