<?php
/* AJAX check  */
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    require "../includes/mvcAutoloader_ajax.php";
    switch ($_GET['type']) {
        case 'load':
            PanelData::RepairDataChange($_GET['data']);
            PanelData::TableData('repairs');
            break;

        case 'update':
            $grab = new AjaxGrabber;
            $data = $grab->GrabAllById('repairs', $_GET['id']);
            include "../templates/panels/edit_repair.tmplt.php";
            break;

        case 'changeStatus':
            $grab = new AjaxGrabber;
            $update = new PanelUpdate;
            $data = $grab->GrabAllById('repairs', $_GET['id']);
            $execute = $update->UpdateId($data, 'repair_status');
            InfoView::InfoMessage($execute['type'], $execute['description']);
            break;

        case 'delete':
            $query =  new PanelDelete;
            $execute = $query->DeleteId($_GET['id'], 'repairs');
            InfoView::InfoMessage($execute['type'], $execute['description']);
            break;
            
        case 'view':
            $grab = new AjaxGrabber;
            $data = $grab->GrabAllById('repairs', $_GET['id']);
            InfoView::InfoMessage("success", "Podgląd wydruku przygotowany poprawnie. <a href='includes/generate_repair_document.php?id=$data[id]&number=$data[phone_number]&device=$data[name]&repair_description=$data[description]&price=$data[price]&password=$data[password]&date=$data[created_at]' target='_blank'>Zobacz PDF</a>");
        break;
        
        default:
            # code...
            break;
    }
}
 ?>
