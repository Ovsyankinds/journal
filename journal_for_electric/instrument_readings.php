

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
				<input type = "text" name = "value-water-gradirnya-3" id = "value-water-gradirnya-3" class="form-control"/>
			</div>

			<div class="form-group col-md-4">
				<label for = "value-water-boylernaya-3" class = "col-form-label label-form-input-note"> 
					Вода, бойлерная цех №3
				</label>
				<input type = "text" name = "value-water-boylernaya-3" id = "value-water-boylernaya-3" class="form-control"/>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-3">
				<input type = "submit" name = "submit_value_instrument_readings" value="Добавить запись"
							class="form-control btn btn-secondary">
			</div>
		</div>
	</form>

	</br></br>

	<div class = "row">
		<table  class="table table-responsive table-hover table-striped" id = "table-for-electric">
			<thead>
				<tr>
					<th> 
						<span> Номер записи </span> 
					</th>

					<th>
						<span> Дата </span> 
					</th>

					<th>		
						<span> Вода, цех №№1,2 </span>
					</th>

					<th>
						<span> Вода, УУ-А </span>
					</th>

					<th>
						<span> Вода, УУ-В </span>
					</th>

					<th>
						<span> Вода, топочная </span>
					</th>

					<th>
						<span> Вода, подпитка цех №№1,2 </span>
					</th>

					<th>
						<span> Вода, градирня цех №3 </span> 
					</th>

					<th>
						<span> Вода, бойлерная цех №3 </span>
					</th>

					<th>
						<span> ГАЗ, цех №№1,2 </span>
					</th>

					<th>
						<span>ГАЗ, топочная цех №№1,2 </span>
					</th>
					
					<th>
						<span> Изменение записи </span>
					</th>
				</tr>
			</thead>
			
			<tbody>
		    <tr>
		      <th scope="row">1</th>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		    </tr>
		    <tr>
		      <th scope="row">2</th>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		    </tr>
		    <tr>
		      <th scope="row">3</th>
		 		  <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		      <td>1</td>
		    </tr>
				</tbody>
		</table>
	</div>
</div>