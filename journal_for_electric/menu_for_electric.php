<!-- меню для электриков-->

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="general.php">Главная</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="journal_of_breakdowns.php">Журнал электронщиков</a></li>
      <li><a href="#">Задания для электриков</a></li>
      <li role="presentation">
        <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" id="print">Распечатать журнал </a> 
      </li>
    </ul>
  </div>

  <div class="collapse" id="collapseExample">
    <div class="well">
      <form name = "printNote" method = "POST" action = "/journal_for_electric/print_note.php" class="form-inline select-for-print-note" id="select-electric">

        <div class="row">  <!--Строка для выбора по дежурному электрику для распечатывания журнала DZ-->
          <div class="col-md-12 text-center row-in-collapse-menu">
            <div class="form-group">
              <label for="first-data-shift">Выбор по дате c</label>
              <input type="date" name="selectedFirstDate" class="form-control" id="first-data-shift" value="2017-08-01">
              <label for="last-data-shift"> до</label>
              <input type="date" name="selectedLastDate" class="form-control" id="last-data-shift" 
                    value="2017-08-28">
            </div>

            <div class="form-group text-left">
              <label>
                <input type="checkbox" name="selectOption[]" value="1"> Включить
              </label>
            </div>
          </div>
        </div> <!--Конец DZ-->


        <div class="row">  <!--Строка для выбора по числу линий LC-->
          <div class="col-md-12 text-center row-in-collapse-menu">
            <div class="form-group">
              <label for="first-data-shift">Выбор по числу линий</label>
              <input type="text" name="lineCount" class="form-control" id="line-count" placeholder="Введите число линий">
            </div>

            <div class="form-group text-left">
              <label>
                <input type="checkbox" name="selectOption[]" value="2"> Включить
              </label>
            </div>
          </div>
        </div> <!--Конец LC-->

        <div class="row"> <!--Строка для выбора по смене для распечатывания журнала-->
          <div class="col-md-12 text-center row-in-collapse-menu">
            <div class="form-group">
              <label>Выбор по смене</label>
            </div>
            <div class="form-group">
              <label>
                <input type="radio" name="optionsRadios" value="option1" checked>Дневная
              </label>
            </div>
            <div class="form-group">
              <label>
                <input type="radio" name="optionsRadios" value="option2">Ночная
              </label>
            </div>

            <div class="form-group">
              <label>
                <input type="checkbox" name="selectOptionPrintDate1" value="1"> Включить
              </label>
            </div>
          </div>
        </div> <!--Конец-->

        <div class="row">
          <div class="col-md-12 text-center row-in-collapse-menu">
            <div class="form-group">
              <label for="electic-shift" class="control-label">Выбор по электрику</label>
              <? select_login_engineer($link,"form-control", $_COOKIE['id_status']); ?>
            </div>

            <div class="form-group">
              <label>
                <input type="checkbox" name="selectOptionPrintDate2" value="1"> Включить
              </label>
            </div>

             <div class="form-group">
              <label for="electic-shift" class="control-label">Выбор по цеху</label>
              <? select_login_engineer($link,"form-control", $_COOKIE['id_status']); ?>
            </div>

            <div class="form-group">
              <label>
                <input type="checkbox" name="selectOptionPrintDate3" value="1"> Включить
              </label>
            </div>

           <div class="form-group">
              <label for="electic-shift" class="control-label">Выбор по линии</label>
              <? select_login_engineer($link,"form-control", $_COOKIE['id_status']); ?>
            </div>

            <div class="form-group">
              <label>
                <input type="checkbox" name="selectOptionPrintDate4" value="1"> Включить
              </label>
            </div>
          </div>

          <div class="col-md-12 text-right">
            <div class="form-group">
              <button type="submit" name="printElectrictNote" class="btn btn-default">Отправить на печать</button>
            </div>
          </div>
      </div>
      </form>
    </div>
  </div>
</nav>

<!-- конец блока меню для электриков-->