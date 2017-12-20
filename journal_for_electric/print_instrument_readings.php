<?
  require_once "../engine/connectToDB.php";
  require_once "../engine/function.php";
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->

<head>
  <title>Страница распечатки бланка учета</title>
  <meta http-equiv="Content-Type" content="text/html; charset = utf-8" />
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link rel = "stylesheet" href = "/css/print-instrument-readings.css">
</head>

<body>
  <div class="container">
    <p  id="header-print-instrument-readings" class="h1 text-center">Страница печати бланка учета</p>

      <?$array_month_rus = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 
                            'Октябрь', 'Ноябрь', 'Декабрь');?>
      <?//$a = date('n', mktime(0, 0, 0, 8));?>
    <div class="row">     
      <div class="col-md-3">                
        <a href="#" class="btn btn-secondary print_instrument_readings" onClick = "print_blank_instrument_readings(this)">
          Распечатать бланк на <?=$array_month_rus[date('n')-1];?>    
        </a>
      </div>

      <div class="col-md-1">
        <a href="/journal_of_breakdowns_electric.php" id="href-back" class="btn btn-secondary back">Назад</a>
      </div>

    </div> 
  </div>

<script>
  function print_blank_instrument_readings(tag){
    var header_instrument_readings = document.getElementById('header-print-instrument-readings');
    header_instrument_readings.style.display = 'none';
    tag.style.display = 'none';
    var href_back = document.getElementById('href-back');
    href_back.style.display = 'none';
    window.print();
  }
</script>

<table class="table table-responsive table-hover table-bordered table-instrument-readings-print-blank">
  <thead>
    <tr>
    <th>Дата</th>
    <th colspan="2">Вода, цех №1,2</th>
    <th colspan="2">Вода, УУ-А</th>
    <th colspan="2">Вода, УУ-В</th>
    <th colspan="2">Вода, топочная</th>
    <th colspan="2">Вода, подпитка цех №№1,2</th>
    <th colspan="2">Вода, градирня цех №3 </th> 
    <th colspan="2">Вода, бойлерная цех №3</th>
    <th colspan="2">ГАЗ, цех №№1,2</th>
    <th colspan="2">ГАЗ, топочная цех №№1,2</th>
   </tr>
  </thead>

  <tbody>
      <? view_table_instrument_readings_blank();?>
  </tbody>
</table>
</body>
</html>