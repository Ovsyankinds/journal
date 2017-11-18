<!-- Кнопка для вывода формы добавления записей в журнал -->
<div class="container">
<div class = "row select-workshop justify-content-center">
	<div class="col-md-5 alert alert-success text-center" role="alert">
		Для добавления записи выберите номер цеха:
	</div>

	<div class="col-md-10">
		<form name = "add_new_message_electric" method = "POST" action = "journal_of_breakdowns_electric.php" class="form-horizontal" id="inlineRadio1">
			<div class="form-group text-center">

				<div class="form-check form-check-inline">
					<label class="form-check-label">
						<input type = "radio" name = "number_workshop" 
									 value = "1" class = "number_workshop form-check-input"/> Цех №1
					</label>
				</div>
				
				<div class="form-check form-check-inline">
					<label class="form-check-label">		
						<input type = "radio" name = "number_workshop" 
									 value = "2" class = "number_workshop form-check-input"/> Цех №2
					</label>
				</div>

				<div class="form-check form-check-inline">
					<label class="form-check-label">
						<input type = "radio" name = "number_workshop" 
									 value = "3" class = "number_workshop form-check-input"/> Цех №3 
					</label>
				</div>

				<div class="form-check form-check-inline">
					<label class="form-check-label">
						<input type = "radio" name = "number_workshop" 
									 value = "5" class = "number_workshop form-check-input"/> Цех №5
					</label>
				</div>

				<div class="form-check form-check-inline">
					<label class="form-check-label">
						<input type = "radio" name = "number_workshop" 
									 value = "7" class = "number_workshop form-check-input"/> Цех №7
					</label>
				</div>

				<div class="form-check form-check-inline">
					<label class="form-check-label">
						<input type = "radio" name = "number_workshop" 
									 value = "4" class = "number_workshop form-check-input" /> Другое
					</label>
				</div>

				<div class="col-md-12">
					<input type = "submit" name = "show_form_add_new_message_to_journal_electric" value = "Добавить новую запись" class="btn btn-default" id="button-select-workshop"/>
				</div>
			</div>
		</form>
	</div>
	</div>
