<?php
	header("Content-type: text/html; charset = utf-8", true);
	require_once "engine/function.php";
	require_once "engine/connectToDB.php";
	
	if( ($_COOKIE['user_login']) ){
		if( isset($_COOKIE['id_status']) ){
			$id_status = $_COOKIE['id_status'];
		}

		switch ($id_status) {
			case 0:
				$generalUrl = "journal_of_breakdowns_electric.php";
				break;
			case 1:
				$generalUrl = "journal_of_breakdowns.php";
				break;
			default:
				$generalUrl = "journal_of_breakdowns.php";
				break;
		}

		$journal_of_breakdowns_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . $generalUrl;
		header('Location: ' . $journal_of_breakdowns_url);
	}
	
	if( $_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_COOKIE['user_login']) ){	
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title> Вход в журнал </title>
	<meta http-equiv="Content-Type" content="text/html; charset = utf-8" />
	<link rel = "stylesheet" href = "css/style.css">
</head>

<body>
	<form name = "login" method = "POST" action = "index.php" class="login" > 
		<p>
			<label for="login">Логин:</label>
			<input type="text" name="engineerLogin" id="login">
		</p>

		<p>
			<label for="password">Пароль:</label>
			<input type="password" name="engineerPassword" id="password">
		</p>

		<p class="login-submit">
			<button type="submit" class="login-button" name = "send"> Войти </button>
		</p>

		<p class="forgot-password"><a href = "registration.php"> Регистрация </a></p>
	</form>

	
<?php }

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$engineerLogin = login($_POST['engineerLogin'], $_POST['engineerPassword'], $_POST['send'], $link);			
	}	
?>


</body>
</html>

