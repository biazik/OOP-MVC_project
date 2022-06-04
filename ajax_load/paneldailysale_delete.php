<?php
/* AJAX check  */
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    require "../includes/mvcAutoloader_ajax.php";
    // require "../includes/dbh.inc.php";
    // require "../model/DeleteDataModel.model.php";
    // require "../controller/PanelDelete.contr.php";
    // require "../view/infoView.view.php";
    // $deleteRecord = PanelDelete::DeleteId($_GET[id], 'sales');
    // $tableData = PanelData::TableDataWithDate($trimmed, 'dailysaleDetailed');
    $query =  new PanelDelete;
    $execute = $query->DeleteId($_GET['id'], 'sales');
    InfoView::InfoMessage($execute['type'], $execute['description']);
}
 ?>
