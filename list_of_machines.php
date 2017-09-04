<?php
	require_once "engine/connectToDB.php";
	require_once "engine/function.php";
	mysqli_query($link, "SET NAMES 'utf8'");
	
	$array_name_machines_first_workshop = array('Медная волочилка','TTX-320', 'Mario Frigerio', 
																							'EvroDraw', 'ЭнергоМаш', 'Сигара Quiens', 
																							'Планетарка Quiens', 'ВНИИКПМАШ','ЛПП-12', 'Медная волочилка II', 
																							'Протон', 'Фонарка Cortinovis', 'Сигара Cortinovis',
																							'Кран балка 5Т', 'Компрессор Atlas Copco 1', 
																							'Компрессор EKO-75', 'Компрессор Atlas Copco 2', 
																							'Градирня №1');
	
	$array_name_machines_second_workshop = array('Лентообмотчик HeFei', 'Лентообмотчик Cortinovis', 
																								'EEl-40', 'Испытательные поля', 
																								'EEL-60', 'Drum Twister Cortinovis', 'Drum Twister Китай', 
																								'Ванна сшивки', 'Кран балка 5Т', 'Кран балка 10Т', 
																								'Ворота №3', 'Промежуточный бак' );
												
	$array_name_machines_third_workshop = array('Бугельная Cortinovis', 'Caballe', 'Rosendahl', 
																							'Mario Frigerio', 'Сигара HeFei', 'Ванна сшивки', 
																							'Кран балка 5Т эм-кат','Кран балка 5Т', 
																							'Компрессор Atlas Copco 1', 'Печь отжига', 
																							'Градирня №2', 'Промежуточный бак', 'Пресс MF', 'ЛПП-19', 
																							'Испытательные поля №2');
												
	$array_name_machines_for_workshop = array('РМЦ', "Общее", "ОТК");

	$array_name_machines_five_workshop = array("Бронерезка", "Перемотка 1 (около бронерезки)", "Перемотка 2",
																							'Общее');

	$array_name_machines_seven_workshop = array("Ошланговка", "Протон", "Экранировка", "Наклонка", 
																							"Градирня №3", "Промежуточный бак", 'Кран-балка №1', 
																							'Кран-балка №2', 'Испытательные поля №3', 'Общее');
	
	
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

		foreach($array_name_machines_five_workshop as $name_machines_for_workshop){
		
		$query_add_name_machines_for_workshop = "INSERT INTO list_of_machines (name_machine, number_workshop) 
														VALUES ('$name_machines_for_workshop', '5')";
		$result_query = mysqli_query($link, $query_add_name_machines_for_workshop)
			or die("Не удается выполнить запрос  |||" . mysqli_error($link));

	}

		foreach($array_name_machines_seven_workshop as $name_machines_for_workshop){
		
		$query_add_name_machines_for_workshop = "INSERT INTO list_of_machines (name_machine, number_workshop) 
														VALUES ('$name_machines_for_workshop', '7')";
		$result_query = mysqli_query($link, $query_add_name_machines_for_workshop)
			or die("Не удается выполнить запрос  |||" . mysqli_error($link));

	}
	
?>