<?php
	
	//Выбираем БД для использования в запросе для изменения записи
	$change_id = $_GET['change_id'];

	$query_change_note = "SELECT id, date_shift, shift, name_engineer, 
												number_workshop, name_machine, caller_FIO, call_time, 
												end_of_work, repair_time, breakdown, removal_breakdown, 
												used_teh_mat_values FROM $backUrl WHERE id = '$change_id'";

	echo $query_change_note;
							
	$result_query_change_note = mysqli_query($link, $query_change_note)
								or die("Не удается выполнить запрос  |||" . mysqli_error($link));
	
		while( $row = mysqli_fetch_array($result_query_change_note) ){
			$date_shift = $row['date_shift'];
			$shift = $row['shift'];
			$name_engineer = $row['name_engineer'];
			$number_workshop = $row['number_workshop'];
			$name_machine = $row['name_machine'];
			$caller_FIO = $row['caller_FIO'];
			$call_time = $row['call_time'];
			$end_of_work = $row['end_of_work'];
			$repair_time = $row['repair_time'];
			$breakdown = $row['breakdown'];
			$removal_breakdown = $row['removal_breakdown'];
			$used_teh_mat_values = $row['used_teh_mat_values'];
			$GET_param = "change_id=$change_id&" . "call_time=$call_time&" .
										"end_of_work=$end_of_work&" . "repair_time=$repair_time";
?>
	<form action = "/engine/update_journal.php?<?php echo $GET_param; ?>"
				method = "POST" name = "form" id = "form">	
		<tr>
			<td>
				<span> <?php echo $change_id; ?> </span>
			</td>
					
			<td>
				<span id = 'change_date_shift'
											onclick = 'changeNote(this, <?php echo $change_id; ?>)'> 
											<?php echo $date_shift; ?> 
				</span>	
			</td>
			
			<td>
				<span id = 'change_shift'
										onclick = 'changeNote(this, <?php echo $change_id; ?>)'> 
											<?php echo $shift; ?> 
				</span>	
			</td>
			
			<td>
				<span id = 'name_engineer' 
										onclick = 'changeNote(this, <?php echo $change_id; ?>)'> 
									<?php echo $name_engineer; ?> 
				</span>	
			</td>
		
			<td>
				<span id = 'number_workshop'
										onclick = 'changeNote(this, <?php echo $change_id; ?>)'> 
							<?php echo $number_workshop; ?> 
				</span>	
			</td>
			
			<td>
				<span id = 'name_machine'
									onclick = 'changeNote(this, <?php echo $change_id; ?>)'> 
						<?php echo $name_machine; ?> 
				</span>	
			</td>

			<td>
				<span id = 'caller_FIO'
									onclick = 'changeNote(this, <?php echo $change_id; ?>)'> 
						<?php echo $caller_FIO; ?> 
				</span>	
			</td>
			
			<td>
				<span id = 'call_time'
									onclick = 'changeNote(this, <?php echo $change_id; ?>)'> 
						<?php echo $call_time; ?> 
				</span>	
			</td>
			
			<td>
				<span id = 'end_of_work'
									onclick = 'changeNote(this, <?php echo $change_id; ?>)'> 
						<?php echo $end_of_work; ?> 
				</span>	
			</td>

			<td>
				<span id = 'repair_time'
									onclick = 'changeNote(this, $change_id)'> 
						<?php echo $repair_time; ?> 
				</span>	
			</td>

			<td>
				<span id = 'breakdown'
									onclick = 'changeNote(this, $change_id)'> 
						<?php echo $breakdown; ?> 
				</span>	
			</td>
			
			<td>
				<span id = 'removal_breakdown'
									onclick = 'changeNote(this, $change_id)'> 
						<?php echo $removal_breakdown; ?> 
				</span>	
			</td>
			
			<td>
				<span id = 'used_teh_mat_values'
									onclick = 'changeNote(this, <?php echo $change_id; ?>)'> 
						<?php echo $used_teh_mat_values; ?> 
				</span>	
			</td>
		</tr>
		
		<tr>
			<td> 
				<input class = 'elemFormChangeNote' />
			</td>
			<td> 
				<input type = 'text' name = 'date_shift' placeholder = '2015-05-25'
									class = 'elemFormChangeNote' /> 
				<input hidden = 'true' name = 'select[]' value = 'date_shift' />
			</td>
			
			<td> 
				<select size = '1' name = 'shift' class = 'elemFormChangeNote'>
					<option value = ''> </option>
					<option value = 'Д'> Д </option>
					<option value = 'Н'> Н </option>
				</select>
				<input hidden = 'true' name = 'select[]' value = 'shift' />
			</td>
									
			<td> 
				<?php select_login_engineer($link, 'elemFormChangeNote', $id_status) ?>
				<input hidden = 'true' name = 'select[]' value = 'name_engineer' />
			</td>
			
			<td> 
				<select size = '1' name = 'number_workshop' class = 'elemFormChangeNote'>
					<option value = ''> </option>
					<option value = '1'> 1 </option>
					<option value = '2'> 2 </option>
					<option value = '3'> 3 </option>
					<option value = '4'> 4 </option>
					<option value = '5'> 5 </option>
					<option value = '7'> 7 </option>
				</select>
				<? //selectNumberWorkshop($link,"elemFormChangeNote "); ?>
				<input hidden = 'true' name = 'select[]' value = 'number_workshop' /> 
			</td>
			
			<td> 
				<?php select_name_machine($link, 'elemFormChangeNote'); ?>
				<input hidden = 'true' name = 'select[]' value = 'name_machine' /> 
			</td>
			
			<td> 
				<input type = 'text' name = 'caller_FIO' class = 'elemFormChangeNote' />
				<input hidden = 'true' name = 'select[]' value = 'caller_FIO' /> 
			</td>
			
			<td> 
				<input type = 'time' name = 'call_time' class = 'elemFormChangeNote' />
				<input hidden = 'true' name = 'select[]' value = 'call_time' />
			</td>
			
			<td> 
				<input type = 'time' name = 'end_of_work' class = 'elemFormChangeNote' />
				<input hidden = 'true' name = 'select[]' value = 'end_of_work' />
			</td>
			<td> <input class = 'elemFormChangeNote' /> </td>
			<td> <input class = 'elemFormChangeNote' /> </td>
			<td> <input class = 'elemFormChangeNote' /> </td>
			<td> 
				<!--<input type = 'text' name = 'used_teh_mat_values' class = 'elemFormChangeNote' />
				<input hidden = 'true' name = 'select[]' value = 'used_teh_mat_values' /> -->
			</td>
		</tr>
	</form>
<?php }?>
	