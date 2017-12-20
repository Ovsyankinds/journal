<?php
	//require_once "/engine/connectToDB.php";
	//require_once "/engine/function.php";
	//require_once "/home/homeel/homeelectrical.ru/docs/engine/connectToDB.php";
	//require_once "/home/homeel/homeelectrical.ru/docs/engine/function.php";
	require_once "engine/function.php";
	require_once "engine/connectToDB.php";
	mysqli_query($link, "SET NAMES 'utf8'");;
	
	$id_status = $_COOKIE['id_status'];
	switch($id_status){
		case 0:
			$backUrl = "journal_of_breakdowns_electric";
			break;
		case 1:
			$backUrl = "journal_of_breakdowns";
			break;
		default:
			$backUrl = "journal_of_breakdowns";
	}
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->

<head>
	<title> Изменение записи </title>
	<meta http-equiv="Content-Type" content="text/html; charset = utf-8" />
	<link rel = "stylesheet" href = "../css/change_note.css" >
	<script src = "JS/js.js"> </script>
</head>

<body>
	
	<div id = "top_menu_change_note">
		<ul>
			<li>
				<a href = "<?=$backUrl;?>.php"> Назад к журналу </a>
			</li>
			<li>
				<a href = "general.php"> Назад на главную страницу </a>
			</li>
		</ul>
	</div>
	
	<table class = "table_change">
		<tr>
			<th> 
				<a class = "top_row" href = "journal_of_breakdowns.php?val=1"> &#9650; </a> 
				<span class = "head_table"> Номер записи </span> 
				<a class = "botom_row" href = "journal_of_breakdowns.php?val=2"> &#9660; </a> 
			</th>
		
			<th>
				<a class = "top_row" href = "journal_of_breakdowns.php?val=3"> &#9650; </a> 
				<span> Дата </span> 
				<a class = "botom_row" href = "journal_of_breakdowns.php?val=4"> &#9660; </a> 
			</th>
			
			<th>
				<a class = "top_row" href = "#"> &#9650; </a> 
				<span> Смена </span> 
				<a class = "botom_row" href = "#"> &#9660; </a> 
			</th>
			
			<th>
				<a class = "top_row" href = "#"> &#9650; </a> 
				<span> Сменный инженер ЭТ </span> 
				<a class = "botom_row" href = "#"> &#9660; </a> 
			</th>
			
			<th> 
				<a class = "top_row" href = "journal_of_breakdowns.php?val=9"> &#9650; </a>
				<span class = "journal_header_table"> Номер цеха </span> 
				<a class = "botom_row" href = "journal_of_breakdowns.php?val=10"> &#9660; </a>
			</th>
			
			<th> 
				<a class = "top_row" href = "#"> &#9650; </a>
				<span class = "journal_header_table"> Название линии </span>
				<a class = "botom_row" href = "#"> &#9660; </a>
			</th>
			
			<th> 
				<a class = "top_row" href = "#"> &#9650; </a>
				<span class = "journal_header_table"> Вызов ФИО </span>
				<a class = "botom_row" href = "#"> &#9660; </a>
			</th>
			
			<th> 
				<a class = "top_row" href = "#"> &#9650; </a>
				<span class = "journal_header_table"> Время вызова </span> 
				<a class = "botom_row" href = "#"> &#9660; </a> 
			</th>
			
			<th> 
				<a class = "top_row" href = "#"> &#9650; </a>
				<span class = "journal_header_table"> Окончание работы </span> 
				<a class = "botom_row" href = "#"> &#9660; </a> 
			</th>
			
			<th> 
				<a class = "top_row" href = "#"> &#9650; </a>
				<span class = "journal_header_table"> Время ремонта </span> 
				<a class = "botom_row" href = "#"> &#9660; </a> 
			</th>
		
			<th>
				<a class = "top_row" href = "#"> &#9650; </a>
				<span class = "journal_header_table"> Причина вызова </span>
				<a class = "botom_row" href = "#"> &#9660; </a>
			</th>
			<th> 
				<a class = "top_row" href = "#"> &#9650; </a>
				<span class = "journal_header_table"> Устранение поломки </span> 
				<a class = "botom_row" href = "#"> &#9660; </a>
			</th>
			
			<th> 
				<a class = "top_row" href = "#"> &#9650; </a>
				<span class = "journal_header_table"> Используемые ТМЦ </span> 
				<a class = "botom_row" href = "#"> &#9660; </a>
			</th>
		</tr>
	
	<?php 
		if(!empty($_GET['change_id']) && ($_GET['change_id'] * 1) != 0 && 
						!isset($_GET['errors'])){
			// код для выборки из таблицы изменяемой строчки
			//require_once "/home/homeel/homeelectrical.ru/docs/engine/select_change_note_inc.php";
			require_once "engine/select_change_note_inc.php";
	?>
	</table>

	<form name = "change_note" method = "POST" 
				action = "/engine/change_note_inc.php?change_id=<?php echo $_GET['change_id'] ?>" 
				id = "form_change_note">			

		<p class = "textarea_change_note">
			
			<label for = "breakdown" class = "label_breakdown"> 
				Ошибка или причина поломки 
			</label> 
			<textarea cols = "45" rows = "10" wrap = "hard" name = "change_breakdown" 
								id ="breakdown" ><?php echo $breakdown; ?>
			</textarea> 
		</p>
		
		<!-- <p> <div id = "hidden_message"> </div> </p> -->
		
		<p class = "textarea_change_note">
			<label for = "removal_breakdown" class = "label_breakdown"> 
					Устранение поломки </label>
			<textarea cols = "45" rows = "10" wrap = "hard" 
								name = "change_removal_breakdown" 
								id = "removal_breakdown"><?php echo $removal_breakdown ?>
			</textarea>
		</p>
		
		<p class = "textarea_change_note">
			<label for = "removal_breakdown" class = "label_breakdown"> 
					Используемые ТМЦ </label>
			<textarea cols = "45" rows = "10" wrap = "hard" 
								name = "change_used_teh_mat_values" 
								id = "used_teh_mat_values"><?php echo $used_teh_mat_values ?>
			</textarea>
		</p>
	
			<input type = "submit" value = "Редактировать" name = "change_note_submit" id="change-note">
	</form>
	
<?php 
	}else{
		$errors_change_note = $_GET['errors'];
		echo "<span id = 'errors'> $errors_change_note </span>";
		//require_once "/home/homeel/homeelectrical.ru/docs/engine/select_change_note_inc.php";
		require_once "engine/select_change_note_inc.php";
	}	
?>

<body>
</html>