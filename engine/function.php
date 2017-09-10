<?php
	
/*****
	Функция для создания <select></select> с номерами цехов
	Дата создания 08.09.2017
*****/
function selectNumberWorkshop($link, $idOrClass){
	
	$querySelectFromListOfMachines = "SELECT number_workshop FROM list_of_machines ORDER BY id ASC";
	$resultSelectFromListOfMachines = mysqli_query($link, $querySelectFromListOfMachines);
	$arrayNumberWorkshop = [];
	while( $row = mysqli_fetch_array($resultSelectFromListOfMachines) ){
			$arrayNumberWokshop[] = $row['number_workshop'];
	}

	$arrayNumberWokshop = array_unique($arrayNumberWokshop);
	//print_r($arrayNumberWokshop);

	echo "<select size = '1' name = 'selectNumberWorkshop' class = '$idOrCclass' id='selectNumberWorkshop'>";
	foreach ($arrayNumberWokshop as $value) {
		$numberWokshop = $value;
		echo "<option value = '$numberWokshop'> $numberWokshop </option>";	
	}
		echo "</select>";
}
/*end*/

/*****
	Функция для создания <select></select> с названиями линий
	Дата создания 08.09.2017
*****/
	function selectNoteNameLine($link){
		$querySelectFromListOfMachinesDB = "SELECT name_machine, number_workshop FROM list_of_machines";
		$resultSelectFromListOfMachinesDB = mysqli_query($link, $querySelectFromListOfMachinesDB);
		echo "<select size = '1' name = 'selectNameLine' id = 'selectNameLine'>";
		while( $row = mysqli_fetch_array(	$resultSelectFromListOfMachinesDB )){
				$nameMachine = $row['name_machine'];
				$numberWorkshop = $row['number_workshop'];
				echo "<option disabled> Цех №" . $numberWorkshop . "</option>";	
				echo "<option value = '$nameMachine'> $nameMachine </option>";		
		}
		echo "</select>";
	}
/*end*/


/*****
	Функция для отрисовки таблицы электриков с записями выбранными для распечатывания
	Дата создания 11.08.2017
	$nameSelectTable - имя таблицы, откуда происходит выборка
*****/
	function printElectricNote($link, $nameSelectTable, $paramArray, $arrayParamSelectOption){


		$newArray = [1,2,3,4,5,6];
		$newArrayTwo = [0,0,0,0,0,0];
		$newArrayThree = ['selectedDate', 'nameLine', 'shift', 'nameElectric', 
												'numberWokshop', 'lineCount'];
		
		
		/*echo "<pre>";
		echo "<p> Номер параметра, который выбрали </p>";
    	print_r($paramArray);
    	echo "</pre>";											

    	echo "<p> Массив, который приходит в функцию </p>";
		echo "<pre>";
    	print_r($arrayParamSelectOption);
    	echo "</pre>";	*/

		foreach ($paramArray as $valueOne) {
			if(in_array($valueOne, $newArray)){
				foreach ($newArray as $valueTwo) {
					if($valueTwo == $valueOne){
						$newArrayTwo[$valueTwo-1] = $valueOne;
					}
				}
			}
		}
		
		/*echo "<p> Массив параметров, которые выбрали </p>";
		echo "<pre>";
	    print_r($newArrayTwo);
	    echo "</pre>";*/

		foreach($newArrayTwo as $valueOne){
			if($valueOne != 0){
				$newArrayTwo[$valueOne-1] = $arrayParamSelectOption[$valueOne-1];
			}
		}

		$result = array_combine($newArrayThree, $newArrayTwo);

		/*echo "<p> Массив </p>";
		echo "<pre>";
	    print_r($newArrayTwo);
	    echo "</pre>";*/

		$startData = "2015-01-01";

		$arrayQuery = [];

		$query = "SELECT id, DATE_FORMAT(date_shift, '%d.%m.%y') as date_shift, shift, 
						name_engineer, number_workshop,	name_machine, caller_FIO, 
						call_time, end_of_work,	repair_time, breakdown, removal_breakdown, 
						used_teh_mat_values FROM $nameSelectTable ";
		$arrayQuery = [$query];

		foreach($result as $key => $value){
			if($value){
				switch($key){
					
					case 'selectedDate':
						 $finalDate = explode("/", $value);
						 if($finalDate[0] != 0 && $finalDate[1] != 0){
						 	$query = " date_shift >= '$finalDate[0]' and date_shift <= '$finalDate[1]'";
						 }elseif($finalDate[0] !=0 && $finalDate[1] == 0){
						 	$query = " date_shift ='$finalDate[0]'";
						 }elseif($finalDate[0] ==0 && $finalDate[1] != 0){
						 	$query = " date_shift >= '$startData' and  date_shift <= '$finalDate[1]'";
						 }
						 array_push($arrayQuery, $query);
						break;

					case 'shift':
						$query = " shift = '$value'";
						array_push($arrayQuery, $query);
						break;

					case 'lineCount':
						$query = " ORDER BY id DESC LIMIT $value";
						array_push($arrayQuery, $query);
						break;

					case 'nameElectric':
						$query = " name_engineer = '$value'";
						array_push($arrayQuery, $query);
						break;

					case 'numberWokshop':
						$query = " number_workshop = '$value'";
						array_push($arrayQuery, $query);
						break;

					case 'nameLine':
						$query = " name_machine = '$value'";
						array_push($arrayQuery, $query);
						break;
				}
			}
		}

  	/*echo "<pre>";
    print_r($arrayParamSelectOption);
    echo "</pre>";*/

	/*echo "<pre>";
    print_r($newArrayTwo);
    echo "</pre>";*/

    echo "<pre>";
    print_r($result);
    echo "</pre>";

    echo "<pre>";
    print_r($arrayQuery);
    echo "</pre>";

    $arrayQueryResult = array_diff($arrayQuery, array('', NULL, false));
    $queryBase = array_shift($arrayQueryResult);
    
    echo "<pre>";
    print_r($arrayQueryResult);
    echo "</pre>";

    if($result['lineCount'] && !$result['selectedDate'] && !$result['shift'] &&
    	!$result['nameElectric'] && !$result['numberWokshop'] && !$result['nameLine']){

    	$query = $queryBase . $arrayQuery[1];
    }else{
    	$query = $queryBase . "WHERE";
	    $countArrayQuery = count($arrayQueryResult) - 1;
	    foreach ($arrayQueryResult as $key => $value) {
	    	if($countArrayQuery == $key){
				$query .= $value;
			}else{
				$query .= $value . " and";
			 }
	    }
    }

    /*list($queryBase, $queryselectDate, $querySelectLine, $querySelectShift, $querySelectNameElectric, 
    		$querySelectNumberWorkshop, $querySelectnameMachine) = $arrayQuery;*/



    /*$query = $queryBase . "WHERE" . $queryselectDate . " and" . $querySelectShift . " and" . 
    		 $querySelectNameElectric . " and" . $querySelectNumberWorkshop .  " and" .
    		 $querySelectnameMachine . $querySelectLine;*/

    echo "<p>" . $query . "</p>";

	$resultQuery = mysqli_query($link, $query);

	$numberOfRows = mysqli_num_rows($resultQuery);

		while($numberOfRows){
			while( $row = mysqli_fetch_array($resultQuery) ){
				$numberId = $numberOfRows;
				
				//начало кода выделения цветом строки таблицы
				if($numberId%2 !=0){
					$background_tr = "#5FAFFF";
				}
				else{
					$background_tr = "#FF6969";
				}//конец кода выделения цветом строки таблицы
				
				$realId = $row['id'];
				echo "<tr style = 'background: $background_tr'>" .
							"<td><span>" . $numberId . "</span></td>" .
							"<td><span>" . $date_shift = $row['date_shift'] . "</span></td>" .
							"<td><span>" . $shift = $row['shift'] . "</span></td>" .
							"<td><span>" . $name_engineer = $row['name_engineer'] . "</span></td>" .
							"<td><span>" . $number_workshop = $row['number_workshop'] . "</span></td>" .
							"<td><span>" . $name_machine = $row['name_machine'] . "</span></td>" .
							"<td><span>" . $caller_FIO = $row['caller_FIO'] . "</span></td>" .
							"<td><span>" . $call_time = $row['call_time'] . "</span></td>" .
							"<td><span>" . $end_of_work = $row['end_of_work'] . "</span></td>" .
							"<td><span>" . $repair_time = $row['repair_time'] . "</span></td>" .
							"<td><span>" . $breakdown = $row['breakdown'] . "</span></td>" .
							"<td><span>" . $removal_breakdown = $row['removal_breakdown'] . "</span></td>" . 
							"<td><span>" . $used_teh_mat_values = $row['used_teh_mat_values'] . "</span></td>" .
							"<td> <a href = 'change_note.php?change_id=$real_id'> Изменить запись </a></td>" . 
					 "</tr>";
						 
					$numberOfRows--;
			}
		}
	}

