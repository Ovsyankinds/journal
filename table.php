<!-- Блок для скрытых столбцов -->
<div id = "back_th_td">
	<ul>
		<li> <a href = "#"> Вернуть ячейку "Номер записи" </a></li>
		<li> <a href = "#"> Вернуть ячейку "Дата" </a></li>
		<li> <a href = "#"> Вернуть ячейку "Смена" </a></li>
		<li> <a href = "#"> Вернуть ячейку "Сменный инженер ЭТ" </a></li>
		<li> <a href = "#"> Вернуть ячейку "Номер цеха" </a></li>
		<li> <a href = "#"> Вернуть ячейку "Нзвание линии" </a></li>
		<li> <a href = "#"> Вернуть ячейку "Вызов ФИО" </a></li>
		<li> <a href = "#"> Вернуть ячейку "Время вызова" </a></li>
		<li> <a href = "#"> Вернуть ячейку "Окончание работы" </a></li>
		<li> <a href = "#"> Вернуть ячейку "Время ремонта" </a></li>
		<li> <a href = "#"> Вернуть ячейку "Причина вызова" </a></li>
		<li> <a href = "#"> Вернуть ячейку "Устранение поломки" </a></li>
		<li> <a href = "#"> Вернуть ячейку "Используемые ТМЦ" </a></li>
	</ul>	
</div>
<!-- конец блока для скрытых столбцов -->

<!-- таблица с заголовками и с стрелками для сортировки по столбцам -->
<table id = "table">
	<tr>
		<th> 
			<a class = "top_row" href = "journal_of_breakdowns.php?val=1"> &#9650; </a>
			<p><a href = "#"> &#60; </a></p>
			<span class = "head_table"> Номер записи </span> 
			<a class = "botom_row" href = "journal_of_breakdowns.php?val=2"> &#9660; </a> 
		</th>
	
		<th>
			<a class = "top_row" href = "journal_of_breakdowns.php?val=3"> &#9650; </a>
			<p><a href = "#"> &#60; </a></p>
			<span> Дата </span> 
			<a class = "botom_row" href = "journal_of_breakdowns.php?val=4"> &#9660; </a> 
		</th>
		
		<th>
			<a class = "top_row" href = "journal_of_breakdowns.php?val=5"> &#9650; </a>
			<p><a href = "#"> &#60; </a></p>			
			<span> Смена </span> 
			<a class = "botom_row" href = "journal_of_breakdowns.php?val=6"> &#9660; </a> 
		</th>
		
		<th>
			<a class = "top_row" href = "#"> &#9650; </a> 
			<p><a href = "#"> &#60; </a></p>
			<span> Сменный инженер ЭТ </span> 
			<a class = "botom_row" href = "#"> &#9660; </a> 
		</th>
		
		<th> 
			<a class = "top_row" href = "journal_of_breakdowns.php?val=9"> &#9650; </a>
			<p><a href = "#"> &#60; </a></p>
			<span class = "journal_header_table"> Номер цеха </span> 
			<a class = "botom_row" href = "journal_of_breakdowns.php?val=10"> &#9660; </a>
		</th>
		
		<th> 
			<a class = "top_row" href = "#"> &#9650; </a>
			<p><a href = "#"> &#60; </a></p>
			<span class = "journal_header_table"> Название линии </span>
			<a class = "botom_row" href = "#"> &#9660; </a>
		</th>
		
		<th> 
			<a class = "top_row" href = "#"> &#9650; </a>
			<p><a href = "#"> &#60; </a></p>
			<span class = "journal_header_table"> Вызов ФИО </span>
			<a class = "botom_row" href = "#"> &#9660; </a>
		</th>
		
		<th> 
			<a class = "top_row" href = "#"> &#9650; </a>
			<p><a href = "#"> &#60; </a></p>
			<span class = "journal_header_table"> Время вызова </span> 
			<a class = "botom_row" href = "#"> &#9660; </a> 
		</th>
		
		<th> 
			<a class = "top_row" href = "#"> &#9650; </a>
			<p><a href = "#"> &#60; </a></p>
			<span class = "journal_header_table"> Окончание работы </span> 
			<a class = "botom_row" href = "#"> &#9660; </a> 
		</th>
		
		<th> 
			<a class = "top_row" href = "#"> &#9650; </a>
			<p><a href = "#"> &#60; </a></p>
			<span class = "journal_header_table"> Время ремонта </span> 
			<a class = "botom_row" href = "#"> &#9660; </a> 
		</th>
	
		<th>
			<a class = "top_row" href = "#"> &#9650; </a>
			<p><a href = "#"> &#60; </a></p>
			<span class = "journal_header_table"> Причина вызова </span>
			<a class = "botom_row" href = "#"> &#9660; </a>
		</th>
		
		<th> 
			<a class = "top_row" href = "#"> &#9650; </a>
			<p><a href = "#"> &#60; </a></p>
			<span class = "journal_header_table"> Устранение поломки </span> 
			<a class = "botom_row" href = "#"> &#9660; </a>
		</th>
		
		<th> 
			<a class = "top_row" href = "#"> &#9650; </a>
			<p><a href = "#"> &#60; </a></p>
			<span class = "journal_header_table"> Используемые ТМЦ </span> 
			<a class = "botom_row" href = "#"> &#9660; </a>
		</th>
		
		<th>
			<p><a href = "#"> &#60; </a></p>
			<span class = "journal_header_table"> Изменение записи </span>
		</th>
	</tr>
	
