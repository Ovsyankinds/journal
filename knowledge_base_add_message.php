<?php	
	require_once "connectToDB.php";
	require_once "function.php";
	mysqli_query($link, "SET NAMES 'utf8'");
	$errors = "";
	
	if(isset($_POST['submit_add_message'])){
		$message_knowledge_base =  trim(strip_tags($_POST['message_knowledge_base']));				
		$name_machine = trim(strip_tags($_POST['name_machine']));
		$sername_engineer = trim(strip_tags($_POST['select_login_engineer']));
		$img_name = (string)date("Y-m-d_H-i-s") . "."; 
		$explode_img_type = explode('/', $_FILES['img_know_base']['type']);
		$img_type = $explode_img_type[1];
		$img_all_name = $img_name . $img_type;
		
		if(!empty($message_knowledge_base)){
					
			/*Код для работы с загрузкой картинки*/
			$uploaddir = '/xampp/htdocs/journalOfDuty/img_know_base/';
			if(empty($_FILES['img_know_base']['tmp_name'])){
				$dir_img_know_base = "Фото нет";
			}else{
				if(move_uploaded_file($_FILES['img_know_base']['tmp_name'], 
					$uploaddir . $img_all_name)){
					$dir_img_know_base = $img_all_name;
					$errors = "";
				
				}else{
					$dir_img_know_base = 0;
					$errors = "Не_удалось_загрузить_фото";	
				 }
			 }
						
			$query_add_message_knowledge_base = "INSERT INTO knowledge_base
					(name_machine, sername_engineer, message, img, date_add) 
					VALUES ('$name_machine', '$sername_engineer', 
							'$message_knowledge_base', '$dir_img_know_base',
					CURRENT_TIMESTAMP)";
			$result_mysql = mysqli_query($link, $query_add_message_knowledge_base)
					or die("Не удается выполнить вставку данных В БД " . 
					mysqli_error($link));
		}else{
			$text_errors = 'Пустое_поле_сообщения';
			$errors = $text_errors;	
		}
	}
	
	if(isset($_POST['submit_change_message'])){
		$change_message_knowledge_base =  trim(strip_tags($_POST['message_knowledge_base']));
		$id_change_note = $_POST['select_num_knowledge_note'];
		$name_machine = trim(strip_tags($_POST['name_machine']));
		$sername_engineer = trim(strip_tags($_POST['select_login_engineer']));
		
		if(!empty($change_message_knowledge_base)){
			$query_change_message_knowledge_base = "UPDATE knowledge_base SET 
				name_machine = '$name_machine', sername_engineer = '$sername_engineer', 
				message = '$change_message_knowledge_base' WHERE 
				id = '$id_change_note'";
					
			$result_mysql = mysqli_query($link, $query_change_message_knowledge_base)
				or die("Не удается выполнить вставку данных В БД " . mysqli_error($link));
		}else{
			$text_errors = 'Пустое_поле_сообщения';
			$errors = $text_errors;
		 }
	}
	
	if(isset($_POST['submit_delete_message'])){
		$id_delete_note = $_POST['select_num_knowledge_note'];
		$query_img_name = "SELECT img FROM knowledge_base WHERE 
							id = '$id_delete_note'";
		$result_mysql_img = mysqli_query($link, $query_img_name)
			or die("Не удается выполнить выборку данных из БД " . mysqli_error($link));
		
		if( mysqli_num_rows($result_mysql_img) ){ 	
			while($row = mysqli_fetch_array($result_mysql_img)){
				$img_name_DB = $row['img'];
			}
		}
		
		$query_delete_message_knowledge_base = "DELETE FROM knowledge_base
			WHERE id = '$id_delete_note'";
		$result_mysql = mysqli_query($link, $query_delete_message_knowledge_base)
			or die("Не удается выполнить удаление данных из БД " . mysqli_error($link));
		
		$delete_img_path = "img_know_base/" . $img_name_DB;
		unlink($delete_img_path);
	}
	
	if($errors){
		$knowledge_base_url = 'http://' . $_SERVER['HTTP_HOST'] . 
		dirname($_SERVER['PHP_SELF']) . "knowledge_base_view.php?errors=$errors";
		header('Location: ' . $knowledge_base_url);
		exit;
	}else{
		$knowledge_base_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . 
					"knowledge_base_view.php";
		header('Location: ' . $knowledge_base_url);
		exit;
	}
?>	
	