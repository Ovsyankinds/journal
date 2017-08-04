<?php
  if( isset($_POST['printElectrictNote']) ){
    if(!empty($_POST['select_login_engineer']) && (!empty($_POST['selectedFirstDate']) || !empty($_POST['selectedLastDate']) )){
      $selectedElectric = trim(strip_tags( $_POST['select_login_engineer'] ));
      $selectedFirstDate = trim(strip_tags( $_POST['selectedFirstDate'] ));
      $selectedLastDate = trim(strip_tags( $_POST['selectedLastDate'] ));

      echo "Выбрали электрика $selectedElectric записи от $selectedFirstDate до $selectedLastDate";
    }else{
      echo "Ничего не выбрали";
    }
  } 
?>