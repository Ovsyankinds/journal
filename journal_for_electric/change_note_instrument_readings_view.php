</br></br></br>
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
          <? 
            get_note_from_BD_param($link, "instrument_readings", $_GET["id"]);
            $result = return_BD_row($link, "instrument_readings", $_GET["id"]);
          ?>
      </tbody>
    </table>

<div class="container">
  <form name = "change_note_instrument_readings" method = "POST" 
          action = "/journal_for_electric/change_note_instrument_readings.php" onsubmit = "valid_form_add_mess(this)">

    <div class="row">
      <div class=" form-group col-md-3">
        <label for = "value-water-workshop-1-2" class="col-form-label label-form-input-note">  Показания воды цех №1,2 </label>
        <input type = "text" name = "value_water_workshop_1_2" value = "<?=($result[2] - $result[3]);?>" 
          placeholder="<?=($result[2] - $result[3]);?>" id = "value-water-workshop-1-2" class = "form-control">
      </div>
    
      <div class="form-group col-md-3">
        <label for = "value-water-uua" class="col-form-label label-form-input-note"> Вода, УУ-А </label>
        <input type = "text" name = "value_water_uua" value = "<?=($result[4] - $result[5]);?>"
          placeholder="<?=($result[4] - $result[5]);?>" id = "value-water-uua" class="form-control"/> 
      </div>

      <div class="form-group col-md-3">
        <label for = "value-water-uub" class="col-form-label label-form-input-note"> Вода, УУ-В </label>
        <input type = "text" name = "value_water_uub" value = "<?=($result[6] - $result[7]);?>" 
          placeholder="<?=($result[6] - $result[7]);?>" id="value-water-uub" class="form-control" />
      </div>

      <div class="form-group col-md-3">
        <label for = "value-water-topochnaya" class="col-form-label label-form-input-note"> Вода, топочная </label>
        <input type = "text" name = "value_water_topochnaya" value = "<?=($result[8] - $result[9]);?>" 
          placeholder="<?=($result[8] - $result[9]);?>" id = "value-water-topochnaya" class="form-control" /> 
      </div>
    </div>

    <div class="row">
      <div class="form-group col-md-4">
          <label for = "value-water-podpitka-1-2" class="col-form-label label-form-input-note">
            Вода, подпитка цех №1,2
          </label>
          <input type = "text" name = "value_water_podpitka_1_2" value = "<?=($result[10] - $result[11]);?>" 
          placeholder="<?=($result[10] - $result[11]);?>" id = "value-water-podpitka-1-2" class="form-control"/> 
      </div>
      
      <div class="form-group col-md-4">
        <label for = "value-water-gradirnya-3" class = "col-form-label label-form-input-note">
          Вода, градирня цех №3
        </label>
        <input type = "text" name = "value_water_gradirnya_3" value = "<?=($result[12] - $result[13]);?>" 
          placeholder="<?=($result[12] - $result[13]);?>" id = "value-water-gradirnya-3" class="form-control"/>
      </div>

      <div class="form-group col-md-4">
        <label for = "value-water-boylernaya-3" class = "col-form-label label-form-input-note"> 
          Вода, бойлерная цех №3
        </label>
        <input type = "text" name = "value_water_boylernaya_3" value = "<?=($result[14] - $result[15]);?>" 
          placeholder="<?=($result[14] - $result[15]);?>" id = "value-water-boylernaya-3" class="form-control"/>
      </div>
    </div>
    
    <div class="row justify-content-center">  
      <div class="form-group col-md-4">
        <label for = "value-gaz-1-2" class = "col-form-label label-form-input-note"> 
          Газ, цех №1,2
        </label>
        <input type = "text" name = "value_gaz_1_2" value = "<?=($result[16] - $result[17]);?>" 
          placeholder="<?=($result[16] - $result[17]);?>" id = "value-gaz-1-2" class="form-control"/>
      </div>

      <div class="form-group col-md-4">
          <label for = "value-gaz-topochnaya-1-2" class = "col-form-label label-form-input-note"> 
            Газ, топочная, цех №1,2
          </label>
          <input type = "text" name = "value_gaz_topochnaya_1_2" value = "<?=($result[18] - $result[19]);?>" 
          placeholder="<?=($result[18] - $result[19]);?>" id = "value-gaz-topochnaya-1-2" 
          class="form-control"/>
      </div>

      <input type="hidden" name="id_change_note_instrument_readings" value = "<?=$_GET['id'];?>"/>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-3">
        <input type = "submit" name = "submit_change_note_instrument_readings" value="Добавить запись"
              class="form-control btn btn-secondary">
      </div>
    </div>
  </form>
</div>
  