/*end*/




	function check_variable($checked_var_one, $checked_var_two){ // проверка введенных данных
		$result_checked_one_var = trim(strip_tags($checked_var_one));
		$result_checked_two_var = trim(strip_tags($checked_var_two));
		$result = array($result_checked_one_var, $result_checked_two_var);
		return $result;
	}
	
	function login($var_one, $var_two, $var_three, $link_DB){ // функция присвоения переменным введенной информации через форму
		if(!empty($var_one) && !empty($var_two) && isset($var_three)){
			$checked_variable = check_variable($var_one, $var_two);
			$engineerLogin = $checked_variable[0];
			$engineerPassword = $checked_variable[1];
			mysqli_query($link_DB, "SET NAMES 'utf8'");
			$query = "SELECT login, sername, password, id_status FROM registered_users WHERE login = '$engineerLogin' AND password = '$engineerPassword'";
			$result_mysql = mysqli_query($link_DB, $query);
		
			if(mysqli_num_rows($result_mysql) == 1){
				while( $row = mysqli_fetch_array($result_mysql) ){
					$id = $row['id'];
					$login = $row['sername'];
					$password = $row['password'];
					$id_status = $row['id_status'];
					setcookie('user_id', $id, time() + (60*60*24*30));
					setcookie('user_login', $login, time() + (60*60*24*30));
					setcookie('id_status', $id_status, time() + (60*60*24*30));
					$general_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . 'general.php';
					header('Location: ' . $general_url);
					}	
				}
			else{
				echo "Не правильный логин или пароль";
			}
			
		}
		else{
			echo "Не введен логин или пароль";
		}
	}
	
	
		//-----Функция по выборке из БД с img для knowledge_base_view.php
	/*function select_knowledge_base($link){
		$count_note = 1;
		$query = "SELECT id, name_machine, sername_engineer, 
							DATE_FORMAT(date_add, '%d.%m.%y') as date_add FROM 
							knowledge_base ORDER BY id DESC";

		
		$result_mysql = mysqli_query($link, $query)
			or die("Не удается выполнить запрос выборки из БД " . mysqli_error($link));
		//$count_note = mysqli_num_rows($result_mysql); // Переменная для поля "№ записи"
		if(!mysqli_num_rows($result_mysql)){//если в  таблице нет записей выходим из функции
			echo "<span id = 'not_note'> Записей в таблице нет </span>";
			return 0;
		}
				
		//формирование таблицы
		echo "<table id = 'knowledge_base_table'> 
				<tr>
					<th> № записи </th>
					<th> Название линии </th> 
					<th> Автор </th> 
					<th> Запись </th> 
					<th> Фото </th>
					<th> Дата добавления </th> 
				</tr>";
			
			while($row = mysqli_fetch_array($result_mysql)){
				$img_name = $row['img'];
				if($img_name === "Фото нет"){
					
				}
				$img_name_explode = explode('_', $img_name);
				$img_name_td = $img_name_explode[0];
				$img_url = "/img_know_base/" . 
							$img_name;
							
				echo "<tr> 
						<td> $count_note </td>
						<td> {$row['name_machine']} </td>
						<td> {$row['sername_engineer']} </td>
						<td> {$row['message']} </td>
						<td>";
							if($img_name != "Фото нет"){
								echo "<img src = '{$img_url}' class = 'img'
										onClick = 'img_size(this)'/> </br>
										<span> $img_name_td </span>";
							}else{
								echo "<span> $img_name_td </span>";
							}
						echo "</td>
						<td> {$row['date_add']} </td>
					 </tr>";
				++$count_note;
			}
				
		echo "</table>";
	}*/
	//-----конец функции
	
	//-----Функция по выборке из БД для knowledge_base_view.php
	function select_knowledge_base($link, $param){
		$count_note = 1;
				
		if($param){
			$query = "SELECT id, name_machine, sername_engineer, 
								DATE_FORMAT(date_add, '%d.%m.%y') as date_add FROM 
								knowledge_base WHERE name_machine = '$param' ORDER BY id DESC";
		}
		
		$result_mysql = mysqli_query($link, $query)
			or die("Не удается выполнить запрос выборки из БД " . mysqli_error($link));
		//$count_note = mysqli_num_rows($result_mysql); // Переменная для поля "№ записи"
		if(!mysqli_num_rows($result_mysql)){//если в  таблице нет записей выходим из функции
			echo "<span id = 'not_note'> Записей по данной линии в таблице нет </span>";
			return 0;
		}
				
		//формирование таблицы
		echo "<table id = 'knowledge_base_table'> 
				<tr>
					<th> № записи </th>
					<th> Название линии </th> 
					<th> Автор </th> 
					<th> Дата добавления </th> 
				</tr>";
			
			while($row = mysqli_fetch_array($result_mysql)){						
				echo "<tr> 
						<td> $count_note </td>
						<td> {$row['name_machine']} </td>
						<td> {$row['sername_engineer']} </td>
						<td> {$row['date_add']} </td>
					 </tr>";
				++$count_note;
			}
				
		echo "</table>";
	}
	//-----конец функции
	
	//-----функция формирования списка для изменения или удаления записи в базе знаний
	function select_knowledge_base_change_delete($link){
		$query_select_knowledge_base = "SELECT id FROM knowledge_base ORDER BY id DESC";
		$result_select_knowledge_base = mysqli_query($link, $query_select_knowledge_base);
		$count_num_note = 1; //счетчик для вывода в выпадающем списке чисел по порядку, 
								//т.к. в БД id могут идти не по порядку (удаление, к примеру сбивает id)
		echo "<select size = '1' name = 'select_num_knowledge_note' 
			id = 'select_num_knowledge_note'>";
		//echo "<option value = '0'> Не использовать </option>";		
		while( $row = mysqli_fetch_array($result_select_knowledge_base) ){
			$real_id_note_knowledge_base = $row['id']; //реальный id тикета выбранный из БД
			echo "<option value = '$real_id_note_knowledge_base'> $count_num_note </option>";
			++$count_num_note;
			
		}
		echo "</select>";
	}
	//-----
	
	//-----Функция по выборке из БД, максимально число выбираемых элементов = 10
	//$link - для соединения с БД;
	// $name_select_table - название таблицы из которой производится выборка;
	//$elem_one по $elem_ten - поля таблицы, которые включаются в запрос;
	//$param_select - свободный параметр, использующийся в запросе
	function select_elem_from_DB($link, $name_select_table, $elem_one, $elem_two, 
		$elem_three, $elem_four, $elem_five, $elem_six, $elem_seven, $elem_eight, 
		$elem_nine, $elem_ten, $param_select, $param_select_two){
			
		if($elem_one && !$elem_two && !$elem_three && !$elem_four && !$elem_five &&
			!$elem_six && !$elem_seven && !$elem_eight && !$elem_nine && !$elem_ten){
			$count = 1;
		}
		
		if($elem_one && $elem_two && !$elem_three && !$elem_four && !$elem_five &&
			!$elem_six && !$elem_seven && !$elem_eight && !$elem_nine && !$elem_ten){
			$count = 2;
		}
		
		if($elem_one && $elem_two && $elem_three && !$elem_four && !$elem_five &&
			!$elem_six && !$elem_seven && !$elem_eight && !$elem_nine && !$elem_ten){
			$count = 3;
		}
		
		if($elem_one && $elem_two && $elem_three && $elem_four && !$elem_five &&
			!$elem_six && !$elem_seven && !$elem_eight && !$elem_nine && !$elem_ten){
			$count = 4;
		}
		
		if($elem_one && $elem_two && $elem_three && $elem_four && $elem_five &&
			!$elem_six && !$elem_seven && !$elem_eight && !$elem_nine && !$elem_ten){
			$count = 5;
		}
		
		if($elem_one && $elem_two && $elem_three && $elem_four && $elem_five &&
			$elem_six && !$elem_seven && !$elem_eight && !$elem_nine && !$elem_ten){
			$count = 6;
		}
		
		if($elem_one && $elem_two && $elem_three && $elem_four && $elem_five &&
			$elem_six && $elem_seven && !$elem_eight && !$elem_nine && !$elem_ten){
			$count = 7;
		}
		
		if($elem_one && $elem_two && $elem_three && $elem_four && $elem_five &&
			$elem_six && $elem_seven && $elem_eight && !$elem_nine && !$elem_ten){
			$count = 8;
		}
		
		if($elem_one && $elem_two && $elem_three && $elem_four && $elem_five &&
			$elem_six && $elem_seven && $elem_eight && $elem_nine && !$elem_ten){
			$count = 9;
		}
		
		if($elem_one && $elem_two && $elem_three && $elem_four && $elem_five &&
			$elem_six && $elem_seven && $elem_eight && $elem_nine && $elem_ten){
			$count = 10;
		}
		
		if($elem_one && $param_select && $param_select_two && !$elem_two && !$elem_three && !$elem_four && !$elem_five &&
			!$elem_six && !$elem_seven && !$elem_eight && !$elem_nine && !$elem_ten){
			$count = 11;
		}
		
		if($elem_one && $elem_two && !$elem_three && !$elem_four && !$elem_five &&
			!$elem_six && !$elem_seven && !$elem_eight && !$elem_nine && !$elem_ten &&
			!$param_select && !$param_select_two){
			$count = 12;
		}
		
		if($elem_one && $elem_two && !$elem_three && !$elem_four && !$elem_five &&
			!$elem_six && !$elem_seven && !$elem_eight && !$elem_nine && !$elem_ten &&
			$param_select && !$param_select_two){
			$count = 13;
		}
		
		if($elem_one && $elem_two && $elem_three && $elem_four && $elem_five &&
			$elem_six && $elem_seven && !$elem_eight && !$elem_nine && !$elem_ten &&
			$param_select && !$param_select_two){
			$count = 14;
		}
		
		switch($count){
			case 1:
				$query_select = "SELECT $elem_one FROM $name_select_table";
				break;
			case 2:
				$query_select = "SELECT $elem_one, $elem_two FROM $name_select_table
					WHERE $param_select";
				break;
			case 3:
				$query_select = "SELECT $elem_one, $elem_two, $elem_three FROM $name_select_table
					WHERE $param_select";
				break;
			case 4:
				$query_select = "SELECT $elem_one, $elem_two, $elem_three, $elem_four FROM $name_select_table";
				break;
			case 5:
				$query_select = "SELECT $elem_one, $elem_two, $elem_three, 
					$elem_four, $elem_five FROM $name_select_table";
				break;
			case 6:
				$query_select = "SELECT $elem_one, $elem_two, $elem_three, 
					$elem_four, $elem_five, $elem_six FROM $name_select_table";
				break;
			case 7:
				$query_select = "SELECT $elem_one, $elem_two, $elem_three, 
					$elem_four, $elem_five, $elem_six, $elem_seven FROM $name_select_table";
				break;
			case 8:
				$query_select = "SELECT $elem_one, $elem_two, $elem_three, 
					$elem_four, $elem_five, $elem_six, $elem_seven, $elem_eight FROM $name_select_table";
				break;
			case 9:
				$query_select = "SELECT $elem_one, $elem_two, $elem_three, 
					$elem_four, $elem_five, $elem_six, $elem_seven, $elem_eight, 
					$elem_nine FROM $name_select_table";
				break;
			case 10:
				$query_select = "SELECT $elem_one, $elem_two, $elem_three, 
					$elem_four, $elem_five, $elem_six, $elem_seven, $elem_eight, 
					$elem_nine, $elem_ten FROM $name_select_table";
				break;
			case 11:
				$query_select = "SELECT $elem_one, FROM $name_select_table
								WHERE $elem_one >=  '$param_select' and 
								$elem_one <= '$param_select_two' 
								ORDER BY id DESC";
				break;
			case 12:
				$query_select = "SELECT $elem_one, $elem_two FROM $name_select_table";
				break;
			case 13:
				$query_select = "SELECT $elem_one, $elem_two FROM 
													$name_select_table $param_select";
				break;
			case 14:
				$query_select = "SELECT $elem_one, $elem_two, $elem_three, $elem_four,
												$elem_five, $elem_six, $elem_seven FROM 
													$name_select_table WHERE $param_select";
				break;
		}
		
		$result_mysql = mysqli_query($link, $query_select)
			or die("Не удается выполнить выборку данных из БД " . mysqli_error($link));
	
		if( mysqli_num_rows($result_mysql) ){ 	
			$result_select_from_DB = $result_mysql;
			return $result_select_from_DB;
		}
		else{
			$function_message = 0;
			return $function_message;
		}
	}
	//----- конец функции
	
	
	//----Функция по созданию выпадающего списка для изменения или удаления тикета
	function number_ticket($link){
		$query_select_from_tickets_DB = "SELECT id, who_directed FROM tickets";
		$result_select_from_tickets_DB = mysqli_query($link, $query_select_from_tickets_DB);
		$count_num_tickets = 1; //счетчик для вывода в выпадающем списке чисел по порядку, 
								//т.к. в БД id могут идти не по порядку (удаление, к примеру сбивает id)
		echo "<select size = '1' name = 'select_num_tickets' id = 'select_num_tickets'>";
		echo "<option value = '0'> Не использовать </option>";		
		while( $row = mysqli_fetch_array($result_select_from_tickets_DB) ){
			$real_id_note_change = $row['id']; //реальный id тикета выбранный из БД
			$name_engineer_param_cookie = $row['who_directed']; //переменная, используемая для выбора
																//куки при удалении тикета для удаления
																//куки задания ИЭТ
			$result_param_teg_option = $real_id_note_change . "_" . $name_engineer_param_cookie;
			echo "<option value = '$result_param_teg_option'> $count_num_tickets </option>";
			$count_num_tickets++;
			
		}
		echo "</select>";
	}
	//-----конец функции
	
	//----Функция для изменения или удаления тикета
	function change_or_delete_ticket($link, $change, $delete, $change_ticket_message, 
								$change_ticket_id){
		if($change){
			$query_change_from_tickets_DB = "UPDATE tickets SET ticket_message = '$change_ticket_message'
												WHERE id = '$change_tikcet_id'";
			$result_change_from_tickets_DB = mysqli_query($link, $query_change_from_tickets_DB);
		}
		
		if($delete){
			$query_delete_from_tickets_DB = "DELETE from tickets
												WHERE id = '$qdelete_ticket_id'";
			$result_delete_from_tickets_DB = mysqli_query($link, $query_delete_from_tickets_DB);
		}
		
	}
	//-----конец функции
	
	
	//-----Функция по созданию выпадающего списка для выборки записей по названию линий
	function select_note_name_machine($link){
		$query_select_from_list_of_machines_DB = "SELECT name_machine FROM list_of_machines";
		$result_select_from_list_of_machines_DB = mysqli_query($link, $query_select_from_list_of_machines_DB);
		echo "<select size = '1' name = 'select_name_machine' id = 'select_name_machine'>";
		echo "<option value = '0'> Не использовать </option>";
		while( $row = mysqli_fetch_array($result_select_from_list_of_machines_DB) ){
				$name_machine = $row['name_machine'];
				echo "<option value = '$name_machine'> $name_machine </option>";		
		}
		echo "</select>";
	}
	//-----конец функции
	
	//-----Функция по созданию выпадающего списка названий линий
	function name_machine($link){
		$query_select_from_list_of_machines_DB = "SELECT name_machine FROM list_of_machines";
		$result_select_from_list_of_machines_DB = mysqli_query($link, $query_select_from_list_of_machines_DB);
		echo "<select size = '1' name = 'name_machine' id = 'name_machine'>";
		while( $row = mysqli_fetch_array($result_select_from_list_of_machines_DB) ){
				$name_machine = $row['name_machine'];
				echo "<option value = '$name_machine'> $name_machine </option>";		
		}
		echo "</select>";
	}
	//-----конец функции
	
	//-----Функция по созданию выпадающего списка названий линий в 
	//-----select_change_note_inc.php
	function select_name_machine($link, $id_or_class){
		$query_select_from_list_of_machines_DB = "SELECT name_machine FROM list_of_machines";
		$result_select_from_list_of_machines_DB = mysqli_query($link, $query_select_from_list_of_machines_DB);
		echo "<select size = '1' name = 'name_machine' class = '$id_or_class'>";
					echo "<option value = ''> </option>";
		while( $row = mysqli_fetch_array($result_select_from_list_of_machines_DB) ){
				$name_machine = $row['name_machine'];
				echo "<option value = '$name_machine'> $name_machine </option>";		
		}
		echo "</select>";
	}
	//-----конец функции
	
	//-----функция по созданию выпадающего списка для выборки из журнала по дежурному инженеру ЭТ
	function select_login_engineer_shift($link){
		$query_select_from_registration_DB = "SELECT sername FROM registered_users";
		$result_select_from_registration_DB = mysqli_query($link, $query_select_from_registration_DB);
		echo "<select size = '1' name = 'select_note_shift' id = 'select_note_shift'>";
		while( $row = mysqli_fetch_array($result_select_from_registration_DB) ){
				$engineer_name = $row['sername'];
				echo "<option value = '$engineer_name'> $engineer_name </option>";		
		}
		
		echo "<option value = '0'> Использовать поиск по дате </option>";
		echo "</select>";
	}
	//-----конец функции
	
	//----- функция по созданию выпадающего списка по зарегистрированному пользователю
	//----- последнее изменение 04.08.2017
	function select_login_engineer($link, $id_or_class, $id_status){
			if($id_status){
					$query_select_from_registration_DB = "SELECT sername FROM registered_users";	
			}else{
				$query_select_from_registration_DB = "SELECT sername FROM registered_users WHERE id_status = $id_status";
			}

			$result_select_from_registration_DB = mysqli_query($link, $query_select_from_registration_DB);
			echo "<select size = '1' name = 'select_login_engineer' 
							class = '$id_or_class' id='select'>";
			while( $row = mysqli_fetch_array($result_select_from_registration_DB) ){
					$engineer_name = $row['sername'];
					echo "<option value = '$engineer_name'> $engineer_name </option>";	
			}

			echo "</select>";
	}
	//-----конец функции по созданию выпадающего списка по зарегистрированному пользователю
	
	
	//----- функция по созданию выпадающего списка по дежурному инженеру ЭТ использующая
	//----- параметры для тега select. Функуия прменяется в select_change_note_inc.php
	//----- дата создания 17.05.15
	function createTagForm($link, $attributeName, $attributeClass, $changeId){
		$form_action_url = "/engine/update_journal.php?change_id=$changeId";
		echo "<form action = '$form_action_url' 
						method = 'POST' name = '$attributeName' class = '$attributeClass'>";
						
		createTagSelect($link, '1', 'elemFormAttributeName', 'elemFormToChangeNote');
					
		echo "</form>";
	}
	
	function createTagSelectToEngineerName($link, $attributeSize, $attributeName, $attributeClass){
		$query_select_from_registration_DB = "SELECT sername FROM registered_users";
		$result_select_from_registration_DB = mysqli_query($link, 
																		$query_select_from_registration_DB);
		
		echo "<select size = $attributeSize name = $attributeName 
									class = $attributeClass>";
				while( $row = mysqli_fetch_array($result_select_from_registration_DB) ){
					$engineer_name = $row['sername'];
					echo "<option value = '$engineer_name'> $engineer_name </option>";
				}
		echo "</select>";
	}
	
	function createTagSelectToShift($link, $size, $name, $id){
		echo "<select size = $size name = $name id = $id>
									<option value = 'Д'> Д </option>
									<option value = 'Н'> Н </option>
								</select>";
		
		/*echo "<input name = 'hidden_shift_note_inc' hidden = 'true'
									value = 'shift' id = 'hidden_shift_note_inc'>";
		echo "</form>";*/
	}
	
	function tdShift($link, $changeId){
		$formAttributeName = 'formNameToChangeNoteShift';
		$formAttributeClass = 'formClassToChangeNote';
		createTagForm($link, $formAttributeName, $formAttributeClass, $changeId);		
		/*echo "<input name = 'hidden_input_change_note_inc' hidden = 'true'
								value = 'name_engineer' id = 'hidden_input_change_note_inc'>";
		echo "</form>";*/
	}
	
	function tdNameEngineer($link, $changeId){
		$formAttributeName = 'formNameToChangeNoteNameEngineer';
		$formAttributeClass = 'formClassToChangeNote';
		createTagForm($link, $formAttributeName, $formAttributeClass, $changeId);
	}
	
