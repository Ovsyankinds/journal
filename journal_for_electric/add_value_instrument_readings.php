<?
	if( isset($_POST["submit_value_instrument_readings"]) ){
		echo $_POST["value_water_workshop_1_2"];
		echo $_POST["value_water_uua"];
		echo $_POST["value_water_uub"];
		echo $_POST["value_water_topochnaya"];
		echo $_POST["value_water_podpitka_1_2"];
		echo $_POST["value-water-gradirnya-3"];
		echo $_POST["value-water-boylernaya-3"];
	}else{
		echo "Не заполнили поля";
	}
?>