<?php
/* AJAX check  */
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    require "../includes/mvcAutoloader_ajax.php";
    $grab = new AjaxGrabber;

    switch ($_GET['operation']) {
        case 'year_income':
            $data2022 = array();
            for ($i=1; $i<=12 ; $i++) { 
                $income = 0;
                $data = $grab->ChartMonthlyIncome($_GET['data'], $i);
                foreach ($data as $value) {
                    $recordIncome = $value['sell_price']-$value['buy_price'];
                    $income=$income+$recordIncome;
                };
                $data2022[$i]=$income;
            }
            echo json_encode($data2022);
            break;
        
        default:
            # code...
            break;
    }
    
}
 ?>
