<?php
	require_once "engine/connectToDB.php";
	require_once "engine/function.php";
	mysqli_query($link, "SET NAMES 'utf8'");
	
	$array_name_machines_first_workshop = array('Медная волочилка','TTX-320', 'EvroDraw', 'ЭнергоМаш', 'Mario Frigerio', 'Сигара Quiens', 
									'Планетарка Quiens', 'ВНИИКПМАШ','ЛПП-12', 'Протон', 'Фонарка Cortinovis','Сигара Cortinovis',
									'Кран балка 5Т', 'Компрессор Atlas Copco 1', 'Компрессор EKO-75', 'Компрессор Atlas Copco 2');
	
	$array_name_machines_second_workshop = array('Лентообмотчик HeFei', 'Лентообмотчик Cortinovis', 'EEl-40', 'Испытательные поля', 
												'EEL-60', 'Drum Twister Cortinovis', 'Drum Twister Китай', 'Ванна сшивки', 
												'Кран балка 5Т', 'Кран балка 10Т', 'Ворота №3' );
												
	$array_name_machines_third_workshop = array('Бугельная Cortinovis', 'Caballe', 'Rosendahl', 'Mario Frigerio', 'Сигара HeFei',
												'Ванна сшивки', 'Кран балка 5Т эм-кат','Кран балка 5Т', 'Компрессор Atlas Copco 1', 
												'Печь отжига');
												
	$array_name_machines_for_workshop = array('РМЦ');
	
	
	foreach($array_name_machines_first_workshop as $name_machines_first_workshop){
		$query_add_name_machine_first_workshop = "INSERT INTO list_of_machines (name_machine, number_workshop) 
													VALUES ('$name_machines_first_workshop', '1')";
		$result_query = mysqli_query($link, $query_add_name_machine_first_workshop)
			or die("Не удается выполнить запрос  |||" . mysqli_error($link));
	}
	
	foreach($array_name_machines_second_workshop as $name_machines_second_workshop){
		$query_add_name_machines_second_workshop = "INSERT INTO list_of_machines (name_machine, number_workshop) 
														VALUES ('$name_machines_second_workshop', '2')";
		$result_query = mysqli_query($link, $query_add_name_machines_second_workshop)
			or die("Не удается выполнить запрос  |||" . mysqli_error($link));
	}
	
	foreach($array_name_machines_third_workshop as $name_machines_third_workshop){
		$query_add_name_machines_third_workshop = "INSERT INTO list_of_machines (name_machine, number_workshop) 
														VALUES ('$name_machines_third_workshop', '3')";
		$result_query = mysqli_query($link, $query_add_name_machines_third_workshop)
			or die("Не удается выполнить запрос  |||" . mysqli_error($link));
	}
	
	foreach($array_name_machines_for_workshop as $name_machines_for_workshop){
		
		$query_add_name_machines_for_workshop = "INSERT INTO list_of_machines (name_machine, number_workshop) 
														VALUES ('$name_machines_for_workshop', '4')";
		$result_query = mysqli_query($link, $query_add_name_machines_for_workshop)
			or die("Не удается выполнить запрос  |||" . mysqli_error($link));

	}
	
?>