<?php
/* AJAX check  */
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

  if (isset($_GET['id']) AND isset($_GET['table']) AND isset($_GET['record'])) {
    if (!is_numeric($_GET['id'])) {
      echo "0";
    }
    else {
      $conn = new mysqli("localhost", "root", "", "combo_gsm");
      $sql = "SELECT `$_GET[record]` FROM `$_GET[table]` WHERE id=$_GET[id]";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      echo $row[$_GET['record']];
    }
  }
  else {
      echo "0";
  }

}
 ?>
