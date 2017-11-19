<!-- меню для электриков-->
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="general.php">Главная</a>
  <div class="collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a href="journal_of_breakdowns.php" class="nav-link">Журнал электронщиков</a>
      </li>
      <li class="nav-item">
        <a href="journal_of_breakdowns_electric.php" class="nav-link">Журнал электриков</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">Задания для электриков</a>
      </li>
      <li class="nav-item">
        <a href="journal_of_breakdowns_electric.php?page=instrument_readings" class="nav-link">Показания приборов учёта</a>
      </li>
      <li class="nav-item">
        <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" 
          class="nav-link" id="print">Распечатать журнал</a> 
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <span class="navbar-text">
          Пользователь: <?=$_COOKIE['user_login'] ?>
        </span>
      </li>
      <li class="nav-item">
        <a href="../logout.php" class="nav-link">Выйти</a>
      </li>
      </ul>
  </div>
</nav>

<div class="collapse top-menu-for-electric" id="collapseExample">
  <form name = "printNote" method = "POST" action = "/journal_for_electric/print_note.php" class="form-inline select-for-print-note" id="select-electric">

  <div class="container">
    <div class="row justify-content-center">  <!--Строка для выбора по дежурному электрику для распечатывания журнала DZ-->
      <div class="col-md-8">
        <div class="form-group justify-content-center">
          <label for="first-data-shift">Выбор по дате c</label>
          <input type="date" name="selectedFirstDate" class="form-control" id="first-data-shift" value="2017-08-01">
          <label for="last-data-shift"> до</label>
          <input type="date" name="selectedLastDate" class="form-control" id="last-data-shift" 
                value="2017-08-28">

          <label>
            <input type="checkbox" name="selectOption[]" value="1" class="form-check-input"> Включить
          </label>
        </div>
      </div>
    </div> <!--Конец DZ-->

    <div class="row justify-content-center">  <!--Строка для выбора по числу линий LC-->
      <div class="col-md-6">
        <div class="form-group justify-content-center">
          <label for="first-data-shift">Выбор по числу записей</label>
          <input type="text" name="lineCount" class="form-control" id="line-count" placeholder="Введите число линий">
       
          <label>
            <input type="checkbox" name="selectOption[]" value="6" class="form-check-input"> Включить
          </label>
        </div>
      </div>
    </div> <!--Конец LC-->

    <div class="row justify-content-center"> <!--Строка для выбора по смене для распечатывания журнала-->
      <div class="col-md-5">
        <div class="form-group justify-content-center">
          <label>Выбор по смене</label>
          
          <label>
            <input type="radio" name="shift" value="Д" class="form-check-input" checked>Дневная
          </label>
          
          <label>
            <input type="radio" name="shift" value="Н" class="form-check-input">Ночная
          </label>
     
          <label>
            <input type="checkbox" name="selectOption[]" value="3" class="form-check-input"> Включить
          </label>
        </div>
      </div>
    </div> <!--Конец-->

    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="form-group justify-content-center">
          <label for="electric-shift" class="control-label">Выбор по электрику</label>
          <? select_login_engineer($link,"form-control", $_COOKIE['id_status']); ?>
  
          <label>
            <input type="checkbox" name="selectOption[]" value="4" class="form-check-input"> Включить
          </label>
        </div>
      </div>
        
      <div class="col-md-5">
        <div class="form-group justify-content-center">
          <label for="electic-shift" class="control-label">Выбор по цеху</label>
            <? selectNumberWorkshop($link,"form-control"); ?>
          <label>
            <input type="checkbox" name="selectOption[]" value="5" class="form-check-input"> Включить
          </label>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
     <div class="col-md-6">
        <div class="form-group justify-content-center">
          <label for="electic-shift" class="control-label">Выбор по линии</label>
            <? select_note_name_line($link, "form-control"); ?>
          <label>
            <input type="checkbox" name="selectOption[]" value="2" class="form-check-input"> Включить
          </label>
        </div>
      </div>
    </div>


    <div class="row justify-content-center">
        <input type="submit" name="printElectrictNote" class="btn btn-secondary" 
               value="Отправить на печать"/>
    </div>
  </div>
  </form>
</div>
<!-- конец блока меню для электриков-->