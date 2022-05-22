<?php
/* AJAX check  */
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    require "../includes/mvcAutoloader_ajax.php";
    // $_POST['editData'] = $_POST['id'];
    $grab = new AjaxGrabber;
    $data = $grab->GrabAllById('sales', $_POST['id']);
    $arr = array (
        "id" => $data['id'],
        "category_id" => $data['category_id'],
        "payment_id" => $data['payment_id'],
        "description" => $data['description'],
        "buy_price" => $data['buy_price'],
        "sell_price" => $data['sell_price'],
        "created_at" => $data['created_at'],
    );
    echo json_encode($arr);
}
 ?>
