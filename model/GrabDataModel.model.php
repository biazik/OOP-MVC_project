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

  protected function GrabSpecificRecord($record, $table, $id){
    $sql="SELECT $record FROM $table WHERE id=$id";
    $stmt = $this->connect()->query($sql);
    $data = $stmt->fetch();
    return $data;
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
      
      case 'logs':
        $sql = "SELECT `logs`.`shop_id`, `logs_categories`.`name`, `logs`.`description`, `logs`.`refund_price`, `logs`.`created_at` FROM `logs` INNER JOIN `logs_categories` ON `logs_categories`.`id` = `logs`.`log_id` WHERE `logs`.`created_at` = '$date'";
        $stmt = $this->connect()->query($sql);
        $data = $stmt->fetchAll();
        return $data;
        break;
      
      default:
        # code...
        break;
    }
  }

  protected function GrabMonthRecords($table, $year ,$month){
    $sql="SELECT * FROM $table WHERE YEAR(created_at) = $year AND MONTH(created_at) = $month";
    $stmt = $this->connect()->query($sql);
    $data = $stmt->fetchAll();
    return $data;
  }

  protected function GrabDailyRecords($table, $year ,$month, $day){
    $sql="SELECT * FROM $table WHERE YEAR(created_at) = $year AND MONTH(created_at) = $month AND DAY(created_at) = $day";
    $stmt = $this->connect()->query($sql);
    $data = $stmt->fetchAll();
    return $data;
  }

  protected function GrabLogs($type, $year ,$month, $day){
    switch ($type) {
      case 'all':
        $sql="SELECT * FROM `logs` WHERE YEAR(created_at) = $year AND MONTH(created_at) = $month AND DAY(created_at) = $day";
        break;

      case 'insert':
        $sql="SELECT * FROM `logs` WHERE YEAR(created_at) = $year AND MONTH(created_at) = $month AND DAY(created_at) = $day AND log_id='1'";
        break;

      case 'update':
        $sql="SELECT * FROM `logs` WHERE YEAR(created_at) = $year AND MONTH(created_at) = $month AND DAY(created_at) = $day AND log_id='2'";
        break;

      case 'delete':
        $sql="SELECT * FROM `logs` WHERE YEAR(created_at) = $year AND MONTH(created_at) = $month AND DAY(created_at) = $day AND log_id='3'";
        break;

      case 'refund':
        $sql="SELECT * FROM `logs` WHERE YEAR(created_at) = $year AND MONTH(created_at) = $month AND DAY(created_at) = $day AND log_id='4'";
        break;
      
      default:
        # code...
        break;
    }
    $stmt = $this->connect()->query($sql);
    $data = $stmt->fetchAll();
    return $data;
  }

  function __destruct() {
  }
}
