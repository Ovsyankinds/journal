<?php
	require_once "engine/connectToDB.php";
	require_once "engine/function.php";
	//require_once '/home/homeel/homeelectrical.ru/docs/engine/connectToDB.php';
	//require_once 'engine/connectToDB.php';
	
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
	<link rel = "stylesheet" href = "css/general.css">
</head>

<body>
	<?php
		$engineerLogin = $_COOKIE['user_login']; 
		echo "<div id = 'headerUserName'> Вы зашли как " . $engineerLogin . " " . "<a href = 'logout.php'> Выход </a>" . "</div>";
	?>
	
	<div id = "topMenu">
		<ul>
			<li>
				<a href = "journal_of_breakdowns.php" class = "topMenuContent"> Журнал поломок для электронщиков</a>
			</li>

			<li>
				<a href = "journal_of_breakdowns_electric.php" class = "topMenuContent"> Журнал поломок для электриков</a>
			</li>
			
			<li>
				<a href = "ticket_system_view.php" class = "topMenuContent"> Система тикетов </a>
			</li>
			
			<li>
				<a href = "knowledge_base_view.php" class = "topMenuContent"> База знаний </a>
			</li>
			
			<li>
				<a href = "request.php" class = "topMenuContent"> Заявки </a>
			</li>
			<li>
				<a href = 'journal_change.php'> Изменения </a>
			</li>
		</ul>
	</div>

	<?php
		$array_name_mashine_as_workshop = sort_name_machine_as_workshop($link);
		$count = count($array_name_mashine_as_workshop['name_machine']);
		/*echo '<pre>';
		print_r($array_name_mashine_as_workshop);
		echo '</pre>';*/

		/*$a = count_line_troubleshooting($link, 'TTX-320');
		echo $a;*/

		/*foreach($array_name_mashine_as_workshop['name_machine'] as $row_1){
						echo $row_1 . '</br>';				}  

		foreach($array_name_mashine_as_workshop['number_workshop'] as $row_2){
					echo $row_2 . '</br>';
				
		}*/
	?>

	<div id = "existingLine">
		<table border = "1">
			<tr> <th> Порядковый номер линии </th> <th> Название линии </th> <th> Номер цеха </th> <th> Кол-во записей </th> </tr>
<?php
$j = 1;
for($i = 0; $i < $count; $i++){
$array_name_mashine = $array_name_mashine_as_workshop['name_machine'][$i];
echo <<<AAA
	<tr>
	<td> $j </td>
	<td> 
	<a href = "machine_line.php?name_machine=$array_name_mashine">
	  $array_name_mashine 
	 </a> 
	 </td>
		<td>  {$array_name_mashine_as_workshop['number_workshop'][$i]}  </td>
		<td>  {$array_name_mashine_as_workshop['count_line'][$i]}  </td>
	</tr> 
AAA;
$j++;
}

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