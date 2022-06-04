<?php
/* AJAX check  */
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    require "../includes/mvcAutoloader_ajax.php";
    switch ($_GET['type']) {

        case 'update':
            $grab = new AjaxGrabber;
            $data = $grab->GrabAllById('sale_categories', $_GET['id']);
            include "../templates/panels/edit_category.tmplt.php";
            break;

        case 'delete':
            $query =  new PanelDelete;
            $execute = $query->DeleteId($_GET['id'], 'sale_categories');
            InfoView::InfoMessage($execute['type'], $execute['description']);
            break;
        
        default:
            # code...
            break;
    }
}
 ?>
