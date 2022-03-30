<?php

class GrabDataModel extends Dbh{

  protected function GrabData($data){
    $sql="SELECT * FROM $data";
    $stmt = $this->connect()->query($sql);
    $data = $stmt -> fetchAll();
    return $data;
  }

  protected function GrabUserData($data){
    $sql="SELECT * FROM users WHERE id=$data";
    $stmt = $this->connect()->query($sql);
    $data = $stmt->fetch();
    $_SESSION['userData'] = $data;
  }

  protected function GrabDataWithDate($data, $date){
    switch ($data) {
      case 'sales':
        $sql = "SELECT `sale_categories`.`name`, `sales`.`id`, `payments`.`name` as paymentName, `sales`.`buy_price`, `sales`.`sell_price`, `sales`.`description` FROM `sales` INNER JOIN `sale_categories` ON `sale_categories`.`id` = `sales`.`category_id` INNER JOIN `payments` ON `payments`.`id` = `sales`.`payment_id` WHERE `sales`.`created_at` = '$date'";
        // $sql="SELECT * FROM $data WHERE created_at='$date'";
        $stmt = $this->connect()->query($sql);
        $data = $stmt->fetchAll();
        return $data;
        break;
      
      default:
        # code...
        break;
    }
  }

  function __destruct() {
  }
}
