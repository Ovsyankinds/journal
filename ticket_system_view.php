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
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/header.css" rel="stylesheet">
	<link rel = "stylesheet" href = "css/tickets.css">
</head>

<body>

	<?php
			require_once "header.php";
	?>

	<div class="container-fluid">
		<div class="row">
			<!-- Форма для добавления тикета -->
			<div class="col">
				<form name = "add_ticket" method = "POST" action="ticket_system_add_DB.php" id = "form_add_ticket">			
					<div class="form-group">
						<label for = "textarea_add_ticket" class="col-md-12 col-form-label text-center"> Добавить сообщение тикета </label>
						<div class="row">
							<div class="col-md-12">
								<textarea cols = "45" rows = "10" wrap = "hard" name = "textarea_add_ticket" 
													class="form-control" id = "textarea_add_ticket"> 
								</textarea>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col">
								<label for = "who_directed" class="col-md-12 col-form-label"> Кому адресовано </label>
							
								<?php
									$cookie_user_login = $_COOKIE['user_login'];
									$query = "select sername, user_color from registered_users
																							where id_status = 1";
									$array_users_who_directed = mysqli_query($link, $query);						
									$count_note = mysqli_num_rows($array_users_who_directed);
									$count_who_directed = $count_note;
									
									echo "<select name = 'who_directed' class='form-control' id = 'who_directed'>";	
									while($row = mysqli_fetch_array($array_users_who_directed)){
										$users_who_directed = $row['sername'];
										$user_color = $row['user_color'];
										$value_tag_option = $users_who_directed . "." . $user_color;
										/*while($count_note){
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
										}*/

										$teg_option_bg_color = "#FFF";
										
										echo "<option value = '$value_tag_option' style = 'background: $teg_option_bg_color'> 
												$users_who_directed </option>";
										
									}
									
									echo "<option value = 'Для всех.#BB9955' style = 'background: #BB9955'>
											Для всех </option>";
									echo "</select>";
								?>
							</div>
							<div class="col">
								<label for = "input_date_end" class="col-md-12 col-form-label"> Дата окончания работы: </label>
								<input type = "date" name = "date_end" class="form-control" id = "input_date_end" />
							</div>
						</div>
				
						<div class="row">
							<div class="col-md-12 text-center">
								<input type="submit" name = "submit_add_ticket" class="btn btn-secondary"
													 id = "submit_add_ticket" value="Добавить тикет" 
													 onclick = "valid_add_ticket(this.form)"/>
							 </div>
					 	</div>
					</div>
				</form>
			</div>
			<!-- конец формы для добавления тикета -->
				
			<!-- Форма для изменения тикета или удаления -->
			<div class="col">
				<form name = "form_change_ticket_message" method = "POST" action = "ticket_system_change_or_delete.php" 
					id = "form_change_ticket_message">
					<div class="form-group">
						<label for ="textarea_change_ticket_message" class="col-md-12 col-form-label text-center"> Изменение и удаление тикета </label>
						<div class="row">
							<div class="col-md-12">
								<textarea cols = "45" rows = "10" wrap = "hard" 
									name = "textarea_change_ticket_message" class="form-control" id = "textarea_change_ticket_message">
								</textarea>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col">
								<label for = "select_change_ticket_message"  class="col-md-12 col-form-label"> 
									Выбор номера тикета 	
								</label>
								<select name = 'select_num_tickets' class='form-control' id = 'select_num_tickets'>
									<?php
										number_ticket($link);
									?>
								</select>
							</div>
							<div class="col">
								<label for = "select_change_ticket_message"  class="col-md-12 col-form-label"> 
									Выберите действие 	
								</label>
								<input type="submit" name = "change_ticket_message" class="btn btn-secondary" 
									id = "change_ticket_message" value = "Изменить" />

								<input type="submit" name = "delete_ticket_message" class=" btn btn-secondary
									id = "delete_ticket_message" value = "Удалить" />
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12 text-center">
								<input type="submit" name = "ok_job_engineer" class="btn btn-secondary" id = "ok_job_engineer" 					value = "Задание выполнил" />
							</div>
						</div>
					</div>
				</form>
			</div>
		<!-- конец формы для изменения тикета -->
		</div>

		<div class = 'row'>
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
				
					echo "<div class='col-md-6'>
										<div class='card' style = 'background: $color_ticket'>
											<div class='card-body'>
												<!-- <p class = 'show_hidden_ticket_message' onclick = 'foo(this)'> + </p>
												<p class = 'show_hidden_ticket_message' onclick = 'foo_o(this)'></p>
												-->
												
												<h4 class='card-title'> Номер тикета: $i </h4>
												<h4 class='card-title'> Дата добавления: $date_add </h4>
												<h4 class='card-title'> От: $user_add_ticket </h4>
												<h4 class='card-title'> Кому: $who_directed </h4>
												<h4 class='card-title'> Дата завершения работ: $date_end </h4>

												 <p class='card-text'> Задание: $ticket_message </p>
											</div>
										</div>
									</div>";
				$i++;
			}
		}else{
			$str = "Текущих тикетов нет";
		 }		
		?>
		</div>
	
		<div class="row">
			<div class="col-md-12 text-center message-for-ticket">
				<span> <?=$str;?> </span>
			</div>
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
	</div>

</body>
</html>