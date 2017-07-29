<?php
	require_once "engine/connectToDB.php";
	require_once "engine/function.php";
	mysqli_query($link, "SET NAMES 'utf8'");
	$user_add_ticket = $_COOKIE['user_login'];
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->

<head>
	<title> Главная страница журнала </title>
	<meta http-equiv="Content-Type" content="text/html; charset = utf-8" />
	<link rel = "stylesheet" href = "css/tickets.css">
</head>

<body>
	
	<div id = "wrap">
		<div id = "top_menu">
			<ul> 
				<li> <a href = "general.php"> На главную </a> </li>
				<li> <a href = "journal_of_breakdowns.php"> К журналу </a> </li>
			</ul>
		</div>
		
		<div class = "clear">
		</div>

		<!-- Форма для добавления тикета -->
		<div id = "div_add_ticket_message" class = "form_ticket">
		<form name = "add_ticket" method = "POST" action="ticket_system_add_DB.php" id = "form_add_ticket">
			<p>
				<label for = "textarea_add_ticket"> Добавить сообщение тикета </label>
			</p>
			<textarea cols = "45" rows = "10" wrap = "hard" name = "textarea_add_ticket" id = "textarea_add_ticket"> 
			</textarea>
			
			<p>
				<label for = "who_directed"> Кому адресовано </label>
			</p>
			
			<?php
			
				//select_login_engineer($link);
				$cookie_user_login = $_COOKIE['user_login'];
				/*$array_users_who_directed = select_elem_from_DB($link, "registered_users", 
																		"sername",
																		"user_color",0,0,0,0,0,0,0,0, 
																		"id_status = 1", 0);*/
				$query = "select sername, user_color from registered_users
																		where id_status = 1";
				$array_users_who_directed = mysqli_query($link, $query);						
				$count_note = mysqli_num_rows($array_users_who_directed);
				$count_who_directed = $count_note;
				echo "<select name = 'who_directed' id = 'who_directed'>";	
				while($row = mysqli_fetch_array($array_users_who_directed)){
					$users_who_directed = $row['sername'];
					$user_color = $row['user_color'];
					$value_tag_option = $users_who_directed . "." . $user_color;
					while($count_note){
						if($count_note == 5){
							$teg_option_bg_color = "$user_color";//Овсянкин\
							--$count_note;
							break;
						}
						elseif($count_note == 4){
							$teg_option_bg_color = "$user_color";//Овсянкин
							--$count_note;
							break;
						}
						elseif($count_note == 3){
							$teg_option_bg_color = "$user_color";//Овсянкин
							--$count_note;
							break;
						}
						elseif($count_note == 2){
							$teg_option_bg_color = "$user_color";//Овсянкин
							--$count_note;
							break;
						}
						elseif($count_note == 1){
							$teg_option_bg_color = "$user_color";//Овсянкин
							--$count_note;
							break;
						}
						else{
							$teg_option_bg_color = "#FFF";
						}
					}
					
					echo "<option value = '$value_tag_option' style = 'background: $teg_option_bg_color'> 
							$users_who_directed </option>";
					
				}
				
				echo "<option value = 'Для всех.#BB9955' style = 'background: #BB9955'>
						Для всех </option>";
				echo "</select>";
			?>				
		
			<p>
				<label for = "input_date_end"> Дата окончания работы: </label></br>
			</p>
			
			<input type = "date" name = "date_end" id = "input_date_end" />
			<input type="submit" name = "submit_add_ticket" id = "submit_add_ticket" 
				onclick = "valid_add_ticket(this.form)"/>
		</form>
	</div>
			<!-- конец формы для добавления тикета -->
			
			<!-- Форма для изменения тикета или удаления -->
		<div id = "div_change_ticket_message" class = "form_ticket">
		<form name = "form_change_ticket_message" method = "POST" action = "ticket_system_change_or_delete.php" 
			id = "form_change_ticket_message">
			<p>
			<label for ="textarea_change_ticket_message"> Изменение и удаление тикета </label>
			</p>
			<textarea cols = "45" rows = "10" wrap = "hard" 
				name = "textarea_change_ticket_message" id = "textarea_change_ticket_message">
			</textarea>
			<p>
			
			<p>
				<label for = "select_change_ticket_message"> Выбор номера тикета </label>
			</p>
			<?php
				number_ticket($link);
			?>
			<input type="submit" name = "change_ticket_message" 
				id = "change_ticket_message" value = "Изменить" />
			<input type="submit" name = "delete_ticket_message" 
				id = "delete_ticket_message" value = "Удалить" />
			<input type="submit" name = "ok_job_engineer" 
				id = "ok_job_engineer" value = "Задание выполнил" />
		</form>
	</div>
			<!-- конец формы для изменения тикета -->
	
		<div class = "clear">
		</div>

	</div>
	
	<div id = "wrap_ticket_message">
		<?php 
			$elements_ticket_DB = select_elem_from_DB($link, 'tickets', 'user_add_ticket',
														'who_directed','ticket_message', 'date_add', 
														'date_end','ticket_color','checked',0,0,0, 
															0,0);
			
			if( $elements_ticket_DB && mysqli_num_rows($elements_ticket_DB) ){
				$i = 1; //номер тикета
				while( $row = mysqli_fetch_array($elements_ticket_DB) ){
					$date_add = $row['date_add'];
					$who_directed = $row['who_directed'];
					$user_add_ticket = $row['user_add_ticket'];
					$ticket_message = $row['ticket_message'];
					$date_end = $row['date_end'];
					$ticket_color = $row['ticket_color'];
					$checked = $row['checked'];
					
					switch($who_directed){
						case 'Овсянкин':
							$color_ticket = "$ticket_color";
							if($checked === "K"){
								$color_ticket = "none";
							}
							break;
						case 'Сюваев':
							$color_ticket = "$ticket_color";
							if($checked === "K"){
								$color_ticket = "none";
							}
							break;
						case 'Касаткин':
							$color_ticket = "$ticket_color";
							if($checked === "K"){
								$color_ticket = "none";
							}
							break;
						case 'Железнов':
							$color_ticket = "$ticket_color";
							if($checked === "K"){
								$color_ticket = "none";
							}
							break;
						case 'Касимов':
							$color_ticket = "$ticket_color";
							if($checked === "K"){
								$color_ticket = "none";
							}
							break;
						case 'Для всех':
							$color_ticket = "$ticket_color";
							if($checked === "K"){
								$color_ticket = "none";
							}
						default:
							$teg_option_bg_color = "#FFF";
							break;
					}
					
					echo "<div class = 'ticket' id = 'ticket' style = 'background: $color_ticket'>
							<!-- <p class = 'show_hidden_ticket_message' onclick = 'foo(this)'> + </p>
							<p class = 'show_hidden_ticket_message' onclick = 'foo_o(this)'></p>
							-->
							<ul> 
								<li> <span> Номер тикета: </span> $i </li>
								<li> <span> Дата добавления: </span> $date_add </li>
							</ul>
							
							<ul> 
								<li> <span> От: </span> $user_add_ticket </li>
								<li> <span> Кому: </span> $who_directed </li>
							</ul>
							
							<ul> 
								<li> <span> Дата завершения работ: </span> $date_end </li>
								<li> <span> Задание: </span> $ticket_message </li>
							</ul>
						 </div>";
				$i++;
			}
		}else{
			echo "<p> Текущих тикетов нет </p>";
		 }		
		?>
	</div>
	
	
	<script>	
	
		/*function foo(a){
			var div_ticket = a.parentNode;
			div_ticket.style.height = "auto";
			var show_ticket_message = div_ticket.childNodes;
			show_ticket_message[1].innerHTML = "";
			show_ticket_message[2].innerHTML = "-";	
		}
		
		function foo_o(a){
			var div_ticket = a.parentNode;
			div_ticket.style.height = "120px";
			var hidden_ticket_message = div_ticket.childNodes;
			hidden_ticket_message[0].innerHTML = "+";
			hidden_ticket_message[1].innerHTML = "";		
		}*/
		
		function valid_add_ticket(form){
			var elem_form = form.elements;
			if(!elem_form.textarea_add_ticket.value || !elem_form.date_end.value){
				alert("Пустое сообщение");
			}
		}
		
	</script>

</body>
</html>