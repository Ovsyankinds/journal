</br></br></br>
<div class="container">
	<form name = "add_value_instrument_readings" method = "POST" 
					action = "journal_for_electric/add_value_instrument_readings.php" onsubmit = "valid_form_add_mess(this)">

		<div class="row">
			<div class=" form-group col-md-3">
				<label for = "value-water-workshop-1-2" class="col-form-label label-form-input-note">  Показания воды цех №1,2 </label>
				<input type = "text" name = "value_water_workshop_1_2" id = "value-water-workshop-1-2" class = "form-control">
			</div>
		
			<div class="form-group col-md-3">
				<label for = "value-water-uua" class="col-form-label label-form-input-note"> Вода, УУ-А </label>
				<input type = "text" name = "value_water_uua" id = "value-water-uua" class="form-control"/> 
			</div>

			<div class="form-group col-md-3">
				<label for = "value-water-uub" class="col-form-label label-form-input-note"> Вода, УУ-В </label>
				<input type = "text" name = "value_water_uub" id="value-water-uub" class="form-control" />
			</div>

			<div class="form-group col-md-3">
				<label for = "value-water-topochnaya" class="col-form-label label-form-input-note"> Вода, топочная </label>
				<input type = "text" name = "value_water_topochnaya" id = "value-water-topochnaya" class="form-control" /> 
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-4">
					<label for = "value-water-podpitka-1-2" class="col-form-label label-form-input-note">
						Вода, подпитка цех №1,2
					</label>
					<input type = "text" name = "value_water_podpitka_1_2" id = "value-water-podpitka-1-2" class="form-control"/> 
			</div>
			
			<div class="form-group col-md-4">
				<label for = "value-water-gradirnya-3" class = "col-form-label label-form-input-note">
					Вода, градирня цех №3
				</label>
				<input type = "text" name = "value_water_gradirnya_3" id = "value-water-gradirnya-3" class="form-control"/>
			</div>

			<div class="form-group col-md-4">
				<label for = "value-water-boylernaya-3" class = "col-form-label label-form-input-note"> 
					Вода, бойлерная цех №3
				</label>
				<input type = "text" name = "value_water_boylernaya_3" id = "value-water-boylernaya-3" class="form-control"/>
			</div>
		</div>
		
		<div class="row justify-content-center">	
			<div class="form-group col-md-4">
				<label for = "value-gaz-1-2" class = "col-form-label label-form-input-note"> 
					Газ, цех №1,2
				</label>
				<input type = "text" name = "value_gaz_1_2" id = "value-gaz-1-2" class="form-control"/>
			</div>

			<div class="form-group col-md-4">
					<label for = "value-gaz-topochnaya-1-2" class = "col-form-label label-form-input-note"> 
						Газ, топочная, цех №1,2
					</label>
					<input type = "text" name = "value_gaz_topochnaya_1_2" id = "value-gaz-topochnaya-1-2" 
					class="form-control"/>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-md-3">
				<input type = "submit" name = "submit_value_instrument_readings" value="Добавить запись"
							class="form-control btn btn-secondary">
			</div>
		</div>
	</form>
</div>
	
	</br></br>

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
				<th>Изменение записи</th>
   		 </tr>
  		</thead>

  		<tbody>
		   		<? note_of_readings($link, "instrument_readings");?>
 			</tbody>
		</table>