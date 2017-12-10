<?php
  require_once "../engine/connectToDB.php";
  require_once "../engine/function.php";
  mysqli_query($link, "SET NAMES 'utf8'");
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->

<head>
  <title> Главная страница журнала </title>
  <meta http-equiv="Content-Type" content="text/html; charset = utf-8" />
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/print_note_electric.css">
</head>
<body>

  <div class="container-fluid">

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

  <!-- таблица с заголовками и с стрелками для сортировки по столбцам -->
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-bordered">
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

              $selectOption = $_POST['selectOption'];

              $selectedFirstDate = trim(strip_tags( $_POST['selectedFirstDate'] ));
              $selectedLastDate = trim(strip_tags( $_POST['selectedLastDate'] ));
              $selectedFinalDate = $selectedFirstDate . "/" . $selectedLastDate;
              $selectedLineCount = trim(strip_tags( $_POST['lineCount'] ));
              $selectedShift = trim(strip_tags( $_POST['shift'] ));
              $selectedNameElectric = trim(strip_tags( $_POST['select_login_engineer'] ));
              $selectedNumberWorkshop = trim(strip_tags( $_POST['selectNumberWorkshop'] ));
              $selectedNameLine = trim(strip_tags( $_POST['selectNameLine'] ));

              $arrayParamSelectOption = array();
              array_push($arrayParamSelectOption, $selectedFinalDate, $selectedNameLine,
                          $selectedShift, $selectedNameElectric, $selectedNumberWorkshop, $selectedLineCount);

              printElectricNote($link, $nameDataBaseTable, $selectOption, $arrayParamSelectOption);
             
            }    
          ?>
        </table>
      </div>
   </div>
  </div>

  <? if($_COOKIE['id_status'] == 1){?>
  <div class="row">
    <div class="col-md-12">
      <span class = "signature" id = "signature_pass"> Смену и инструмент сдал:  ______________________ </span>
      <span class = "signature" id = "signature_take"> Смену и инструмент принял:______________________ </span>
      <span class = "signature" id = "signature_nach"> Начальник отдела ПЭ       ______________________ </span>
    </div>

    <div class="col-md-12">
      <input id = "submit" type = "submit" value = "Распечатать" class="form-control btn btn-secondary" onClick = "print_()">
      <a href = "<?=$back_to_journal;?>" class="form-control btn btn-secondary" id = "back_to_journal_of_breakdowns"> Назад к журналу </a>
    </div>
  </div>
  <?}?>

  <? 
    //Если пользователь электрик, то отрисовываем блок с подписями для электриков
    if($_COOKIE['id_status'] == 0)
  {?>
    <div class="row text-left">
      <div class="col-md-12">
        <p> 
          Смену сдал:&nbsp&nbsp&nbsp&nbsp&nbsp
          ______________________/______________________/&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          электромонтер по ремонту и обслуживанию оборудования
        </p>
      </div>

      </br>

      <div class="col-md-12">
        <p> 
          Смену принял:&nbsp&nbsp&nbsp&nbsp&nbsp
           ______________________/______________________/&nbsp&nbsp&nbsp&nbsp&nbsp
           электромонтер по ремонту и обслуживанию оборудования
        </p>
      </div>

      <div class="col-md-12">
        <p> 
          Ответственный руководитель:&nbsp&nbsp&nbsp&nbsp&nbsp
          ______________________/______________________
        </p>
      </div>


      <div class="col-md-12">
        <input id = "submit" type = "submit" value = "Распечатать" onClick = "print_()" class="btn btn-secondary">
        <a href = "<?=$back_to_journal;?>" id = "back_to_journal_of_breakdowns" class="btn btn-secondary">
           Назад к журналу
        </a>
      </div>
    </div>
  <?}?>
</div>

<script src = "../JS/js.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../JS/bootstrap.min.js"></script>

<script>
  function print_(){
    var sumbit = document.getElementById('submit');
    submit.style.display = 'none';
    var a = document.getElementById('back_to_journal_of_breakdowns');
    a.style.display = 'none';
     window.print();
  }
</script>
</body>

</html>
