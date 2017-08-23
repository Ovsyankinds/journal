<?php
  require_once "../engine/connectToDB.php";
  require_once "../engine/function.php";
  mysqli_query($link, "SET NAMES 'utf8'");
?>

<!DOCTYPE>
<html>
<head>
  <title> Главная страница журнала </title>
  <meta http-equiv="Content-Type" content="text/html; charset = utf-8" />
  <link rel = 'stylesheet' type = 'text/css' href = 'css/print.css' >
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link rel = "stylesheet" href = "/css/journal_of_breakdowns_for_electric.css">
</head>

<body>

  <?php
     $user_status = $_COOKIE['id_status'];
     switch($user_status){
      case 0:
        $nameDataBaseTable = "journal_of_breakdowns_electric";
        $back_to_journal = $_SERVER['HTTP_ORIGIN'] . "/journal_of_breakdowns_electric.php";
        break;
      default:
        $nameDataBaseTable = "journal_of_breakdowns";
        $back_to_journal = "journal_of_breakdowns.php";
     }
  ?>

<div class="container-fluid">

<!-- таблица с заголовками и с стрелками для сортировки по столбцам -->

  <div class="row">
   <div class="table-responsive">
    <table class="table">
    <tr>
      <td> <span class = "journal_header_table"> № </span> </td>
      <td> <span class = "journal_header_table"> Д </span> </td>
      <td> <span class = "journal_header_table"> См. </span> </td>
      <td> <span class = "journal_header_table"> См.ИЭТ </span> </td>
      <td> <span class = "journal_header_table"> №ц. </span> </td>
      <td> <span class = "journal_header_table"> НЛ </span> </td>
      <td> <span class = "journal_header_table"> В </span> </td>
      <td> <span class = "journal_header_table"> ВВ</span> </td>
      <td> <span class = "journal_header_table"> ОР </span> </td>
      <td> <span class = "journal_header_table"> ВР </span> </td>
      <td> <span class = "journal_header_table"> ПВ </span> </td>
      <td> <span class = "journal_header_table"> УП </span> </td>
      <td> <span class = "journal_header_table"> ИТМЦ </span> </td>
    </tr>
      
    <?php
      if( isset($_POST['printElectrictNote']) ){

        $paramArrayKeys = ["firstDate", "lastDate", 
                            "lineCount", "shift", "nameElectric", "numberWorkshop", "nameLine"];
        $paramArray = array();
        $selectOption = $_POST['selectOption'];
        //$selectOptionWait = [1, 2, 3, 4, 5, 6,];
        //$resultO = array_diff($selectOptionWait, $selectOption);

        /*echo "<pre>";
        print_r($selectOption);
        echo "<pre>";

        echo "<pre>";
        print_r($resultO);
        echo "<pre>";
        $countSelectOption = count($selectOption) - 1;*/
        //echo $countSelectOption;

        $selectedFirstDate = trim(strip_tags( $_POST['selectedFirstDate'] ));
        $selectedLastDate = trim(strip_tags( $_POST['selectedLastDate'] ));
        $selectedLineCount = trim(strip_tags( $_POST['lineCount'] ));
        $selectedShift = trim(strip_tags( $_POST['shift'] ));
        $selectedNameElectric = "aaa";
        $selectedNumberWorkshop = 1;
        $selectedLineName = "FFF";


        /*foreach($selectOptionWait as $row){
          foreach ($selectOption $value) {
            if($row != $value){
              array_push($paramArray, $selectedFirstDate, $selectedLastDate, 0, 0, 0, 0, 0);
              $result = array_combine($paramArrayKeys, $paramArray);
            }
          }
        }*/


        if($selectOption[0] == 0 && $selectOption[1] != 1){
          array_push($paramArray, $selectedFirstDate, $selectedLastDate, 0, 0, 0, 0, 0);
          $result = array_combine($paramArrayKeys, $paramArray);
        }elseif($selectOption[0] == 2){ 
          array_push($paramArray, 0, 0, $selectedLineCount);
          $result = array_combine($paramArrayKeys, $paramArray);
        }elseif($selectOption[0] == 1 && $selectOption[1] == 2){
          array_push($paramArray, $selectedFirstDate, $selectedLastDate, $selectedLineCount);
          $result = array_combine($paramArrayKeys, $paramArray);
        }elseif($selectOption[0] == 3){
          array_push($paramArray, 0, 0, 0, $selectedShift);
          $result = array_combine($paramArrayKeys, $paramArray);
        }elseif($selectOption[0] == 1 && $selectOption[1] == 2){}
        else{
          echo "Не выбрана ни одна из опций";
        }


       //print_r($paramArray);
        //print_r($selectOption);
        //print_r($result);
        if($result){
          //printElectricNote($link, $nameDataBaseTable, $result);
        }
      }    
    ?>
</table>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <span class = "signature" id = "signature_pass"> Смену и инструмент сдал:  ______________________ </span>
    <span class = "signature" id = "signature_take"> Смену и инструмент принял:______________________ </span>
    <span class = "signature" id = "signature_nach"> Начальник отдела ПЭ       ______________________ </span>
  </div>

  <div class="col-md-12">
    <input id = "submit" type = "submit" value = "Распечатать" onClick = "print_()">
    <a href = "<?=$back_to_journal;?>" id = "back_to_journal_of_breakdowns"> Назад к журналу </a>
  </div>
</div>

<script>
  function print_(){
    var sumbit = document.getElementById('submit');
    submit.style.display = 'none';
    var a = document.getElementById('back_to_journal_of_breakdowns');
    a.style.display = 'none';
     window.print();
  }
</script>

</div>
</body>

</html>
