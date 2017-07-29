<?php
	require_once "engine/connectToDB.php";
	require_once "engine/function.php";
	mysqli_query($link, "SET NAMES 'utf8'");
?>

<!DOCTYPE>
<html>
<head>
	<title> Главная страница журнала </title>
	<meta http-equiv="Content-Type" content="text/html; charset = utf-8" />
	<link rel = 'stylesheet' type = 'text/css' href = 'css/print.css' >
</head>

<body>

	<?php
		 $user_status = $_COOKIE['id_status'];
		 switch($user_status){
		 	case 0:
		 		$name_data_base = "journal_of_breakdowns_electric";
		 		$back_to_journal = "journal_of_breakdowns_electric.php";
		 		break;
 			default:
 				$name_data_base = "journal_of_breakdowns";
 				$back_to_journal = "journal_of_breakdowns.php";
		 }
	?>

<table id = "table_journal_of_breakdowns">
		<tr>
			<td> <span class = "journal_header_table"> № </span> </td>
			<td> <span class = "journal_header_table"> Д </span> </td>
			<td> <span class = "journal_header_table"> См. </span> </td>
			<td> <span class = "journal_header_table"> См.ИЭТ </span> </td>
			<td> <span class = "journal_header_table"> №ц. </span> </td>
			<td> <span class = "journal_header_table"> НЛ </span> </td>
			<td> <span class = "journal_header_table"> В </span> </td>
			<td> <span class = "journal_header_table"> ВВ</span> </td>
			<td> <span class = "journal_header_table"> ОР </span> </td>
			<td> <span class = "journal_header_table"> ВР </span> </td>
			<td> <span class = "journal_header_table"> ПВ </span> </td>
			<td> <span class = "journal_header_table"> УП </span> </td>
			<td> <span class = "journal_header_table"> ИТМЦ </span> </td>
		</tr>
			
		<?php
			$_GET['val'] = 0;
			
			if(!empty($_GET['lines'])){
				$limits = explode("-", $_GET['lines']);
				
				//функция по выборке из БД записей и формированию таблицы;
				$array_id = note_of_journal($link, $name_data_base, $_GET['val'], 1, $limits, 
								0, 0, 0, 0 ); 
			}
			
			elseif(!empty($_GET['name_engineer_shift'])){
				$name_engineer_shift = $_GET['name_engineer_shift'];
				$array_id = note_of_journal($link, $_GET['val'], 1, 
								0, $name_engineer_shift, 0, 0, 0); 
			}
			
			elseif(!empty($_GET['name_engineer_shift']) && 
				!empty($_GET['select_date_shift']) &&
				!empty($_GET['select_date_shift_two'])){
				
				$name_engineer_shift = $_GET['name_engineer_shift'];
				$select_date_shift = $_GET['select_date_shift'];
				$select_date_shift_two = $_GET['select_date_shift_two'];
				$array_id = note_of_journal($link, $_GET['val'], 1, 
								0, $name_engineer_shift, $select_date_shift, 
								$select_date_shift_two, 0);
				
			}
			
			elseif(empty($_GET['name_engineer_shift']) && 
				!empty($_GET['select_date_shift']) &&
				!empty($_GET['select_date_shift_two'])){
				
				$select_date_shift = $_GET['select_date_shift'];
				$select_date_shift_two = $_GET['select_date_shift_two'];
				$array_id = note_of_journal($link, $_GET['val'], 1, 
								0, 0, $select_date_shift, 
								$select_date_shift_two, 0);
				
			}
			
			elseif(!empty($_GET['name_machine'])){
				$name_machine = $_GET['name_machine'];
				$array_id = note_of_journal($link, $_GET['val'], 1, 
								0, 0, 0, 
								0, $name_machine);
				
			}
		
		?>
</table>

<div id = "signature_div">
	<p class = "signature" id = "signature_pass"> Смену и инструмент сдал:  ______________________ </p>
	<p class = "signature" id = "signature_take"> Смену и инструмент принял:______________________ </p>
	<p class = "signature" id = "signature_nach"> Начальник отдела ПЭ       ______________________ </p>
</div>

<script>
	function print_(){
		var sumbit = document.getElementById('submit');
		submit.style.display = 'none';
		var a = document.getElementById('back_to_journal_of_breakdowns');
		a.style.display = 'none';
		 window.print();
	}
	
</script>

<div id = "submit_print">
	<input id = "submit" type = "submit" value = "Распечатать" onClick = "print_()">
	<a href = "<?=$back_to_journal;?>" id = "back_to_journal_of_breakdowns"> Назад к журналу </a>
</div>



</body>

</html>
