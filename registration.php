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
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/registration.css" rel="stylesheet">
</head>

<body>
	
	<div class="row justify-content-center">
		<div class="col-md-4">
			<h1 class="header-text"> Форма регистрации </h1>
		</div>
	</div>
	<form name = "registration" method = "POST" action = "registration.php" class = "form-horizontal" > 
		<div class="container">
			<div class="form-group row text-right justify-content-center">
				<label for="login" class="col-md-2 col-form-label registration-label">Логин:</label>
				<div class="col-md-5">
					<input type="text" name="engineerLogin" class="form-control" id="login" placeholder="Введите Ваш логин" />
				</div>
			</div>
			<div class="form-group row justify-content-center">
				<label for="registration-position-engineer" 
										class="col-md-2 col-form-label  text-right registration-label">Должность:</label>
				<div class="col-md-5 position">
					<div class="form-check form-check-inline">
						<label class="form-check-label">
						  <input type="radio" name="position"
						  			 id="registration-position-engineer" value="engineer"> инженер ЭТ
						</label>
					</div>

					<div class="form-check form-check-inline">
						<label class="radio-inline">
						  <input type="radio" name="position" 
						  			 id="registration-position-electric" value="electric"> электрик
						</label>
					</div>

					<div class="form-check form-check-inline">
						<label class="radio-inline">
						  <input type="radio" name="position"
						  			 id="registration-position-technologist" value="technologist"> технолог
						  <input type="hidden" name="idStatus" value="2">
						</label>
					</div>

					<div class="form-check form-check-inline">
						<label class="radio-inline">
						  <input type="radio" name="position" 
						  			 id="registration-position-chief" value="chief"> начальник
						  <input type="hidden" name="idStatus" value="3">
						</label>
					</div>
				</div>
			</div>
			<div class="form-group row text-right justify-content-center">
				<label for="password" class="col-md-2 col-form-label registration-label">Пароль:</label>
				<div class="col-md-5">
					<input type="password" name="engineerPassword" class="form-control" id="password" placeholder="Введите Ваш пароль">
 				</div>
			</div>
 			<div class="form-group row justify-content-center">	
				<label for="repeat-password" 
								class="col-md-2 col-form-label registration-label"> Повторите пароль:</label>
				<div class="col-md-5">
					<input type="password" name="repeat_engineer_password" class="form-control" id="repeat-password" placeholder="Повторите Ваш пароль">
				</div>
			</div>
			<div class="form-group row text-right justify-content-center">
				<label for="sername" class="col-md-2 col-form-label registration-label">Фамилия:</label>
				<div class="col-md-5">
					<input type="text" name="engineerSername" class="form-control" id="sername" placeholder="Введите Вашу фамилию">
				</div>
			</div>
			<div class="form-group row text-right justify-content-center">
				<label for="name" class="col-md-2 col-form-label registration-label">Имя:</label>
				<div class="col-md-5">
					<input type="text" name="engineerName" class="form-control" id="name" placeholder="Введите Ваше имя">
				</div>
			</div>
			<div class="form-group row text-right justify-content-center">
				<label for="patronymic" class="col-md-2 col-form-label registration-label">Отчество:</label>
				<div class="col-md-5">
					<input type="text" name="engineerPatronymic" class="form-control" id="patronymic" placeholder="Введите Ваше отчество">
				</div>
			</div>
			<div class="form-group row justify-content-center">
				<div class="col-md-3">
					<button type="submit" class="btn btn-primary" name = "send"> Зарегистрироваться </button>
				</div>
			</div>
		</div>
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
		switch($position){
			case "electric":
				$idStatus = 0;
				break;

			case "engineer":
				$idStatus = 1;
				break;

			case "technologist":
				$idStatus = 2;
				break;

			case "chief":
				$idStatus = 3;
				break;

			default:
				$idStatus = 00;
		}
		
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
							'$engineerPatronymic', '$engineerPassword', 'ffffff', '$idStatus')";
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
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/js/bootstrap.min.js"></script>
	
</body>
</html>
