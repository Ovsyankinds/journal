<?
	require_once "../engine/connectToDB.php";
	require_once "../engine/function.php";

	if( isset($_POST["submit_value_instrument_readings"]) ){
		$array = array();

		$value_water_workshop_1_2 = $_POST["value_water_workshop_1_2"];
		$value_water_uua = $_POST["value_water_uua"];
		$value_water_uub = $_POST["value_water_uub"];
		$value_water_topochnaya = $_POST["value_water_topochnaya"];
		$value_water_podpitka_1_2 = $_POST["value_water_podpitka_1_2"];
		$value_water_gradirnya_3 = $_POST["value_water_gradirnya_3"];
		$value_water_boylernaya_3 =  $_POST["value_water_boylernaya_3"];
		$value_gaz_1_2 = $_POST["value_gaz_1_2"];
		$value_gaz_topochnaya_1_2 = $_POST["value_gaz_topochnaya_1_2"];


		array_push($array, $value_water_workshop_1_2, $value_water_uua, $value_water_uub,
												$value_water_topochnaya, $value_water_podpitka_1_2, $value_water_gradirnya_3,
												$value_water_boylernaya_3, $value_gaz_1_2, $value_gaz_topochnaya_1_2);
		//print_r($array);
		$result = check_value_instrument_readings($array); //проверили пришедшие данные
		//print_r($result);

		list($value_water_workshop_1_2, $value_water_uua, $value_water_uub, $value_water_topochnaya,
					$value_water_podpitka_1_2, $value_water_gradirnya_3, $value_water_boylernaya_3, 
					$value_gaz_1_2, $value_gaz_topochnaya_1_2) = $result;
	}else{
		echo "Не заполнили поля";
	}
		
		//делаем запрос значений для прибавления на введенное значение
		$querySelectValueInstrumentReadings = "SELECT value_water_workshop_1_2, value_water_workshop_1_2_sum, value_water_uua, value_water_uub, value_water_topochnaya, value_water_podpitka_1_2, value_water_gradirnya_3, value_water_boylernaya_3, value_gaz_1_2, value_gaz_topochnaya_1_2 FROM instrument_readings ORDER BY id DESC LIMIT 1";

		$resultQuerySelectValueInstrumentReadings = mysqli_query($link, $querySelectValueInstrumentReadings) 
				or die("Не удается выполнить запрос |||" . mysqli_error($link));

		while( $row = mysqli_fetch_array($resultQuerySelectValueInstrumentReadings) ){
			$value_water_workshop_1_2 += $row['value_water_workshop_1_2_sum'];

			if($row['value_water_workshop_1_2_sum'] === 0){
				$value_water_workshop_1_2_sum = 0;
			}else{
				$value_water_workshop_1_2_sum = $row['value_water_workshop_1_2_sum'];
			}
			$value_water_uua += $row['value_water_uua'];
			$value_water_uub += $row['value_water_uub'];
			$value_water_topochnaya += $row['value_water_topochnaya'];
			$value_water_podpitka_1_2 += $row['value_water_podpitka_1_2'];
			$value_water_gradirnya_3 += $row['value_water_gradirnya_3'];
			$value_water_boylernaya_3 += $row['value_water_boylernaya_3'];
			$value_gaz_1_2 += $row['value_gaz_1_2'];
			$value_gaz_topochnaya_1_2 += $row['value_gaz_topochnaya_1_2'];
		}

		//echo $value_water_workshop_1_2_sum;

		$query_add_value_instrument_readings = "INSERT INTO instrument_readings (data,
													value_water_workshop_1_2, value_water_workshop_1_2_sum, value_water_uua, value_water_uub, value_water_topochnaya, value_water_podpitka_1_2, value_water_gradirnya_3,
													value_water_boylernaya_3, value_gaz_1_2, value_gaz_topochnaya_1_2) 
												VALUES (CURRENT_TIMESTAMP, '$value_water_workshop_1_2', '$value_water_workshop_1_2_sum','$value_water_uua', '$value_water_uub', '$value_water_topochnaya', 
													'$value_water_podpitka_1_2', '$value_water_gradirnya_3', 
													'$value_water_boylernaya_3', '$value_gaz_1_2', '$value_gaz_topochnaya_1_2')";
		
		$result_add_value_instrument_readings = mysqli_query($link, $query_add_value_instrument_readings) 
				or die("Не удается выполнить запрос |||" . mysqli_error($link));
		
		/*$journal_of_breakdowns_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/journal_of_breakdowns_electric.php';
			header('Location: ' . $journal_of_breakdowns_url);*/
?>