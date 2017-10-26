	<div class="container">
			<form name = "add_new_message_electric" method = "POST" 
		action = "add_new_message_to_journal_electric.php" onsubmit = "valid_form_add_mess(this)">

		<div class="row">
			<div class=" form-group col-md-3">
				<label for = "value-water-workshop12" class="col-form-label label-form-input-note">  Показания воды цех №1,2 </label>
				<input type = "text" name = "value_water_workshop12" id = "value-water-workshop12" class = "form-control">
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
				<label for = "value-water-podpit12" class="col-form-label label-form-input-note">  Вода, подпитка цех №1,2 </label>
				<input type = "text" name = "value_water_podpit12" id = "value-water-podpit12" class="form-control" /> 
		</div>
		
		<script>
				/*функция по добавлению автоматом записи в поле "Утсранение
					поломки" по нажатию на checkbox*/
			var textarea_removal_breakdown = document.getElementsByName('removal_breakdown');
			var text = "";
			function checkbox(input){
				if(input.checked){
					switch(input.value){
						case "1":
							text = "Обход линий";
							break;
					}
				input.checked = "";
				textarea_removal_breakdown[0].innerHTML = text;
				}
			}
				/*конец функции по добавлению записи в поле "Утсранение поломки"*/
		</script>
		
		<div class="form-group col-md-4">
			<label for = "removal_breakdown" class = "col-from-label label-form-input-note"> Вода, градирня цех №3 </label>
				<div class="form-group checkbox-for-auto-added">
					<div class="form-check form-check-inline">
						<label class="form-check-label">
							<input type = "checkbox" name = "checkbox_removal_breakdown[]"
								value = "1" onclick = "checkbox(this)" class="form-check-input"/> Обход линий
						</label>
					</div>
				</div>
			
				<textarea cols = "45" rows = "7" wrap = "hard" name = "removal_breakdown" id = "removal_breakdown" onclick = "fun_one(this)" 
							onBlur = "foo(this.value)" class="form-control">
				</textarea>
		</div>

		<div class="form-group col-md-4">
			<label for = "used_teh_mat_values" class = "col-form-label label-form-input-note"> Вода, бойлерная цех №3 </label>
			<textarea cols = "45" rows = "10" wrap = "hard" 
						name = "used_teh_mat_values" id = "used_teh_mat_values" 
						onclick = "fun_one(this)" class="form-control textarea-add-note">
			</textarea>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-3">
			<input type = "radio" checked name = "add_number_workshop" 
						 hidden = "true" value = "<?php echo $number_workshop; ?>">
			<input type = "submit" name = "add_new_message_to_journal_electric" value="Добавить запись"
						class="form-control btn btn-secondary">
		</div>
	</div>
	</form>

	<!-- Таблица для показаний воды -->
		<table class="table table-responsive table-hover">
 			<thead>
    		<tr>
	      <th>#</th>
	      <th>Дата</th>
	      <th>Вода, цех №№1,2</th>
	      <th>Вода, УУ-А</th>
	      <th>Вода, УУ-В</th>
	      <th>Вода, топочная</th>
	      <th>Вода, подпитка цех №№1,2</th>
	      <th>Вода, градирня цех №3 </th> 
				<th>Вода, бойлерная цех №3</th>
				<th>ГАЗ, цех №№1,2</th>
				<th>ГАЗ, топочная цех №№1,2</th>
				<th>Изменение записи</th>
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
		      <td>2</td>
		    </tr>
		    <tr>
		      <th scope="row">3</th>
		    		<td>3</td>
		    </tr>
 			 </tbody>
		</table>

		<!--
		<div class="table-responsive">
			<table id = "table-for-electric">
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
			</table>
		</div>
		-->
	</div>