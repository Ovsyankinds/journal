<?php
	require_once "engine/connectToDB.php";
	require_once "engine/function.php";
	//require_once '/home/homeel/homeelectrical.ru/docs/engine/connectToDB.php';
	//require_once 'engine/connectToDB.php';
	
	mysqli_query($link, "SET NAMES 'utf8'");
	if(!empty($_COOKIE['user_login'])){
		$array_name_mashine_as_workshop_1 = sort_name_machine_as_workshop($link, 1);
		$array_name_mashine_as_workshop_2 = sort_name_machine_as_workshop($link, 2);
		$array_name_mashine_as_workshop_3 = sort_name_machine_as_workshop($link, 3);
		
		//print_r($array_name_mashine_as_workshop_3);

		$count_1 = count($array_name_mashine_as_workshop_1);
		$count_2 = count($array_name_mashine_as_workshop_2);
		$count_3 = count($array_name_mashine_as_workshop_3);

		if(!empty($_GET['name_machine'])){
			$name_machine = $_GET['name_machine'];
		}
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->

<head>
	<title> Главная страница журнала </title>
	<meta http-equiv="Content-Type" content="text/html; charset = utf-8" />
	<link rel = "stylesheet" href = "css/general.css">
	<link rel = "stylesheet" href = "css/monitor_breakdowns.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
		    <ul class="nav navbar-nav">
				<li class="active"><a href="/general.php">На главную</a></li>
			 	<li class="dropdown">
        			<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Цех №1 <span class="caret"></span></a>
        			<ul class="dropdown-menu">
         		
<?php

for($i = 0; $i < $count_1; $i++){

$array_name_mashine_1 = $array_name_mashine_as_workshop_1[$i];
echo <<<BBB
	<li>
		<a href="machine_line.php?name_machine=$array_name_mashine_1">
			$array_name_mashine_1
		</a>
	</li>
BBB;
}

?>
		        	</ul>
      			</li>

      			<li class="dropdown">
        			<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Цех №2 <span class="caret"></span></a>
        			<ul class="dropdown-menu">
         		
<?php

for($j = 0; $j < $count_2; $j++){

$array_name_mashine_2 = $array_name_mashine_as_workshop_2[$j];
echo <<<BBB
	<li>
		<a href="machine_line.php?name_machine=$array_name_mashine_2">
			$array_name_mashine_2
		</a>
	</li>
BBB;
}

?>
		        	</ul>
      			</li>

    			<li class="dropdown">
        			<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Цех №3 <span class="caret"></span></a>
        			<ul class="dropdown-menu">
         		
<?php

for($c = 0; $c < $count_3; $c++){
$array_name_mashine_3 = $array_name_mashine_as_workshop_3[$c];
echo <<<BBB
	<li>
		<a href="machine_line.php?name_machine=$array_name_mashine_3">
			$array_name_mashine_3
		</a>
	</li>
BBB;
}

?>
		        	</ul>
      			</li>			
		    </ul>
	  </div>
	</nav>
  
<div class="container">
	<span> Карта линии <?=$name_machine; ?>  </span>
	<table id = "table_monitor_breakdowns">

	<?php
		note_of_journal($link, 0, 0, 0, 0, 0, 0, $name_machine);
	?>
	</table>
</div>

</body>
</html>
<?php
	}else{
		echo "Вы не зашли";
	}
?>