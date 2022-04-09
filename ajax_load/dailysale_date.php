<?php
/* AJAX check  */
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // Trimming sent value because ajax sent full date on reload
    $trimmed = substr($_GET['date'], 0, 10);

    require "../includes/dbh.inc.php";
    require "../model/GrabDataModel.model.php";
    require "../controller/PanelData.contr.php";
    $tableData = PanelData::TableDataWithDate($trimmed, 'dailysale');
}
 ?>
