<div class="container">
    <!-- Таблица для показаний воды -->
    <table class="table table-responsive table-hover table-bordered table-instrument-readings">
      <thead>
        <tr>
        <th>#</th>
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
          <? get_note_from_BD_param($link, "instrument_readings", $_GET["id"]);?>
      </tbody>
    </table>
</div>
  