//-----конец функции
	
	
	//----функция по созданию выпадающего списка для выборки из журнала по дате
	function select_date($link){
		$query_select_from_journal_of_breakdowns = "SELECT date_shift FROM journal_of_breakdowns";
		$result_select_from_journal_of_breakdowns = mysqli_query($link, $query_select_from_journal_of_breakdowns);
		echo "<select size = '1' name = 'select_date' id = 'select_date'>";
		while( $row = mysqli_fetch_array($result_select_from_journal_of_breakdowns) ){
				$date = $row['date_shift'];
				echo "<option value = '$date'> $date </option>";		
		}
		echo "</select>";
	}
	//-----конец функции
			
	//-----функция note_of_journal - по представлению таблицы, выборки из БД с параметрами
	//-----$link - переменная для соединения с БД;
	//-----$name_select_table - выбираем таблицу
	//-----$selection_note - переменная для сортировки записей по столбцам;
	//-----$journal_print - переменная-флаг, используемая для печати журнала без определенных (ненужных) столбцов;
	//-----$limits - перемення, тип - массив, содержащая в себе число выводимых строк в таблице;
	//-----$name_engineer_shift - переменная, содержащая в себе фамилию инженера ЭТ для выборки из таблицы по фамилии;
	//-----$select_date_shift и $select_date_shift_two - переменные для выборки по диапазону дат;
	function note_of_journal($link, $name_select_table, $selection_note, $journal_print, $limits, 
								$name_engineer_shift, $select_date_shift, 
								$select_date_shift_two, $name_machine){ 
		
		//require_once '/home/homeel/homeelectrical.ru/docs/engine/connectToDB.php';
		require_once $_SERVER['DOCUMENT_ROOT'] . '/engine/connectToDB.php';
				
		global $number_id;
		global $user;
	 	global $call_time; 
		global $number_workshop;
		global $name_machine;
		global $breakdown;
		global $removal_breakdown;
		global $used_teh_mat_values;
						
		
		switch($selection_note){

			case 0:
				$user_login =  $_COOKIE['user_login']; //кука, содержащая в себе логин вошедшего инженера ЭТ
				
				//----- блок кода с выборкой из таблицы по логину сменного инженера ЭТ и по дате или по 
				//----- 
		
				if(!empty($name_machine) ){// выборка по наименованию линии
					$query = "SELECT id, DATE_FORMAT(date_shift, '%d.%m.%y') 
							as date_shift, shift, 
							name_engineer, number_workshop,	name_machine, caller_FIO, 
							call_time, end_of_work,	repair_time, breakdown, 
							removal_breakdown, 
							used_teh_mat_values FROM $name_select_table WHERE 
							name_machine = '$name_machine'
							ORDER BY id DESC"; //LIMIT $limits
				}	
				
				if(!empty($name_engineer_shift) && $select_date_shift 
					&& $select_date_shift_two && !$name_machine){
					$query_select_from_registration = "SELECT sername FROM registered_users";
					$result_select_from_registration = mysqli_query($link, $query_select_from_registration);
					
					while( $row = mysqli_fetch_array($result_select_from_registration) ){
						$registered_user_name = $row['sername'];
						if($name_engineer_shift === $registered_user_name){
							$query = "SELECT id, DATE_FORMAT(date_shift, '%d.%m.%y') as date_shift, shift, 
									name_engineer, number_workshop,	name_machine, caller_FIO, 
									call_time, end_of_work,	repair_time, breakdown, removal_breakdown, 
									used_teh_mat_values FROM $name_select_table WHERE 
									name_engineer = '$name_engineer_shift' and date_shift >= '$select_date_shift'
									and date_shift <= '$select_date_shift_two'
									ORDER BY id DESC"; //LIMIT $limits
						}
					}
				}
				
				if($name_engineer_shift && !$select_date_shift && !$select_date_shift_two && !$name_machine){
					$query_select_from_registration = "SELECT sername FROM registered_users";
					$result_select_from_registration = mysqli_query($link, $query_select_from_registration);
					
					while( $row = mysqli_fetch_array($result_select_from_registration) ){
						$registered_user_name = $row['sername'];
						if($name_engineer_shift === $registered_user_name){
							$query = "SELECT id, DATE_FORMAT(date_shift, '%d.%m.%y') as date_shift, shift, 
									name_engineer, number_workshop,	name_machine, caller_FIO, 
									call_time, end_of_work,	repair_time, breakdown, removal_breakdown, 
									used_teh_mat_values FROM  $name_select_table WHERE 
									name_engineer = '$name_engineer_shift' ORDER BY id DESC";
						}
					}
				}
				
				if(!($name_engineer_shift) && $select_date_shift && $select_date_shift_two && !$name_machine){
					$query = "SELECT id, DATE_FORMAT(date_shift, '%d.%m.%y') as date_shift, shift, 
									name_engineer, number_workshop,	name_machine, caller_FIO, 
									call_time, end_of_work,	repair_time, breakdown, removal_breakdown, 
									used_teh_mat_values FROM  $name_select_table WHERE 
									date_shift >= '$select_date_shift' 
									and date_shift <= '$select_date_shift_two'
									ORDER BY id DESC";
				}
				
				if($limits && !$name_engineer_shift && 
					!$select_date_shift && !$select_date_shift_two && !$name_machine){
					
					//если используем только поле "Введите число просматриваемых 
					// записей" попадаем в эту конструкцию if					
					
					if(count($limits) != 1){// если в массиве не одна ячейка
						//значит используется поиск по отрезку от значения и 
						//до значения
											
						//$name_select_table = "journal_of_breakdowns"; //название таблицы - параметр для функции select_elem_from_DB
						$elem_one = "id"; //название поля в таблице - параметр для функции select_elem_from_DB
						$array_id_DB = select_elem_from_DB($link, 
							$name_select_table, $elem_one,
							0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
							
						$id = mysqli_num_rows($array_id_DB); //узнаем сколько строк в таблице
						$array_sum_id = array(); //массив для сопоставления реального id, который
						//находится в таблице с номером id, который вводит пользователь в 
						//поля поиска
						
						while($row = mysqli_fetch_array($array_id_DB)){
							$array_sum_id["$id"] = $row['id'];
							// получается, что в массиве первая запись 
							// "последнее значене массива" => "реальное значение id"
							// вторая запись "предпоследнее значене массива" => 
							// "реальное значение id" и так далее
							--$id;
						}
						
						//код для просмотра массива
						/*echo "<pre>";
						echo print_r($array_sum_id);
						echo "</pre>";*/
						
						foreach($array_sum_id as $key => $real_id){
							//если ключ в массиве равен введенному в первое поле
							//значению, то присваиваем реальный id переменной
							//$first_id
							if($key == $limits[0]){
								$first_id = $real_id;
							}
							
							//если ключ в массиве равен введенному во второе поле
							//значению, то присваиваем реальный id переменной
							//$second_id
							if($key == $limits[1]){
								$second_id = $real_id;
							}
						}
						
						//echo $first_id . "</br>";
						//echo $second_id . "</br>";
						
						//запрос для выборки из таблицы по диапазону введеных значений
						//номеров полей (id)
						$query = "SELECT id, DATE_FORMAT(date_shift, '%d.%m.%y') 
								as date_shift, shift, name_engineer, number_workshop, 
								name_machine, caller_FIO, call_time, end_of_work,
								repair_time, breakdown, removal_breakdown, 
								used_teh_mat_values FROM $name_select_table
								WHERE id <=  '$first_id' and id >= '$second_id' 
								ORDER BY id DESC";
					}
					
					//если число ячеек в массиве равно одной, то делаем запрос
					//выбирая из массива $limits первый элемент
					if(count($limits) == 1){
					$query = "SELECT id, DATE_FORMAT(date_shift, '%d.%m.%y') 
								as date_shift, shift, name_engineer, 
								number_workshop, name_machine, caller_FIO, 
								call_time, end_of_work,
								repair_time, breakdown, removal_breakdown, 
								used_teh_mat_values FROM $name_select_table 
								ORDER BY id DESC LIMIT $limits[0]";
					}
								
				}
				
				
				//----- конец блока кода с выборкой из таблицы по логину сменного инженера ЭТ и по дате						
				break;
			
			case 1:
				$query = "SELECT id, date_shift, shift, name_engineer, number_workshop, name_machine, caller_FIO, call_time, end_of_work,
							repair_time, breakdown, removal_breakdown, used_teh_mat_values FROM  
							$name_select_table ORDER BY id DESC LIMIT $limits";
				break;
				
			case 2:
				$query = "SELECT id, date_shift, shift, name_engineer, number_workshop, name_machine, caller_FIO, call_time, end_of_work,
							repair_time, breakdown, removal_breakdown, used_teh_mat_values FROM  
							$name_select_table ORDER BY id ASC LIMIT $limits";
				break;
			
			case 3:
				$query = "SELECT id, date_shift, shift, name_engineer, number_workshop, name_machine, caller_FIO, call_time, end_of_work,
							repair_time, breakdown, removal_breakdown, used_teh_mat_values FROM 
							$name_select_table ORDER BY date_shift DESC LIMIT $limits";
				break;
			
			case 4:
				$query = "SELECT id, date_shift, shift, name_engineer, number_workshop, name_machine, caller_FIO, call_time, end_of_work,
							repair_time, breakdown, removal_breakdown, used_teh_mat_values FROM  
							$name_select_table ORDER BY date_shift ASC LIMIT $limits";
				break;
			
			case 5:
				$query = "SELECT id, date_shift, shift, name_engineer, number_workshop, name_machine, caller_FIO, call_time, end_of_work,
							repair_time, breakdown, removal_breakdown, used_teh_mat_values FROM  
							'$name_select_table'ORDER BY shift DESC LIMIT $limits";
				break;
				
			case 6:
				$query = "SELECT id, date_shift, shift, name_engineer, number_workshop, name_machine, caller_FIO, call_time, end_of_work,
							repair_time, breakdown, removal_breakdown, used_teh_mat_values FROM  
							$name_select_table ORDER BY shift ASC LIMIT $limits";
				break;
				
			case 7:
				$query = "SELECT id, date_shift, shift, name_engineer, number_workshop, name_machine, caller_FIO, call_time, end_of_work,
							repair_time, breakdown, removal_breakdown, used_teh_mat_values FROM  
							$name_select_table ORDER BY number_workshop DESC LIMIT $limits";
				break;
			
			case 8:
				$query = "SELECT id, date_shift, shift, name_engineer, number_workshop, name_machine, caller_FIO, call_time, end_of_work,
							repair_time, breakdown, removal_breakdown, used_teh_mat_values FROM  
							name_select_table ORDER BY number_workshop ASC LIMIT $limits";
				break;
		}
		
		
		$result_mysql = mysqli_query($link, $query)
			or die("Не удается выполнить запрос выборки из БД " . mysqli_error($link));
		
		$array_id = array(); //массив для id с таблицы БД journal_of_breakdowns, так же сюда будут записываться	
							//number_id - для номеров в таблице на странице journal_of_breakdowns
		
		$count_note = mysqli_num_rows($result_mysql);
		
		if($selection_note == 0 || $selection_note == 1 || $selection_note == 3 || $selection_note == 4 || $selection_note == 5
			|| $selection_note == 6 || $selection_note == 7 || $selection_note == 8){
			
			$number_id = 1; // инициализация номера для таблицы на странице journal_of_breakdowns
			while( $row = mysqli_fetch_array($result_mysql) ){ //пробегаемся по таблице journal_of_breakdowns в БД и выводим значения 
				
				//начало кода выделения цветом строки таблицы
				if($number_id%2 !=0){
					$background_tr = "#5FAFFF";
				}
				else{
					$background_tr = "#FF6969";
				}//конец кода выделения цветом строки таблицы
				
				$real_id = $row['id'];
				echo "<tr style = 'background: $background_tr'>" .
						"<td><p>" . $number_id . "</p></td>" .
						"<td id = 'data_shift'><p>" . $date_shift = $row['date_shift'] . "</p></td>" .
						"<td><p>" . $shift = $row['shift'] . "</p></td>" .
						"<td><p>" . $name_engineer = $row['name_engineer'] . "</p></td>" .
						"<td><p>" . $number_workshop = $row['number_workshop'] . "</p></td>" .
						"<td><p>" . $name_machine = $row['name_machine'] . "</p></td>" .
						"<td><p>" . $caller_FIO = $row['caller_FIO'] . "</p></td>" .
						"<td><p>" . $call_time = $row['call_time'] . "</p></td>" .
						"<td><p>" . $end_of_work = $row['end_of_work'] . "</p></td>" .
						"<td><p>" . $repair_time = $row['repair_time'] . "</p></td>" .
						"<td><p>" . $breakdown = $row['breakdown'] . "</p></td>" .
						"<td><p id = 'removal_breakdown'>" . $removal_breakdown = $row['removal_breakdown'] . "</p></td>" .
						"<td><p id = 'used_teh_mat_values'>" . $used_teh_mat_values = $row['used_teh_mat_values'] . "</p></td>";
						
						if(!$journal_print){						
							echo "<td> <p id = 'change_note'> <a href = '/change_note.php?change_id=$real_id'> Изменить запись </a></p></td>";
						}
						
				echo "</tr>";
					 
				array_push($array_id, $row['id']);
				array_push($array_id, $number_id);
				$number_id++; // в зависимости от количества записей в таблице journal_of_breakdowns В БД будет такое же количество индексов
								// в таблице на странице journal_of_breakdowns.php
			}
		}
		
		if($selection_note == 2){
			while($count_note){
				while( $row = mysqli_fetch_array($result_mysql) ){
					$number_id = $count_note;
					
					//начало кода выделения цветом строки таблицы
					if($number_id%2 !=0){
						$background_tr = "#5FAFFF";
					}
					else{
						$background_tr = "#FF6969";
					}//конец кода выделения цветом строки таблицы
					
					$real_id = $row['id'];
					echo "<tr style = 'background: $background_tr'>" .
								"<td><span>" . $number_id . "</span></td>" .
								"<td><span>" . $date_shift = $row['date_shift'] . "</span></td>" .
								"<td><span>" . $shift = $row['shift'] . "</span></td>" .
								"<td><span>" . $name_engineer = $row['name_engineer'] . "</span></td>" .
								"<td><span>" . $number_workshop = $row['number_workshop'] . "</span></td>" .
								"<td><span>" . $name_machine = $row['name_machine'] . "</span></td>" .
								"<td><span>" . $caller_FIO = $row['caller_FIO'] . "</span></td>" .
								"<td><span>" . $call_time = $row['call_time'] . "</span></td>" .
								"<td><span>" . $end_of_work = $row['end_of_work'] . "</span></td>" .
								"<td><span>" . $repair_time = $row['repair_time'] . "</span></td>" .
								"<td><span>" . $breakdown = $row['breakdown'] . "</span></td>" .
								"<td><span>" . $removal_breakdown = $row['removal_breakdown'] . "</span></td>" . 
								"<td><span>" . $used_teh_mat_values = $row['used_teh_mat_values'] . "</span></td>" .
								"<td> <a href = 'change_note.php?change_id=$real_id'> Изменить запись </a></td>" . 
						 "</tr>";
							 
						array_push($array_id, $row['id']);
						array_push($array_id, $number_id);
						$count_note--;
				}
			}
		}
		
		return $array_id; //возвращаем массив содержащий в себе [$row['id'], $number_id, $row['id'], $number_id, ..]
						// чередующиеся индексы из таблицы БД и счетчика записей для таблицы на странице journal_of_breakdowns.php
	}
	//-----конец функции

	//----- 
	function count_line_troubleshooting($link, $name_machine){
		$query_select_from_list_of_machines_DB = "SELECT name_machine FROM journal_of_breakdowns WHERE name_machine = '$name_machine'";
		$result_select_from_list_of_machines_DB = mysqli_query($link, $query_select_from_list_of_machines_DB);
		
		while( $row = mysqli_fetch_array($result_select_from_list_of_machines_DB) ){
					$result_array[] = $row['name_machine'];
			}

		$count = count($result_array);
		$result = $count;
		//$result = count($result_select_from_list_of_machines_DB);
		return $result;
	}
	//-----
	//-----функция sort_name_machine_as_workshop для выборки из БД из таблицы list_of_machines наименований линий и сортировка линий по номерам цехов 
	function sort_name_machine_as_workshop($link, $param = 0){
		//echo $param;
		if($param === 0){
			$query_select_from_list_of_machines_DB = "SELECT name_machine, number_workshop FROM list_of_machines ORDER BY number_workshop";
			$result_select_from_list_of_machines_DB = mysqli_query($link, $query_select_from_list_of_machines_DB);
			$result_array = array('name_machine' => array(), 'number_workshop' => array(), 'count_line' => array());

			while( $row = mysqli_fetch_array($result_select_from_list_of_machines_DB) ){
					$result_array['name_machine'][] = $row['name_machine'];
					$result_array['number_workshop'][] = $row['number_workshop'];
					$result_array['count_line'][] = count_line_troubleshooting($link, $row['name_machine']);
			}
		}

		if($param === 1){ /****** выборка линий по первому цеху ******/
			$query_select_from_list_of_machines_DB = "SELECT name_machine FROM list_of_machines WHERE number_workshop = $param";
			$result_select_from_list_of_machines_DB = mysqli_query($link, $query_select_from_list_of_machines_DB);
			$result_array = array();
			while( $row = mysqli_fetch_array($result_select_from_list_of_machines_DB) ){
					$result_array[] = $row['name_machine'];
			}
		}

		if($param === 2){
			$query_select_from_list_of_machines_DB = "SELECT name_machine FROM list_of_machines WHERE number_workshop = $param";
			$result_select_from_list_of_machines_DB = mysqli_query($link, $query_select_from_list_of_machines_DB);
			$result_array = array();

			while( $row = mysqli_fetch_array($result_select_from_list_of_machines_DB) ){
					$result_array[] = $row['name_machine'];
			}
		}

		if($param === 3){
			$query_select_from_list_of_machines_DB = "SELECT name_machine FROM list_of_machines WHERE number_workshop = $param";
			$result_select_from_list_of_machines_DB = mysqli_query($link, $query_select_from_list_of_machines_DB);
			$result_array = array();

			while( $row = mysqli_fetch_array($result_select_from_list_of_machines_DB) ){
					$result_array[] = $row['name_machine'];
			}
		}

		return $result_array;
	}
	//-----конец функции


	
	//-----функция перевода с русских букв в транслит
	function lat($st){
		$char = array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','з'=>'z','и'=>'i',
					'й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t',' '=>'_',
					'у'=>'u','ф'=>'f','х'=>'h',"'"=>'','ы'=>'i','э'=>'e','ж'=>'zh','ц'=>'ts','ч'=>'ch','ш'=>'sh',
					'щ'=>'j','ь'=>'','ю'=>'yu','я'=>'ya','Ж'=>'ZH','Ц'=>'TS','Ч'=>'CH','Ш'=>'SH','Щ'=>'J',
					'Ь'=>'','Ю'=>'YU','Я'=>'YA','ї'=>'i','Ї'=>'Yi','є'=>'ie','Є'=>'Ye','А'=>'A','Б'=>'B','В'=>'V',
					'Г'=>'G','Д'=>'D','Е'=>'E','Ё'=>'E','З'=>'Z','И'=>'I','Й'=>'Y','К'=>'K','Л'=>'L','М'=>'M','Н'=>'N',
					'О'=>'O','П'=>'P','Р'=>'R','С'=>'S','Т'=>'T','У'=>'U','Ф'=>'F','Х'=>'H','Ъ'=>"'",'Ы'=>'I','Э'=>'E');
		$st = strtr($st,$char);
		return $st;
	}
	//-----конец функции

	//функция построения гистограмм
	function gistagramm_graph($width, $height, $color_one, $color_two, $color_three, $filename){
		//создание пустого изображения
		$img = imagecreatetruecolor($width, $height);
		
		//блок кода для установки цветов
		$background_color = imagecolorallocate($img, $color_one, $color_two, $color_three);
		//конец блока кода для установки цветов
		
		//заполнение фона
		imagefilledrectangle($img, 55, 10, $width, $height, $background_color);
		
		//сохранение гистограммы в файл
		imagepng($img, $filename);
		imagedestroy($img);
	}
	
	
	
	
?>