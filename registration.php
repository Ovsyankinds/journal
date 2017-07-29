<?php
	require_once "engine/connectToDB.php";
	mysqli_query($link, "SET NAMES 'utf8'");
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title> Регистрация нового пользователя </title>
	<meta http-equiv="Content-Type" content="text/html; charset = utf-8" />
	<link rel = 'stylesheet' href = 'css/registration.css'>
</head>

<body>
	<form name = "registration" method = "POST" action = "registration.php" class = "login" > 
		<p>
			<label for="login">Логин:</label>
			<input type="text" name="engineerLogin" id="login">
		</p>

		<p>
			<label for="position">Должность:</label>
			<input type="text" name="position" id="position">
		</p>

		<p>
			<label for="password">Пароль:</label>
			<input type="password" name="engineerPassword" id="password">
		</p>
		
		<p>
			<label for="password"> Повторите пароль:</label>
			<input type="password" name="repeat_engineer_password" id="password">
		</p>
		
		<p>
			<label for="sername">Фамилия:</label>
			<input type="text" name="engineerSername" id="sername">
		</p>
		
		<p>
			<label for="name">Имя:</label>
			<input type="text" name="engineerName" id="name">
		</p>
		
		<p>
			<label for="patronymic">Отчество:</label>
			<input type="text" name="engineerPatronymic" id="patronymic">
		</p>

		<p class="registration-submit">
			<button type="submit" class="registration-button" name = "send"> Зарегистрироваться </button>
		</p>
		
	</form>
	
<?php
	}
	
	if( isset($_POST['send']) ){
		$engineerLogin = trim(strip_tags($_POST['engineerLogin']));
		$position = trim(strip_tags($_POST['position']));
		$engineerPassword = trim(strip_tags($_POST['engineerPassword']));
		$repeat_engineer_password = trim(strip_tags($_POST['repeat_engineer_password']));
		$engineerSername = trim(strip_tags($_POST['engineerSername']));
		$engineerName = trim(strip_tags($_POST['engineerName']));
		$engineerPatronymic = trim(strip_tags($_POST['engineerPatronymic']));
		
		if($engineerPassword === $repeat_engineer_password && !empty($engineerPassword)){
			$query_check_login = "SELECT login FROM registered_users WHERE login = '$engineerLogin'";
			$result_check_login = mysqli_query($link, $query_check_login)
				or die("Не удается выполнить запрос 0 |||" . mysqli_error($link));
			
			if(mysqli_num_rows($result_check_login) == 1){
				echo "Такой логин уже существует, введите другой";
				exit;
			}
			else{
				$query = "INSERT INTO registered_users (login, position, sername, name, patronymic, password, user_color, id_status) 
							VALUE ('$engineerLogin', '$position', '$engineerSername', '$engineerName', 
							'$engineerPatronymic', '$engineerPassword', 'ffffff', '0')";
				$query_insert_new_user = mysqli_query($link, $query)
				or die("Не удается выполнить запрос 1 |||" . mysqli_error($link));

				echo "Новый пользователь $engineerLogin создан </br>";
				echo "Вернитесь на главную, чтобы войти под своим логином <a href = 'index.php'> На главную </a>"; 
			}
		}
		else{
			echo "Пароли не совпадают";
		}
		
		//header('Location: /general.php');
	}
?>
	
	
	
</body>
</html>