</div>
<!-- Конец кода для кнопки вывода формы добавления записей в журнал -->

	
<?php
	if( isset($_POST['show_form_add_new_message_to_journal_electric']) ){ //если нажата кнопка "Добавить новую запись" выводим 
		if( !empty($_POST['number_workshop']) ){
		$number_workshop = $_POST['number_workshop'];
		$query_select_name_machine = "SELECT name_machine FROM list_of_machines WHERE number_workshop = '$number_workshop'";
		$result_query_select_name_machine = mysqli_query($link, $query_select_name_machine)
								or die("Не удается выполнить запрос  |||" . mysqli_error($link));
		$message_number_workshop = "Вы выбрали цех номер $number_workshop";


?>
<!-- Код вывода формы для добавления записей в журнал -->
<div class="container">
	<div class = "row justify-content-center" id="form-add-note">
		<div class='col-md-5 alert alert-success text-center' role='alert'>
			<?php 
				echo "$message_number_workshop";
			?>
		</div>
	</div>

	<form name = "add_new_message_electric" method = "POST" 
				action = "add_new_message_to_journal_electric.php" onsubmit = "valid_form_add_mess(this)" 
				id="form-add-new-message-for-electric">

		<div class="row">
			<div class=" form-group col-md-3">
				<label for = "name-machine" class="col-form-label label-form-input-note"> Название линии </label>
				<div class> </div>
				<select size = "1" name = "name_machine" id = "name-machine" 
								class="form-control form-control-css"> 
					<?php
						while($row_two = mysqli_fetch_array($result_query_select_name_machine)){
							$name_machine = $row_two['name_machine'];
							echo "<option value = '$name_machine'>" . $name_machine . "</option>";
						}
					?>
				</select> 
			</div>
		
			<div class="form-group col-md-3">
				<label for = "caller_FIO" class="col-form-label label-form-input-note"> Вызов сделал </label>
					 <a data-toggle="collapse" href="#collapseExample1" 
				  		aria-expanded="false" aria-controls="collapseExample">
		    		Развернуть
		  		</a>
				<div class="collapse" id="collapseExample1">
				  	<div class="form-group checkbox-for-auto-added">
					 		<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input type = "checkbox" name = "checkbox_caller[]"
										value = "1" onclick = "checkboxCaller(this)" class="form-check-input"/> Мастер
								</label>
								<label class="form-check-label">
									<input type = "checkbox" name = "checkbox_caller[]"
										value = "2" onclick = "checkboxCaller(this)" class="form-check-input"/> Оператор
								</label>
								<label class="form-check-label">
									<input type = "checkbox" name = "checkbox_caller[]"
										value = "3" onclick = "checkboxCaller(this)" class="form-check-input"/>  Слесарь
								</label>
							</div>
						</div>
				</div>
				<input type = "text" name = "caller_FIO" id = "caller_FIO" 
								class="form-control form-control-css"/>
			</div>

			<script>
				var inputCaller = document.getElementsByName('caller_FIO');
				var text = "";
				function checkboxCaller(input){
					if(input.checked){
						switch(input.value){
							case "1":
								text = "Мастер";
								break;
							case "2":
								text = "Оператор";
								break;
							case "3":
								text = "Слесарь";
								break;
						}
					input.checked = "";
					inputCaller[0].value = text;
					}
				}
			</script>

			<div class="form-group col-md-3">
				<label for = "call_time" class="col-form-label label-form-input-note"> Время вызова </label>
				<input type = "time" name = "call_time" value = "00:00" class="form-control form-control-css" 
								id="call_time" onclick = "checkbox(this)"/>
			</div>

			<div class="form-group col-md-3">
				<label for = "end_of_work" class="col-form-label label-form-input-note"> Окончание работы </label>
				<input type = "time" name = "end_of_work" value = "00:00" 
							class="form-control form-control-css" id="end_of_work" /> 
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for = "breakdown" class = "col-form-label label-form-input-note"> Ошибка или причина поломки </label>
				<textarea cols = "45" rows = "10" wrap = "hard" name = "breakdown" id ="breakdown" 
									onBlur = "foo(this.value)" class="form-control textarea-add-note"> 
				</textarea> 
			</div>
			
			<script>
					/*функция по добавлению автоматом записи в поле "Утсранение
						поломки" по нажатию на checkbox*/
				var textarea_removal_breakdown = document.getElementsByName('removal_breakdown');
				var text = "";
				function checkbox(input){
					if(input.checked){
						switch(input.value){
							case "1":
								text = "Обход линий";
								break;
						}
					input.checked = "";
					textarea_removal_breakdown[0].innerHTML = text;
					}
				}
					/*конец функции по добавлению записи в поле "Утсранение поломки"*/
			</script>
			
			<div class="form-group col-md-4">
				<label for = "removal_breakdown" class = "col-from-label label-form-input-note"> Устранение поломки </label>
					<div class="form-group checkbox-for-auto-added">
						<div class="form-check form-check-inline">
							<label class="form-check-label">
								<input type = "checkbox" name = "checkbox_removal_breakdown[]"
									value = "1" onclick = "checkbox(this)" 
									class="form-check-input"> Обход линий
							</label>
						</div>
					</div>
				
					<textarea cols = "45" rows = "7" wrap = "hard" name = "removal_breakdown" id = "removal_breakdown" onclick = "fun_one(this)" 
								onBlur = "foo(this.value)" class="form-control" id="removal_breakdown">
					</textarea>
			</div>

			<div class="form-group col-md-4">
				<label for = "used_teh_mat_values" class = "col-form-label label-form-input-note"> Используемые ТМЦ </label>
				<textarea cols = "45" rows = "10" wrap = "hard" 
							name = "used_teh_mat_values" id = "used_teh_mat_values" 
							onclick = "fun_one(this)" class="form-control textarea-add-note">
				</textarea>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-3">
				<input type = "radio" checked name = "add_number_workshop" 
							 hidden = "true" value = "<?php echo $number_workshop; ?>">
				<input type = "submit" name = "add_new_message_to_journal_electric" value="Добавить запись"
							class="form-control btn btn-secondary">
			</div>
		</div>
	</form>
</div>
<!-- конец кода для добавленя записи в журнал -->

<?php 
	}
	else{
	
?>
	
<script>
	alert("Вы не выбрали номер цеха");
</script>

<?php } ?>

<!-- Конец кода вывода формы для добавления записей в журнал -->
<?php
} //если нажата кнопка "Добавить новую запись"
?>