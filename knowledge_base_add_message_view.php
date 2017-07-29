<?php
	require_once "connectToDB.php";
	require_once "function.php";
	mysqli_query($link, "SET NAMES 'utf8'");
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->

<head>
	<title> База знаний </title>
	<meta http-equiv="Content-Type" content="text/html; charset = utf-8" />
	<link rel = "stylesheet" href = "css/knowledge_base.css">
</head>

<body>


<form enctype="multipart/form-data" name = "knowledge" method = "POST" 
			action = "knowledge_base_add_message.php" id = "knowledge_form">
		<p>
			<label for = "name_machine"> Название линии </label>
			<?php name_machine($link) ?>
		</p>
		
		<p>
			<label for = "select_login_engineer"> Автор </label>
			<?php select_login_engineer($link) ?>
		</p>
		
		<p>
			<label for = "message_knowledge_base"> Текс сообщения </label>	
			<textarea cols = "45" rows = "10" wrap = "hard" name = "message_knowledge_base" 
				id = "message_knowledge_base">
			</textarea>
		</p>
		
		<input type = "hidden" name = "MAX_FILE_SIZE" value = "10000000">
		<input type = "file" name = "img_know_base" />
		<input type = "submit" name = "submit_add_message" value = "Добавить сообщение в базу" />
		
		<label id = "label_select_num_knowledge_note" for = "select_num_knowledge_note"> Номер записи для изменения или удаления </label>
		<?php 
			select_knowledge_base_change_delete($link);
		?>
		<input type = "submit" name = "submit_change_message" value = "Изменить запись" />
		<input type = "submit" name = "submit_delete_message" value = "Удалить запись из базы" />
		
	</form>
	
</body>
</html>