<style>
	#calendar{
		width: 390px;
		border: 1px solid green;
		margin: 10px auto;
	}

	#calendar ul{
		margin: 10px 10px;
		list-style: none
		/*border: 1px solid blue;*/
	}

	#calendar ul li{
		width: 25px;
		margin: 5px 5px;
		padding: 5px 5px;
		border: 1px solid red;
		float: left;
	}
</style>

<?php
	
	/*
	 ** Массив $array_for_engineer используется как хранение данных о фамилии и о дате начала смены инженера
	 ** функция selectEngineer() формирует выпадающий список для выбора электронщика по фамилии
	 ** после отправки формы, приходит ответ в виде даты начала смены инженера
	 ** эту дату необходимо использовать для формирования начальной даты для календаря смен данного инженера
	 ** также в селекте передается фамилия инженера
	*/
	$array_for_engineer = array(
									array(
											'name_engineer' => 'Ovsyankin',
											'start_date_shift' => '2017-02-01'
										 ), 

									array(
											'name_engineer' => 'Kasatkin',
											'start_date_shift' => '2017-02-02'
										 ), 

									array(
											'name_engineer' => 'Zheleznov',
											'start_date_shift' => '2017-02-03'
										 ), 

									array(
											'name_engineer' => 'Kasimov',
											'start_date_shift' => '2017-02-04'
										 ), 

									array(
											'name_engineer' => 'Suvaev',
											'start_date_shift' => '2017-02-05'
										 )
								);

	/*echo '<pre>';
	print_r($array_for_engineer);
	echo '</pre>';*/

	function selectEngineer($array_for_engineer){
		echo '<select name = "engineer">';
			foreach ($array_for_engineer as $value) {
				foreach ($value as $key => $val) {
					if($key === 'name_engineer'){
						$name_engineer = $val;
					}
					if($key === 'start_date_shift'){
						$start_date_shift = $val;
					}
				}
				echo "<option value = '$name_engineer/$start_date_shift'>" . $name_engineer . '</option>';
			}
		echo '</select>';
	}

	function selectMonthRender(){
		$todayDay = getdate(mktime(0, 0, 0, 12, 1, 2017));
		echo '<select name = "month">';
			for($i = 1; $i <= $todayDay['mon']; $i++){
				$todayDay1 = getdate(mktime(0, 0, 0, $i, 1, 2017));
				$realMonth = $todayDay1['mon'];
				echo "<option value = '$realMonth'>" . $todayDay1['month'] . '</option>';
			}
		echo '</select>';
	}

	function selectYearRender($count){
		$todayDay = getdate(mktime(0, 0, 0, 1, 1, 2017));
		$todayYear = (int)$todayDay['year'];
		echo '<select name = "year">';
			for($i = 1; $i <= $count; $i++){
				echo "<option value = '$todayYear'>" . $todayYear . '</option>';
				++$todayYear;
			}
		echo '</select>';
	}

	function calendarRender($realMonth, $realYear){
										//month, day, year
		$targetMonth = 	   mktime(0, 0, 0, (int)$realMonth, 1, (int)$realYear);
		$previosMonth =    mktime(0, 0, 0, (int)$realMonth + 1, 1, (int)$realYear);
		//echo date('Y:M:d  D', $targetMonth) . "</br>";
		//echo date('Y:M:d  D', $previosMonth) . "</br>";
		$getDateTargetMonth = getdate($targetMonth);
		$getDateTargetMonth = (int)	$getDateTargetMonth['wday'];
		//echo $getDateTargetMonth . "</br>";
		$getDatePreviosMonth = getdate($previosMonth);
		$lastDay = $previosMonth - (60*60*24);
		//echo date('Y:M:d  D', $lastDay) . "</br>";
		$monthEnd = getdate($lastDay);
		$count = $monthEnd['mday'];
		echo $monthEnd['month'];

		echo '<ul>
				<li>Пн</li> <li>Вт</li> <li>Ср</li> <li>Чт</li> <li>Пт</li> <li>Сб</li> <li>Вс</li>
			</ul> <ul>';

		if($getDateTargetMonth === 0){
			echo '<li></li><li></li><li></li><li></li><li></li><li></li>';
		}
		
		for($j = 1; $j < $getDateTargetMonth; $j++){
				echo '<li></li>';
		}

		$point = 2;
		$select = 7;

		for($i = 1; $i <= $count; $i++){

			if($i === $point){
				echo '<li style="background-color: red">' . $i . 'Д' . '</li>';
			}

			elseif($i === $point + 1){
				echo '<li style="background-color: red">' . $i . 'Д' . '</li>';
				$point += $select + 1;
			}

			else{
				echo '<li>' . $i . '</li>'; 
			}

			if(!($i % 7)){
				echo '</ul>';
				echo '</br>';
				echo '<ul>';

			}
		}
	}
?>

<h1> Календарь дежурств </h1>

<div id = "calendar">

	<form action = "" method = "POST">
		<?php
			selectEngineer($array_for_engineer);
			echo "</br>";
			selectMonthRender();
			selectYearRender(5);
		?>
		<input type = "submit" name = "submitCalendar" />
	</form>

	<?php
		if(isset($_POST['submitCalendar']) && isset($_POST['month']) && isset($_POST['year'])):
			calendarRender($_POST['month'], $_POST['year']);
	?>

	<p> Дата начала <?=$_POST['engineer']; endif;?> </p>
</div>
