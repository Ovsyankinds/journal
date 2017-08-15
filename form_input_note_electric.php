<!-- Кнопка для вывода формы добавления записей в журнал -->
<div class = "row select-workshop">
	<div class="col-md-3">
	</div>
	<div class="col-md-6 well">
		<p class="text-center"> Для добавления записи выберите номер цеха: </p>
		<form name = "add_new_message_electric" method = "POST" action = "journal_of_breakdowns_electric.php" class="form-horizontal">
			<div class="form-group text-center">
				<div class="col-md-12">
					<label class="radio-inline">
						<input type = "radio" name = "number_workshop" value = "1" class = "number_workshop"/> Цех №1
					</label>
				
					<label class="radio-inline"hidden="">		
						<input type = "radio" name = "number_workshop" value = "2" class = "number_workshop"/> Цех №2
					</label>

					<label class="radio-inline">
						<input type = "radio" name = "number_workshop" value = "3" class = "number_workshop"/> Цех №3 
					</label>

					<label class="radio-inline">
						<input type = "radio" name = "number_workshop" value = "5" class = "number_workshop"/> Цех №5
					</label>

					<label class="radio-inline">
						<input type = "radio" name = "number_workshop" value = "7" class = "number_workshop"/> Цех №7
					</label>

					<label class="radio-inline">
						<input type = "radio" name = "number_workshop" value = "4" class = "number_workshop" /> Другое
					</label>
				</div>

				<div class="col-md-12">
					<input type = "submit" name = "show_form_add_new_message_to_journal_electric" value = "Добавить новую запись" class="btn btn-default" id="button-select-workshop"/>
				</div>
			</div>
		</form>
		</div>

		<div class="col-md-3">
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
<div class = "row" id="form-add-note">

	<?php 
		echo "</br><p class='text-center header-in-form-add-note'> $message_number_workshop </p>"; 
	?>

		<form name = "add_new_message_electric" method = "POST" 
		action = "add_new_message_to_journal_electric.php" onsubmit = "valid_form_add_mess(this)" 
		class="form-horizontal">
			<div class="form-row">
				<div class="col-md-3 text-center">
					<label for = "name_machine" class="col-form-label"> Название линии </label>
					<select size = "1" name = "name_machine" id = "name_machine" class="form-control"> 
						<?php
							while($row_two = mysqli_fetch_array($result_query_select_name_machine)){
								$name_machine = $row_two['name_machine'];
								echo "<option value = '$name_machine'>" . $name_machine . "</option>";
							}
						?>
					</select> 
				</div>
			
				<div class="col-md-3 text-center">
					<label for = "caller_FIO" class="col-form-label"> Вызов сделал </label>
					<input type = "text" name = "caller_FIO" id = "caller_FIO" 
						value = "Мастер" class="form-control"/> 
				</div>

				<div class="col-md-3 text-center">
					<label for = "call_time" class="col-from-label"> Время вызова </label>
					<input type = "time" name = "call_time" value = "00:00" class="form-control" />
				</div>

				<div class="col-md-3 text-center">
					<label for = "end_of_work" class="col-form-label"> Окончание работы </label>
					<input type = "time" name = "end_of_work" value = "00:00" class="form-control" /> 
				</div>
		
				<label for = "breakdown" class = "label_breakdown"> Ошибка или причина поломки </label> 
				<textarea cols = "45" rows = "10" wrap = "hard" name = "breakdown" id ="breakdown" 
							onBlur = "foo(this.value)" class="form-control"> 
				</textarea> 
	
				<!-- <p> <div id = "hidden_message"> </div> </p> -->
			
				<!-- Блок кода для создания списка из checkbox'ов
					для добавления автоматом записи в поле "Устранение поломки"-->
				<div id = "checkbox_removal_breakdown"> 
					<ul> 
						<li>
							<span> Исп.поля </span>
							<input type = "checkbox" name = "checkbox_removal_breakdown[]"
							value = "1" onclick = "checkbox(this)"/>
						</li> 
						<li>
							<span> Исп.поля+обход </span>
							<input type = "checkbox" name = "checkbox_removal_breakdown[]"
							value = "2" onclick = "checkbox(this)"/>
						</li> 
						<li> 
							<span> Принтер </span>
							<input type = "checkbox" name = "checkbox_removal_breakdown[]" 
							value = "3" onclick = "checkbox(this)" /> 
						</li> 
					</ul>
				</div>
				<!-- конец блока для создания списка из checkbox'ов -->
			
			<script>
					/*функция по добавлению автоматом записи в поле "Утсранение
						поломки" по нажатию на checkbox*/
				var textarea_removal_breakdown = document.getElementsByName('removal_breakdown');
				var text = "";
				function checkbox(input){
					if(input.checked){
						switch(input.value){
							case "1":
								text = "Проверка видимого заземления на 3х полях, пробои фиксируются";
								break;
							case "2":
								text = "Проверка видимого заземления на 3х полях, пробои фиксируются. Обход линий";
								break;
							case "3":
								text = "Долил чернила в маркир";
								break;
							
						}
					input.checked = "";
					textarea_removal_breakdown[0].innerHTML = text;
					}
				}
					/*конец функции по добавлению записи в поле "Утсранение поломки"*/
			</script>
			
				<p>
					<label for = "removal_breakdown" class = "label_breakdown"> Устранение поломки </label>
					<textarea cols = "45" rows = "10" wrap = "hard" name = "removal_breakdown" id = "removal_breakdown" onclick = "fun_one(this)" 
								onBlur = "foo(this.value)" class="form-control">
					</textarea>
				</p>
				
				<p>
					<label for = "used_teh_mat_values" class = "label_breakdown"> Используемые ТМЦ </label>
					<textarea cols = "45" rows = "10" wrap = "hard" name = "used_teh_mat_values" id = "used_teh_mat_values" onclick = "fun_one(this)" class="form-control">
					</textarea>
				</p>
				
				<input type = "radio" checked name = "add_number_workshop" hidden = "true" value = "<?php echo $number_workshop; ?>">
				<input type = "submit" name = "add_new_message_to_journal_electric" class="form-control btn btn-default">
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