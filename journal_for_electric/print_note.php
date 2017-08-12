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
       if($_POST['selectOptionPrintDate'] == 1){
          $selectedFirstDate = trim(strip_tags( $_POST['selectedFirstDate'] ));
          $selectedLastDate = trim(strip_tags( $_POST['selectedLastDate'] ));

          //echo $selectedFirstDate . "/////" . $selectedLastDate;
          printElectricNote($link, $nameDataBaseTable, $selectedFirstDate, $selectedLastDate);
        }else{
          echo "Вы не подтвердили выбор";
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
