	function valid_form_add_mess(form){
	}
	
	function foo(form_value){ // функция проверки
		if(form_value == ""){
			//var hidden_message = document.getElementById('hidden_message');
			//hidden_message.style.display = "block";
			//hidden_message.innerHTML = 'Не введено ничего, либо превышен допустимый порог символов';
			alert(5);
		}
	}
			
	function show_list_time(input_time){
		var date = new Date();
		var hours = date.getHours();
		var minutes = date.getMinutes();
		var time = hours + ":" + minutes;
		if(input_time.value == 0){
			input_time.value = time;
		}
	}
	
	function show_name_caller(input_name_caller){
		var set_name_caller = "оператор";
		if(input_name_caller.value == 0){
			input_name_caller.value = set_name_caller;
		}
	}
	
	var tag_table = document.getElementById('table'); //получили тег <table> с его содержимым
	var table_rows = tag_table.rows.length;
	var table_cells = 13;
					
	var back_th_td = document.getElementById('back_th_td');
	var li = back_th_td.getElementsByTagName('li');
		
	var table_th_1 = tag_table.rows[0].cells[0]; //получили 1 строку и 1 ячейку в этой строке, т.е. мы в <table><tr>
	var table_th_2 = tag_table.rows[0].cells[1]; //получили 1 строку и 1 ячейку в этой строке, т.е. мы в <table><tr>
	var table_th_3 = tag_table.rows[0].cells[2];
	var table_th_4 = tag_table.rows[0].cells[3];
	var table_th_5 = tag_table.rows[0].cells[4];
	var table_th_6 = tag_table.rows[0].cells[5];
	var table_th_7 = tag_table.rows[0].cells[6];
	var table_th_8 = tag_table.rows[0].cells[7];
	var table_th_9 = tag_table.rows[0].cells[8];
	var table_th_10 = tag_table.rows[0].cells[9];
	var table_th_11 = tag_table.rows[0].cells[10];
	var table_th_12 = tag_table.rows[0].cells[11];
	var table_th_13 = tag_table.rows[0].cells[12];		
	
	table_th_1.childNodes[3].onclick = hide_th_td_1; //получили 
	li[0].onclick = return_cells_1;
	
	table_th_2.childNodes[3].onclick = hide_th_td_2; //получили 
	li[1].onclick = return_cells_2;
	
	table_th_3.childNodes[3].onclick = hide_th_td_3; //получили 
	li[2].onclick = return_cells_3;
	
	table_th_4.childNodes[3].onclick = hide_th_td_4; //получили 
	li[3].onclick = return_cells_4;
			
	table_th_5.childNodes[3].onclick = hide_th_td_5; //получили 
	li[4].onclick = return_cells_5;
			
	table_th_6.childNodes[3].onclick = hide_th_td_6; //получили 
	li[5].onclick = return_cells_6;
			
	table_th_7.childNodes[3].onclick = hide_th_td_7; //получили 
	li[6].onclick= return_cells_7;
			
	table_th_8.childNodes[3].onclick = hide_th_td_8; //получили 
	li[7].onclick = return_cells_8;
	
	table_th_9.childNodes[3].onclick = hide_th_td_9; //получили 
	li[8].onclick = return_cells_9;
	
	table_th_10.childNodes[3].onclick = hide_th_td_10; //получили 
	li[9].onclick = return_cells_10;
			
	table_th_11.childNodes[3].onclick = hide_th_td_11; //получили 
	li[10].onclick = return_cells_11;
				
	table_th_12.childNodes[3].onclick = hide_th_td_12; //получили 
	li[11].onclick = return_cells_12;
	
	table_th_13.childNodes[3].onclick = hide_th_td_13; //получили 
	li[12].onclick = return_cells_13;
	
	
	function hide_th_td_1(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[0].style.display = "none";
		}
		li[0].style.display = "block";
	}
	
	function hide_th_td_2(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[1].style.display = "none";
		}
		li[1].style.display = "block";
	}
	
	function hide_th_td_3(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[2].style.display = "none";
		}
		li[2].style.display = "block";
	}
	
	function hide_th_td_4(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[3].style.display = "none";
		}
		li[3].style.display = "block";
	}
	
	function hide_th_td_5(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[4].style.display = "none";
		}
		li[4].style.display = "block";
	}
	
	function hide_th_td_6(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[5].style.display = "none";
		}
		li[5].style.display = "block";
	}
	
	function hide_th_td_7(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[6].style.display = "none";
		}
		li[6].style.display = "block";
	}
	
	function hide_th_td_8(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[7].style.display = "none";
		}
		li[7].style.display = "block";
	}
	
	function hide_th_td_9(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[8].style.display = "none";
		}
		li[8].style.display = "block";;
	}
			
	function hide_th_td_10(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[9].style.display = "none";
		}
		li[9].style.display = "block";;
	}
	
	function hide_th_td_11(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[10].style.display = "none";
		}
		li[10].style.display = "block";;
	}
	
	function hide_th_td_12(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[11].style.display = "none";
		}
		li[11].style.display = "block";;
	}
	
	function hide_th_td_13(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[12].style.display = "none";
		}
		li[12].style.display = "block";;
	}
	
	////////////////////////////////////
	
	function return_cells_1(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[0].style.display = "table-cell";
		}
		li[0].style.display = "none";
	}
	
	function return_cells_2(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[1].style.display = "table-cell";
		}
		li[1].style.display = "none";
	}
	
	function return_cells_3(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[2].style.display = "table-cell";
		}
		li[2].style.display = "none";
	}
	
			
	function return_cells_4(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[3].style.display = "table-cell";
		}
		li[3].style.display = "none";
	}
			
	function return_cells_5(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[4].style.display = "table-cell";
		}
		li[4].style.display = "none";
	}
	
			
	function return_cells_6(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[5].style.display = "table-cell";
		}
		li[5].style.display = "none";
	}
	
			
	function return_cells_7(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[6].style.display = "table-cell";
		}
		li[6].style.display = "none";
	}
	
			
	function return_cells_8(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[7].style.display = "table-cell";
		}
		li[7].style.display = "none";
	}
	
			
	function return_cells_9(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[8].style.display = "table-cell";
		}
		li[8].style.display = "none";
	}
	
			
	function return_cells_10(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[9].style.display = "table-cell";
		}
		li[9].style.display = "none";
	}
	
	function return_cells_11(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[10].style.display = "table-cell";
		}
		li[10].style.display = "none";
	}
	
	function return_cells_12(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[11].style.display = "table-cell";
		}
		li[11].style.display = "none";
	}
	
	function return_cells_13(){
		for(var i = 0; i < table_rows; i++){
			tag_table.rows[i].cells[12].style.display = "table-cell";
		}
		li[12].style.display = "none";
	}
	
	
	/*
		Функции для таблицы в change_note.php для изменения одного из значений в таблице
		кликая на значение, которое нужно изменить.
	*/
	function changeDateShift(){				
		var getClassTableTd = document.getElementsByClassName('elemFormChangeNote');
		getClassTableTd[1].style.display = "block";
		var getForm = document.getElementById('form');
		getClassTableTd[1].focus();
		getClassTableTd[1].onblur = function(){
			getForm.submit();
		}
	}
		
		function changeShift(){
			var getClassTableTd = document.getElementsByClassName('elemFormChangeNote');
			getClassTableTd[2].style.display = "block";
			var getForm = document.getElementById('form');
			getClassTableTd[2].focus();
			getClassTableTd[2].onblur = function(){
				getForm.submit();
			}
		}
		
		function changeNameEngineer(){
			var getClassTableTd = document.getElementsByClassName('elemFormChangeNote');
			getClassTableTd[3].style.display = "block";
			var getForm = document.getElementById('form');
			getClassTableTd[3].focus();
			getClassTableTd[3].onblur = function(){
				getForm.submit();
			}	
		}
		
		function changeNumberWorkshop(){
			var getClassTableTd = document.getElementsByClassName('elemFormChangeNote');
			getClassTableTd[4].style.display = "block";
			var getForm = document.getElementById('form');
			getClassTableTd[4].focus();
			getClassTableTd[4].onblur = function(){
				getForm.submit();
			}	
		}
		
		function changeNameMashine(){
			var getClassTableTd = document.getElementsByClassName('elemFormChangeNote');
			getClassTableTd[5].style.display = "block";
			var getForm = document.getElementById('form');
			getClassTableTd[5].focus();
			getClassTableTd[5].onblur = function(){
				getForm.submit();
			}	
		}
		
		function changeCallerFIO(){
			var getClassTableTd = document.getElementsByClassName('elemFormChangeNote');
			getClassTableTd[6].style.display = "block";
			var getForm = document.getElementById('form');
			getClassTableTd[6].focus();
			getClassTableTd[6].onblur = function(){
				getForm.submit();
			}	
		}
		
		function changeCallTime(){
			var getClassTableTd = document.getElementsByClassName('elemFormChangeNote');
			getClassTableTd[7].style.display = "block";
			var getForm = document.getElementById('form');
			getClassTableTd[7].focus();
			getClassTableTd[7].onblur = function(){
				getForm.submit();
			}	
		}
		
		function changeEndOfWork(){
			var getClassTableTd = document.getElementsByClassName('elemFormChangeNote');
			getClassTableTd[8].style.display = "block";
			var getForm = document.getElementById('form');
			getClassTableTd[8].focus();
			getClassTableTd[8].onblur = function(){
				getForm.submit();
			}	
		}
				
		function changeUsedTehMatValues(){
			var getClassTableTd = document.getElementsByClassName('elemFormChangeNote');
			getClassTableTd[12].style.display = "block";
			var getForm = document.getElementById('form');
			getClassTableTd[12].focus();
			getClassTableTd[12].onblur = function(){
				getForm.submit();
			}											
		}
		
		function createForm(tagSpan, changeId){
			var form = document.createElement('form');
			form.name = 'change_note';
			form.id = 'form';
			form.method = 'post';
			form.action = 'change_note.php?change_id=' + changeId;
			tagSpan.appendChild(form);
		}
		
		function sendForm(tagSpan, changeId, hiddenTagId){
			var getForm = document.getElementById('login_engineer_form');
			hiddenTagId.focus();
			hiddenTagId.onblur = function(){
				getForm.submit();
			}
		}
		
		function createInput(tagSpan, inputId, inputValue, inputHiddenValue, changeId){
			var input = document.createElement('input');
			var inputHidden = document.createElement('input');
			input.id = inputId;
			input.name = 'inputParametrOne';
			input.value = inputValue;
			inputHidden.name = 'inputParametrTwo';
			inputHidden.value = inputHiddenValue;
			inputHidden.hidden = 'true';
			var getForm = document.getElementById('form');
			getForm.appendChild(input);
			getForm.appendChild(inputHidden);
			var getInput = document.getElementById(inputId);
			getInput.focus();
			getInput.onblur = function(){
				getForm.submit();
			}
		}
		
		function changeNote(tagSpan, changeId){ // главная функция, использующаяся 
			// в select_change_note_inc.php как обработчик события onclick на нажатой
			// ячейке таблицы для изменения значения ячейки
			// параметр tagSpan - в onclick передается this
		
			var tagSpanNameId = tagSpan.getAttribute('id'); // берем значение атрибута id на
																											//кликнутом элементе
			switch(tagSpanNameId){ //выбираем на основании значения id'шника какую функцию
														 // подккючать
				case 'change_date_shift':
					changeDateShift(tagSpan, changeId);
					break;
				
				case 'change_shift':
					changeShift(tagSpan, changeId);
					break;
				
				case 'name_engineer':
					changeNameEngineer(tagSpan, changeId);
					break;
				
				case 'number_workshop':
					changeNumberWorkshop(tagSpan, changeId);
					break;
					
				case 'name_machine':
					changeNameMashine(tagSpan, changeId);
					break;
					
				case 'caller_FIO':
					changeCallerFIO(tagSpan, changeId);
					break;
				
				case 'call_time':
					changeCallTime(tagSpan, changeId);
					break;changeEndOfWork
				
				case 'end_of_work':
					changeEndOfWork(tagSpan, changeId);
					break;
								
				case 'used_teh_mat_values':
					changeUsedTehMatValues(tagSpan, changeId);
					break;
			}
		}
		
		
		
