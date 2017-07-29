<!-- Блок кода для удаления записей из таблицы -->
<div id = "delete_message_of_journal_breackdowns">
	<form name = "delete_message" method = "POST" action = "delete_message_of_journal_breackdowns_electric.php" class="form-inline">
		<select size = "1" name = "id_delete" class="form-control">
			<?php
				$array_id_count = count($array_id);
														
				for($i = 1; $i < $array_id_count; $i+=2){
					
					$id_to_delete = $array_id[$i - 1];
					$number_id_to_delete = $array_id[$i];
					echo  "<option value = '$id_to_delete'>" . $number_id_to_delete . "</option>";
					// Массив $array_id содержит в себе id из таблицы journal_of_breakdowns
				
				}					
			?>	
		</select>
		<input type = "submit" name = "delete_message_of_journal_electric" value = "Удалить выбранную запись" class="btn btn-default" />
	</form>
</div>
<!-- Конец блока кода удаления записей из таблицы -->