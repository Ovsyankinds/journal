<?
  require_once "../engine/connectToDB.php";
  require_once "../engine/function.php";

if( isset($_POST["submit_change_note_instrument_readings"]) ){
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
    $id_change_note_instrument_readings = $_POST['id_change_note_instrument_readings'];

    //echo $id_change_note_instrument_readings;


    //Добавляем все значения пришедшие из формы в массив для последующей проверки данных
    array_push($array, $value_water_workshop_1_2, $value_water_uua, $value_water_uub,
                        $value_water_topochnaya, $value_water_podpitka_1_2, $value_water_gradirnya_3,
                        $value_water_boylernaya_3, $value_gaz_1_2, $value_gaz_topochnaya_1_2, 
                        $id_change_note_instrument_readings);
    //print_r($array);
    $result = check_value_instrument_readings($array); //проверили пришедшие данные
    //print_r($result);

    //разбиваем обратно в переменные параметры
    list($value_water_workshop_1_2, $value_water_uua, $value_water_uub, $value_water_topochnaya,
          $value_water_podpitka_1_2, $value_water_gradirnya_3, $value_water_boylernaya_3, 
          $value_gaz_1_2, $value_gaz_topochnaya_1_2, $id_change_note_instrument_readingss) = $result;
  }else{
    echo "Не заполнили поля";
  }

  $array_db_row = return_BD_row($link, "instrument_readings", $id_change_note_instrument_readings);

  $value_water_workshop_1_2 = $value_water_workshop_1_2 + $array_db_row[3];
  $value_water_uua = $value_water_uua + $array_db_row[5]; 
  $value_water_uub = $value_water_uub + $array_db_row[7]; 
  $value_water_topochnaya = $value_water_topochnaya + $array_db_row[9]; 
  $value_water_podpitka_1_2 = $value_water_podpitka_1_2 + $array_db_row[11];
  $value_water_gradirnya_3 = $value_water_gradirnya_3 + $array_db_row[13];
  $value_water_boylernaya_3 = $value_water_boylernaya_3 + $array_db_row[15];
  $value_gaz_1_2 = $value_gaz_1_2 + $array_db_row[17];
  $value_gaz_topochnaya_1_2 = $value_gaz_topochnaya_1_2 + $array_db_row[19];

  //делаем обновление записи в БД
  $querySelectValueInstrumentReadings = "UPDATE instrument_readings SET 
    value_water_workshop_1_2 = $value_water_workshop_1_2, value_water_uua = $value_water_uua,
    value_water_uub = $value_water_uub, value_water_topochnaya = $value_water_topochnaya, 
    value_water_podpitka_1_2 = $value_water_podpitka_1_2, value_water_gradirnya_3 = $value_water_gradirnya_3, 
    value_water_boylernaya_3 = $value_water_boylernaya_3, value_gaz_1_2 = $value_gaz_1_2,
    value_gaz_topochnaya_1_2 = $value_gaz_topochnaya_1_2 WHERE id = $id_change_note_instrument_readings";

  $resultQuerySelectValueInstrumentReadings = mysqli_query($link, $querySelectValueInstrumentReadings) 
      or die("Не удается выполнить запрос |||" . mysqli_error($link));

  $journal_of_breakdowns_url = 'http://' . $_SERVER['HTTP_HOST'] . '/journal_of_breakdowns_electric.php?page=instrument_readings';
  header('Location: ' . $journal_of_breakdowns_url);   

?>