<?php
	//Переменная для сортировки по колонкам. Если не существует переменная, 
	//т.е. зашли первый раз и не ранжировали записи то присваиваем значение 0
	if(!isset($_GET['val'])){ 
								
		$selection_note = 0;
	}else{
		$selection_note = $_GET['val'];
	}
	
	/*выбор чилса записей выводящихся в таблице; 
		используется поле "Введите число просматриваемых записей";
		$number_of_output_lines массив передающийся в функцию note_of_journal
	*/
	$number_of_output_lines = array();
	//обнуляем массив number_of_output_lines
	//$number_of_output_lines[] = 0;
	if(isset($_POST['submit_number_of_output_lines']) &&
		$_POST['auto_number_of_output_lines'] != 0 &&
		empty($_POST['number_of_output_lines']) &&
		empty($_POST['input_number_range_one']) && 
		empty($_POST['input_number_range_two'])){
		
		$number_of_output_lines[] = $_POST['auto_number_of_output_lines'];
	}
	
	elseif(isset($_POST['submit_number_of_output_lines']) &&
			!empty($_POST['number_of_output_lines']) &&
			is_numeric($_POST['number_of_output_lines']) &&
			$_POST['auto_number_of_output_lines'] == 0 &&
			empty($_POST['input_number_range_one']) && 
			empty($_POST['input_number_range_two'])){
			
			$number_of_output_lines[] = trim(
				strip_tags($_POST['number_of_output_lines']));
	}
	
	elseif(isset($_POST['submit_number_of_output_lines']) &&
			!empty($_POST['input_number_range_one']) && 
			!empty($_POST['input_number_range_two']) &&
			is_numeric($_POST['input_number_range_one']) &&
			is_numeric($_POST['input_number_range_two']) &&
			$_POST['auto_number_of_output_lines'] == 0 &&
			empty($_POST['number_of_output_lines'])
			){
			
		$number_of_output_lines_range_one = trim(
			strip_tags($_POST['input_number_range_one']));
		$number_of_output_lines_range_two = trim(
			strip_tags($_POST['input_number_range_two']));
		$number_of_output_lines[] = $number_of_output_lines_range_one;
		$number_of_output_lines[] = $number_of_output_lines_range_two; 
	}
	else{
		$number_of_output_lines[] = 5;
	}
	
	//код для выбора записей по сменному инженеру и по дате
	if(isset($_POST['select_note_shift'])){
		$name_engineer_shift = $_POST['select_note_shift'];
	}
	if(empty($_POST['select_note_shift'])){
		$name_engineer_shift = "";
	}
	
	if(isset($_POST['select_date_shift']) && isset($_POST['select_date_shift_two'])){
		$select_date_shift = $_POST['select_date_shift'];
		$select_date_shift_two = $_POST['select_date_shift_two'];
	}
	else{
		$select_date_shift = 0;
		$select_date_shift_two = 0;
	}
	
	//код для выбора записей по названию линий
	
	if(isset($_POST['submit_select_name_machine'])){
		if(!empty($_POST['select_name_machine'])){
			$name_machine = $_POST['select_name_machine'];
		}			
	}
	else{
		$name_machine = 0;
	}
	
	//функция по выборке из БД записей и формированию таблицы;
	$array_id = note_of_journal($link, $name_select_table = "journal_of_breakdowns", $selection_note, 0, $number_of_output_lines, $name_engineer_shift,
								$select_date_shift, $select_date_shift_two, 
								$name_machine); 																				
?>
</table>
<!-- конец таблицы с заголовками и с стрелками для сортировки по столбцам -->