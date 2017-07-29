<?php
	$cookie_user_login = $_COOKIE['user_login']; //сохраняем в переменную куку зашедшего пользователя в журнал
	$text_job_one = 'Для Вас есть задание'; //кусок текста для вывода сообщения о существующем задании
	$text_job_two = 'Для Всех есть задание'; //тоже кусок текса
	$user_job_message = ""; //инициализация переменной
	$all_user_job_message = ""; //инициализация переменной
	$array_rows_job = array(); //пустой массив для данных получаемых из БД
	$array_user = array(); //пустой массив для даных, которые будут сравниваться с кукой вошедшего в журнал, также служит для подсчета числа заданий для пользователя
	$array_all_user = array(); //пустой массив для данных, где хранятся записи "Для всех" и для подсчета чилса записей "Для всех"
	$i = 0; //счетчик для цикла while

	$job_user_directed = select_elem_from_DB($link, "tickets", "who_directed", 
							0,0,0,0,0,0,0,0,0,0,0); //функция для выборки иж таблицы по заданным параметрам, смотри в файле function.php
							
	if($job_user_directed){
		while($row = mysqli_fetch_array($job_user_directed)){
			$array_rows_job[] = $row['who_directed']; //массив со всеми данными из БД
		}
	}

	while($i < count($array_rows_job) ){ 
		//в цикле пробегаемся по массиву array_rows_job и сравниваем данные с кукой вошедшего пользователя
		//если совпадают значения куки и элемента массива, то заносим элемент массива в массив $array_user
		//если элементы равны "Для всех", то заносим все элементы в массив array_all_user
		if($array_rows_job[$i] == $cookie_user_login){
			$array_user[] = $array_rows_job[$i];
		}
		if($array_rows_job[$i] == 'Для всех'){
			$array_all_user[] = $array_rows_job[$i];
		}
		++$i;
	}

	$count_array_user = count($array_user); //подсчет элементов в массиве для вывода числа записей
	$count_array_all_user = count($array_all_user); //подсчет элементов в массиве для вывода числа записей
	if( !empty($array_user) ){ 
		//если массив не пустой, то записываем сообщение в переменную с числом записей для данного пользователя
		$user_job_message = "<a href = 'ticket_system_view.php' 
							class = 'job_message'>" . $text_job_one . "($count_array_user)" . "</a>";
	}
	if( !empty($array_all_user) ){
		//если массив не пустой, то записываем сообщение в переменную с числом записей для всех пользователей
		$all_user_job_message = "<a href = 'ticket_system_view.php' 
							class = 'job_message'>" . $text_job_two .  "($count_array_all_user)" . "</a>";
	}

	echo $user_job_message; //выводим сообщение
	echo $all_user_job_message ; //выводим сообщение		 
?>