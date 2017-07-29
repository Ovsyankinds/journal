`<?php
	require_once "engine/connectToDB.php";
	require_once "engine/function.php";
	mysqli_query($link, "SET NAMES 'utf8'");
	
	// выбираем наименования линий из БД list_of_machines
	$array_list_machine = select_elem_from_DB($link, 'list_of_machines', 
																					'name_machine', 0,0,0,0,0,0,0,0,0,
																					0,0);
	
	// выбираем наименования линий из БД knowledge_base	
	$array_name_machine = select_elem_from_DB($link, 'knowledge_base', 
																					'name_machine', 0,0,0,0,0,0,0,0,0,
																					0,0);
	
	/* инициализация трех массивов: $array_one - для наполнения элементами с БД 
		knowledge_base наименование линий name_machine;
		$array_two - для наполнения элементами с БД list_of_machines наименование 
		линий name_machine
	*/
	$array_one = array();
	$array_two = array();
	$array_name_machine_date = array();
	$array_three = array();
	while($row = mysqli_fetch_array($array_name_machine)){
		$array_one[] = $row['name_machine'];
	}
	
	$arary_one_unique = array_unique($array_one);

	foreach($arary_one_unique as $item){
		$sql = "select date_add from knowledge_base 
					WHERE name_machine = '$item'
																		ORDER BY date_add DESC LIMIT 1";
		$array_name_machine_date[] = mysqli_query($link, $sql);
	}
	
	foreach($array_name_machine_date as $item){
		while($row = mysqli_fetch_array($item)){
			$array_three[] = $row['date_add'];
		}
	}
	
	while($row = mysqli_fetch_array($array_list_machine)){
		$array_two[] = $row['name_machine'];
	}
			
	$array_count_note = array();
	$array_date_machine = array();
	
	foreach($array_two as $item){
		$count_note = 0;
		foreach($array_one as $item_){
			if($item_ == $item){
				$count_note += 1;
				}
		}
		$array_count_note[] = $count_note;
	}
	
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->

<head>
	<title> База знаний </title>
	<meta http-equiv="Content-Type" content="text/html; charset = utf-8" />
	<link rel = "stylesheet" href = "css/knowledge_base.css">
</head>

<body>
	<div id = "header_knowledge_base">
		<h1> База знаний </h1>
		<a id = "back_to_general" href = "general.php"> Назад на главную </a>
		<a id = "back_to_general" href = "\knowledge_base_add_message_view.php"> 
			Добавить запись </a>
	</div>
	
	<div id = "menu_select_number_workshop">
		<ul>
			<li onclick = "show_hiden_menu(this)"> Цех №1 </li> 
			<li onclick = "show_hiden_menu(this)"> Цех №2 </li> 
			<li onclick = "show_hiden_menu(this)"> Цех №3 </li>
		</ul>
	</div>
		
	<?php // код для выборки из БД наименований машин и распределение их по 
				// трем массивам $array_workshop_1, $array_workshop_2, $array_workshop_3
		$array_list_machine = select_elem_from_DB($link, 'list_of_machines', 
												'name_machine', 'number_workshop',0,0,0,0,0,0,0,0,0,0);
		
		$array_workshop_1 = array();
		$array_workshop_2 = array();
		$array_workshop_3 = array();
		while($row = mysqli_fetch_array($array_list_machine)){				
				switch($row['number_workshop']){
					case 1:
							$array_workshop_1[] = $row['name_machine'];
							break;
					case 2:
							$array_workshop_2[] = $row['name_machine'];
							break;
					case 3:
							$array_workshop_3[] = $row['name_machine'];
							break;
				}

		}
		
	?>
	
	<div id = "wrap_ul_name_machine">
		<ul id = "ul_name_machine_1">
			<li> Линии цеха №1 </li>
			<li> 
				<?php 
					
					$i = 0;
					foreach($array_workshop_1 as $item){
						echo "<ul class = 'ul_machine_option'> 
									<li> 
										<a href = '?nameLine=$item'> $item </a> 
									</li>";
									
								echo "<li>
												Последняя запись добавлена $array_three[$i]
											</li>
											<li>
												Количество записей ($array_count_note[$i])
											</li>";
							++$i;						
						echo "</ul>";
					}
				?> 
			</li>
		</ul>
		
		<ul id = "ul_name_machine_2">
			<li> Линии цеха №2 </li>
			<li> 
				<?php 
					foreach($array_workshop_2 as $item){
						echo "<ul class = 'ul_machine_option'> 
										<li> 
											<a href = '#'> $item </a> 
										</li>
										<li>
											Последняя запись добавлена
										</li>
										<li>
											Количество записей
										</li>
									</ul>";
					}
				?> 
			</li>
		</ul>
		
		<ul id = "ul_name_machine_3">
			<li> Линии цеха №3 </li>
			<li> 
				<?php 
					foreach($array_workshop_3 as $item){
						echo "<ul class = 'ul_machine_option'> 
										<li> 
											<a href = '#'> $item </a> 
										</li>
										<li>
											Последняя запись добавлена
										</li>
										<li>
											Количество записей
										</li>
									</ul>";
					}
				?> 
			</li>
		</ul>
	</div>	
		
	<script>
		var ul_name_machine_1 = document.getElementById('ul_name_machine_1');
		var ul_name_machine_2 = document.getElementById('ul_name_machine_2');
		var ul_name_machine_3 = document.getElementById('ul_name_machine_3');
		
		function show_hiden_menu(li){
			var li_value = li.innerHTML;
			//var li = num_workshop.childNodes[1].childNodes[1];
			//var previous_li = li.previousSibling;
			//var next_li = li.nextSibling;
			//alert(li_value.indexOf('1'));
			if(li_value.indexOf('2') == 6){	
				ul_name_machine_1.style.display = "none";
				ul_name_machine_3.style.display = "none";
				ul_name_machine_2.style.display = "block";			
			}
			
			if(li_value.indexOf('3') == 6){
				ul_name_machine_1.style.display = "none";
				ul_name_machine_2.style.display = "none";
				ul_name_machine_3.style.display = "block";
			}
			
			if(li_value.indexOf('1') == 6){
				ul_name_machine_2.style.display = "none";
				ul_name_machine_3.style.display = "none";
				ul_name_machine_1.style.display = "block";
			}
		}
	</script>
	
	<?php
		
		//print_r($result_array_name_machine);
		if($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['nameLine'])){
			$param = $_GET['nameLine'];
			select_knowledge_base($link, $param);
		}
	?>
		
	<div id = "error"> 
		<span>
			<?php
				if(isset($_GET['errors']) && 
					($_GET['errors'] === "Пустое_поле_сообщения" || 
						$_GET['errors'] === "Не_удалось_загрузить_фото" )){
					
					$msg_errors = trim(strip_tags($_GET['errors']));
					switch($msg_errors){
						case "Пустое_поле_сообщения":
							echo "Пустое поле сообщения";
							break;
						
						case "Не_удалось_загрузить_фото":
							echo "Не удалось загрузить фото";
							break;
					}
				}else{
					$_GET['errors'] = 0;
				}
			?>
		</span>
	</div>
			
	<script>
		
		function img_size(img){
			var style_img_width = getComputedStyle(img);
			if(img.className == 'img'){
				img.className = 'img_open';
				return;
			}
			
			if(img.className == 'img_open'){
				img.className = 'img';
				return;
			}
		}
	
	</script>
	
</body>
</html>