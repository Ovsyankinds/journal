<!-- меню -->
	<div id = "menu">

		<ul class="nav nav-pills">
			  <li role="presentation"><a href = "general.php"> Назад на главную страницу </a></li>
			  <li role="presentation"><a href = "print_journal.php?
			<?php 
			
				/*код для формирования Get-запроса и перехода на страницу печати
					с параметрами в Get-массиве для фомрирования таблицы для 
					печати
				*/
				
				//выбираем записи по полю автовыбора
				if(isset($_POST['submit_number_of_output_lines']) &&
						$_POST['auto_number_of_output_lines'] != 0 &&
						empty($_POST['number_of_output_lines']) &&
						empty($_POST['input_number_range_one']) && 
						empty($_POST['input_number_range_two'])){
							
					echo "lines=" . $number_of_output_lines[0];
				}
				
				//выбираем записи по полю "Введите число просматриваемых записей"
				elseif(isset($_POST['submit_number_of_output_lines']) &&
						!empty($_POST['number_of_output_lines']) &&
						$_POST['auto_number_of_output_lines'] == 0 &&
						empty($_POST['input_number_range_one']) && 
						empty($_POST['input_number_range_two'])){
					
					echo "lines=" . $number_of_output_lines[0];
				}
				
				//выбираем записи по диапазону с значения и до значения
				elseif(isset($_POST['submit_number_of_output_lines']) &&
						!empty($_POST['input_number_range_one']) && 
						!empty($_POST['input_number_range_two']) &&
						$_POST['auto_number_of_output_lines'] == 0 &&
						empty($_POST['number_of_output_lines'])){
					
					echo "lines=" . $number_of_output_lines[0] . "-" . 
							$number_of_output_lines[1];
				}
					
				elseif(isset($_POST['submit_note_shift']) && 
					!empty($_POST['select_note_shift']) &&
					empty($_POST['select_date_shift']) &&
					empty($_POST['select_date_shift_two'])){
					
					echo "name_engineer_shift=" . $name_engineer_shift;
				}
				
									
				elseif(isset($_POST['submit_note_shift']) && 
					!empty($_POST['select_note_shift']) &&
					!empty($_POST['select_date_shift']) &&
					!empty($_POST['select_date_shift_two'])){
					
					echo "name_engineer_shift=$name_engineer_shift&select_date_shift=$select_date_shift&select_date_shift_two=$select_date_shift_two";
				}
				
				elseif(isset($_POST['submit_note_shift']) && 
					empty($_POST['select_note_shift']) &&
					!empty($_POST['select_date_shift']) &&
					!empty($_POST['select_date_shift_two'])){
					
					echo "select_date_shift=$select_date_shift&select_date_shift_two=$select_date_shift_two";
				}
				
				elseif(isset($_POST['submit_select_name_machine']) && 
					!empty($_POST['select_name_machine'])){
					
					echo "name_machine=" . $_POST['select_name_machine'];
				}
				
				else{
					echo "lines=" . $number_of_output_lines[0];
				}
												
			?>
			">Распечатать журнал </a> </li>
		</ul>
	</div>
<!-- конец блока меню -->