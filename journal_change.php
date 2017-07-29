<?php
	//require_once "/home/homeel/homeelectrical.ru/docs/engine/connectToDB.php";
	//require_once "/home/homeel/homeelectrical.ru/docs/engine/function.php";
	require_once "engine/connectToDB.php";
	require_once "engine/function.php";
	mysqli_query($link, "SET NAMES 'utf8'");		
?>


<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->

<head>
	<title> Изменение записи </title>
	<meta http-equiv="Content-Type" content="text/html; charset = utf-8" />
	<link rel = "stylesheet" href = "../css/journal_change.css" >
	<script src = "JS/js.js"> </script>
</head>


<body>

<?php
	if($_COOKIE['user_login'] === "Овсянкин"){
?>

<a href = "journal_of_breakdowns.php"> Журнал поломок </a>

<form name = "admin_add_change_journal" method = "POST" 
				action = "/engine/journal_change/jc_add_note_DB.php" 
					id = "admin_add_change_journal">
		
	<label for = "area_change"> Область изменения </label>
	<textarea name = "area_change" id = "area_change" >
	</textarea>
	
	<label for = "discription_change"> Описание изменения </label>
	<textarea name = "discription_change" id = "discription_change" >
	</textarea>
	
	<input type = "submit" name = "submit_change_journal" value = "Отправить" />
	
</form>
<?php 
	}	
	//require_once "/home/homeel/homeelectrical.ru/docs/engine/journal_change/jc_select_note_DB.php";
	require_once "engine/journal_change/jc_select_note_DB.php";
?>

<table id = "table_change">
	<tr> 
		<th> Дата изменения </th> <th> Область изменения </th>
		<th> Описане изменения </th> 
	</tr>
	<?php
		if($array_note_journal_change){
			while( $row = mysqli_fetch_array($array_note_journal_change) ){
				$id = $row['id'];
				$date_change = $row['date_change'];
				$area_change = $row['area_change'];
				$discription_change = $row['discription_change'];
	?>
	<tr> <td> <?php echo $date_change; ?> </td> <td> <?php echo $area_change; ?></td> 
	<td> <?php echo $discription_change; ?> </td> </tr>
<?php }
	}
?>
</table>

</body>
</html>


