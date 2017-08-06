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

        <div class="form-group">
          <label for="data-shift">Выбор по дате</label>
          <input type="date" name="selectedFirstDate" class="form-control" id="data-shift" placeholder="Начальная ДД:ММ:ГГ">
          <input type="date" name="selectedLastDate" class="form-control" id="data-shift" placeholder="Конечная ДД:ММ:ГГ">
        </div>

        <div class="radio form-group">
          <span>Выбор по смене</span>
          <label>
            <input type="radio" name="optionsRadios" value="option1" checked>Дневная
          </label>
        </div>

        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" value="option2">Ночная
          </label>
        </div>



        <div class="form-group">
          <label for="electic-shift" class="control-label">Выбор по электрику</label>
          <? select_login_engineer($link,"form-control", $_COOKIE['id_status']); ?>
        </div>

        <button type="submit" name="printElectrictNote" class="btn btn-default">Отправить на печать</button>
      </form>
    </div>
  </div>
</nav>

<!-- конец блока меню для электриков-->