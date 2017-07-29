<!-- форма для выбора числа записей, которые будут показаны на экране -->
	<div id = "form_option">
		<form name = "form_number_of_output_lines" method = "POST" action = "journal_of_breakdowns.php">
			<p>
				<label for = "auto_number_of_output_lines"> Автовыбор числа просматриваемых записей </label>
					<select size = "1" name = "auto_number_of_output_lines" id = "auto_number_of_output_lines">
						<option> Не использовать </option>
						<option value = "1"> 1 </option>
						<option value = "5"> 5 </option>
						<option value = "10"> 10 </option>
						<option value = "15"> 15 </option>
						<option value = "25"> 25 </option>
					</select>
			</p>
			
			<p>
				<label for = "input_number_of_output_lines"> 
					Введите число просматриваемых записей </label>
				<input type = "text" name = "number_of_output_lines" 
					id = "input_number_of_output_lines" />
				
				<span> C </span>
				<input type = "text" name = "input_number_range_one" 
					id = "input_number_range_one" />
				
				<span> До </span>
				<input type = "text" name = "input_number_range_two" 
					 id = "input_number_range_two"/>
				<input type = "submit" name = "submit_number_of_output_lines"
					value = "Выбрать" />
			</p>
			
			<?php if(!empty($errros)) echo $errors; ?>
		</form>
		
		
		<!-- Форма для выбора записей по сменному инженеру и дате -->
		<form name = "select_note_shift_form" method = "POST" action = "journal_of_breakdowns.php">
			<p>
				<label for = "select_note_shift"> Выбор дежурного ИЭТ </label>
				<?php select_login_engineer_shift($link); ?>
			</p>
			<p>
				<label for = "select_date_shift"> Выбор даты </label>
				<input type = "date" name = "select_date_shift" 
						id = "select_date_shift" />
				<input type = "date" name = "select_date_shift_two" 
						id = "select_date_shift_two" />
				<input type = "submit" name = "submit_note_shift" 
						value = "Выбрать" />
			</p>
		</form>
		<!-- конец формы выбора записей по сменному инженеру и дате -->
		
		<!-- Форма для выбора записей по названиям линий -->
		<form name = "select_note_name_machine" method = "POST" action = "journal_of_breakdowns.php">
			<p>
				<label for = "select_note_shift"> Выбор записей по названию линии </label>
				<?php
					select_note_name_machine($link);
				?>
				<input type = "submit" name = "submit_select_name_machine" value = "Выбрать" />
			</p>
		</form>
		<!-- конец формы для выбора записей по названиям линий -->
		
	</div>
	<!-- конец формы для выбора числа записей, которые будут показаны на экране -->