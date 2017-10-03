<?php
	require_once "engine/connectToDB.php";
	require_once "engine/function.php";
	//require_once "/home/homeel/homeelectrical.ru/docs/engine/connectToDB.php";
	//require_once "/home/homeel/homeelectrical.ru/docs/engine/function.php";
	mysqli_query($link, "SET NAMES 'utf8'");
	if(!empty($_COOKIE['user_login'])){
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
	<link rel = "stylesheet" href = "/css/journal_of_breakdowns_for_electric.css">
</head>

<body>

	<?php
		require_once "journal_for_electric/menu_for_electric.php";
	?>	

<div class="container-fluid">
	<?php
		if($_GET['page'] === "instrument_readings"){
			require_once "journal_for_electric/instrument_readings.php";
		}else{
			require_once "header.php"; //надпись журнала
		//require_once "/home/homeel/homeelectrical.ru/docs/header.php";
	?>
<!-- таблица с заголовками и с стрелками для сортировки по столбцам -->
	<div class="row">
		<div class="table-responsive">
			<table id = "table-for-electric">
			<tr>
			<th> 
				<span> Номер записи </span> 
			</th>

			<th>
				<span> Дата </span> 
			</th>

			<th>		
				<span> Смена </span>
			</th>

			<th>
				<span> Сменный электрик </span>
			</th>

			<th>
				<span> Номер цеха </span>
			</th>

			<th>
				<span> Название линии </span>
			</th>

			<th>
				<span> Вызов ФИО </span>
			</th>

			<th>
				<span> Время вызова </span> 
			</th>

			<th>
				<span> Окончание работы </span>
			</th>

			<th>
				<span> Время ремонта </span>
			</th>

			<th>
				<span> Причина вызова </span>
			</th>

			<th>
				<span> Устранение поломки </span>
			</th>

			<th>
				<span> Используемые ТМЦ </span>
			</th>

			<th>
				<span> Изменение записи </span>
			</th>
			</tr>

			<?php
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
			$array_id = note_of_journal($link, $name_select_table = "journal_of_breakdowns_electric", $selection_note, 0, $number_of_output_lines, 0, 0, 0, 0); 																				
			?>
			</table>
		</div>
		<!-- конец таблицы с заголовками и с стрелками для сортировки по столбцам -->	


		<?php
		//require_once "menu.php"; // код меню (назад на главную, распечатать 
							// журнал)

		//require_once "menu.php"; // код меню (назад на главную, распечатать 
							// журнал)
		//require_once "/home/homeel/homeelectrical.ru/docs/menu.php";
		require_once "journal_for_electric/form_input_note_electric.php"; //код для добавления записей в
										//таблицу
		//require_once "/home/homeel/homeelectrical.ru/docs/form_input_note.php";

		require_once "delete_note_electric.php"; //код для удаления запсей из таблицы
		//require_once "/home/homeel/homeelectrical.ru/docs/delete_note.php";

		//require_once "table.php"; // код для вывода таблицы журнала
		//require_once "/home/homeel/homeelectrical.ru/docs/table.php";

		?>

		<script src = "/JS/js.js"></script>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="/js/bootstrap.min.js"></script>
	</div>
	<?php }?>
</div>

</body>
</html>

<?php 
	}else{
		echo "Вы не зашли";
	}
?>