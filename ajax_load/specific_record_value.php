<?php
/* AJAX check  */
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

  if (isset($_GET['id']) AND isset($_GET['table']) AND isset($_GET['record'])) {
    if (!is_numeric($_GET['id'])) {
      echo "0";
    }
    else {
      require "../includes/mvcAutoloader_ajax.php";
      // require "../includes/dbh.inc.php";
      // require "../model/GrabDataModel.model.php";
      // require "../controller/PanelData.contr.php";
      echo PanelData::SpecificRecord($_GET['record'], $_GET['table'], $_GET['id']);
    }
  }
  else {
      echo "0";
  }

}
 ?>
