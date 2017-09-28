<?php
	require_once "../engine/connectToDB.php";
	require_once "../engine/function.php";
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
						<span> Вода, цех №№1,2 </span>
					</th>

					<th>
						<span> Вода, УУ-А </span>
					</th>

					<th>
						<span> Вода, УУ-В </span>
					</th>

					<th>
						<span> Вода, топочная </span>
					</th>

					<th>
						<span> Вода, подпитка цех №№1,2 </span>
					</th>

					<th>
						<span> Вода, градирня цех №3 </span> 
					</th>

					<th>
						<span> Вода, бойлерная цех №3 </span>
					</th>

					<th>
						<span> ГАЗ, цех №№1,2 </span>
					</th>

					<th>
						<span>ГАЗ, топочная цех №№1,2 </span>
					</th>
					
					<th>
						<span> Изменение записи </span>
					</th>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>
<?}?>
