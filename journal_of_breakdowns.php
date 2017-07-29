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
	<link rel = "stylesheet" href = "css/journal_of_breakdowns.css">
	<link rel="stylesheet" type="text/css" href="/JS/jquery.datetimepicker.css" />
</head>

<body>

	<?php
		require_once "header.php"; //надпись журнала
		//require_once "/home/homeel/homeelectrical.ru/docs/header.php";
	?>
	
		<a href = "journal_change.php"> Изменения в журнале </a>
	
	<?php
		require_once "engineer_job.php"; //код для добавленя надписей по заданиям
		//require_once "/home/homeel/homeelectrical.ru/docs/engineer_job.php";
		
		require_once "table.php"; // код для вывода таблицы журнала
		//require_once "/home/homeel/homeelectrical.ru/docs/table.php";
		
		require_once "form_select_note.php"; //код для формы выбора числа записей
											//таблицы по разным параметрам
		//require_once "/home/homeel/homeelectrical.ru/docs/form_select_note.php";
		
		require_once "menu.php"; // код меню (назад на главную, распечатать 
								// журнал)
		//require_once "/home/homeel/homeelectrical.ru/docs/menu.php";
		
		require_once "form_input_note.php"; //код для добавления записей в
											//таблицу
		//require_once "/home/homeel/homeelectrical.ru/docs/form_input_note.php";
		
		require_once "delete_note.php"; //код для удаления запсей из таблицы
		//require_once "/home/homeel/homeelectrical.ru/docs/delete_note.php";
	?>
	
	<script src = "/JS/js.js"></script>
		
</body>
</html>

<?php 
	}else{
		echo "Вы не зашли";
	}
?>