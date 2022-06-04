<?php
/* AJAX check  */
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    require "../includes/mvcAutoloader_ajax.php";
    switch ($_GET['type']) {
        case 'load':
            PanelData::DeviceDataChange($_GET['data']);
            PanelData::TableData('devices');
            break;

        case 'update':
            $grab = new AjaxGrabber;
            $data = $grab->GrabAllById('devices', $_GET['id']);
            include "../templates/panels/edit_device.tmplt.php";
            break;

        case 'delete':
            $query =  new PanelDelete;
            $execute = $query->DeleteId($_GET['id'], 'devices');
            InfoView::InfoMessage($execute['type'], $execute['description']);
            break;
        
        default:
            # code...
            break;
    }
}
 ?>
