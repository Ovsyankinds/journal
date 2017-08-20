<!-- меню для электриков-->

<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
  <a class="navbar-brand" href="general.php">Главная</a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a href="journal_of_breakdowns.php" class="nav-link btn btn-secondary">Журнал электронщиков</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link btn btn-secondary">Задания для электриков</a>
      </li>
      <li class="nav-item">
        <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" 
          class="nav-link btn btn-secondary" id="print">Распечатать журнал </a> 
      </li>
    </ul>
  </div>
</nav>

<div class="collapse" id="collapseExample">
  <form name = "printNote" method = "POST" action = "/journal_for_electric/print_note.php" class="form-inline select-for-print-note" id="select-electric">

    <div class="container">
      <div class="row justify-content-center">  <!--Строка для выбора по дежурному электрику для распечатывания журнала DZ-->
        <div class="col-7">
          <div class="form-group well">
            <label for="first-data-shift">Выбор по дате c</label>
            <input type="date" name="selectedFirstDate" class="form-control" id="first-data-shift" value="2017-08-01">
            <label for="last-data-shift"> до</label>
            <input type="date" name="selectedLastDate" class="form-control" id="last-data-shift" 
                  value="2017-08-28">

            <label>
              <input type="checkbox" name="selectOption[]" value="1"> Включить
            </label>
          </div>
        </div>
      </div> <!--Конец DZ-->

      <div class="row justify-content-center">  <!--Строка для выбора по числу линий LC-->
        <div class="col-md-6">
          <div class="form-group">
            <label for="first-data-shift">Выбор по числу линий</label>
            <input type="text" name="lineCount" class="form-control" id="line-count" placeholder="Введите число линий">
         
            <label>
              <input type="checkbox" name="selectOption[]" value="2"> Включить
            </label>
          </div>
        </div>
      </div> <!--Конец LC-->

      <div class="row justify-content-center"> <!--Строка для выбора по смене для распечатывания журнала-->
        <div class="col-md-5">
          <div class="form-group">
            <label>Выбор по смене</label>
            
            <label>
              <input type="radio" name="optionsRadios" value="option1" checked>Дневная
            </label>
            
            <label>
              <input type="radio" name="optionsRadios" value="option2">Ночная
            </label>
       
            <label>
              <input type="checkbox" name="selectOptionPrintDate1" value="1"> Включить
            </label>
          </div>
        </div>
      </div> <!--Конец-->

      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="form-group">
            <label for="electic-shift" class="control-label">Выбор по электрику</label>
            <? select_login_engineer($link,"form-control", $_COOKIE['id_status']); ?>
    
            <label>
              <input type="checkbox" name="selectOptionPrintDate2" value="1"> Включить
            </label>
      
            <label for="electic-shift" class="control-label">Выбор по цеху</label>
            <? select_login_engineer($link,"form-control", $_COOKIE['id_status']); ?>
   
            <label>
              <input type="checkbox" name="selectOptionPrintDate3" value="1"> Включить
            </label>
          
            <label for="electic-shift" class="control-label">Выбор по линии</label>
            <? select_login_engineer($link,"form-control", $_COOKIE['id_status']); ?>
         
            <label>
              <input type="checkbox" name="selectOptionPrintDate4" value="1"> Включить
            </label>
          </div>
        </div>
      </div>


      <div class="row justify-content-center">
        <div class="col-md-2">
          <div class="form-group">
            <button type="submit" name="printElectrictNote" class="btn btn-secondary">Отправить на печать</button>
          </div>
        </div>
      </div>

    </div>
  </form>
</div>

<!-- конец блока меню для электриков-->