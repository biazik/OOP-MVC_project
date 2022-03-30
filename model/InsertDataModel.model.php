<?php

class InsertDataModel extends Dbh{

  private $array;
  private $return;
  private $table;
  private $data;
  public $out;

  private function return($type){
    switch ($type) {
      case 'error':
        $this->out['type']="error";
        $this->out['description']="Rozpoznano naruszenie kodu.";
        break;
      case 'success':
        $this->out['type']="success";
        $this->out['description']="Poprawno dodano do bazy.";
        break;
      case 'warning':
        $this->out['type']="warning";
        $this->out['description']="Wystąpił problem z bazą danych.";
        break;
      case 'success_repair':
        $id = $this->data['id'];
        $number = $this->data['phone_number'];
        $device = $this->data['name'];
        $repair_description = $this->data['description'];
        $price = $this->data['price'];
        $date = date("Y-m-d");
        if (empty($this->data['password'])) {
          $password = "Brak";
        }
        else {
          $password = $this->data['password'];
        }
        $this->out['type']="success";
        $this->out['description']="Poprawno dodano do bazy. <a href='includes/generate_repair_document.php?id=$id&number=$number&device=$device&repair_description=$repair_description&price=$price&password=$password&date=$date' target='_blank'>WYDRUK</a>";
        break;

      default:
        // do nothing
        break;
    }
  }

  public function __construct($table, $array){
    switch ($table) {
      case 'sales':
      $this->CheckData('sales',$array);
        break;

      case 'repairs':
      $this->CheckData('repairs',$array);
        break;

      default:
        // do nothing
        break;
    }
  }

  private function LastID($data){
    $sql="SELECT `id` as 'LastID' FROM $data ORDER BY `id` DESC LIMIT 1;";
    $stmt = $this->connect()->query($sql);
    $data = $stmt -> fetch();
    return $data;
  }

  private function CheckData($table, $data){
    switch ($table) {
      case 'sales':
      $sc = $this->LastID('sale_categories');
      $pm = $this->LastID('payments');
      if ($data['category']<=$sc['LastID'] AND $data['payment']<=$pm['LastID']) {
        $this->InsertData('sales', $data);
      }
      else {
        $this->return('error');
      }
        break;

      case 'repairs':
      $di = $this->LastID('device_categories');
      if ($data['device_id']<=$di['LastID']) {
        $this->InsertData('repairs', $data);
      }
      else {
        $this->return('error');
      }
        break;

      default:
        // do nothing
        break;
    }
  }
  private function InsertData($table, $data){
    switch ($table) {
      case 'sales':
      $sql = "INSERT INTO sales (shop_id,	category_id,	payment_id,	description,	buy_price,	sell_price,	created_at) VALUES (?,?,?,?,?,?,?)";
      // $this->connect()->prepare($sql)->execute([$_SESSION['userData']['shop_id'], $data['category'], $data['payment'], $data['description'], $data['buy_price'], $data['sell_price'], date('Y-m-d')]);
      if ($this->connect()->prepare($sql)->execute([$_SESSION['userData']['shop_id'], $data['category'], $data['payment'], $data['description'], $data['buy_price'], $data['sell_price'], $data['date']])) {
        $this->return('success');
      }
      else {
        $this->return('warning');
      }
        break;

      case 'repairs':
      $this->data = $data;
      $sql = "INSERT INTO repairs (shop_id,	device_id, description,	phone_number,	password, name, price,	created_at) VALUES (?,?,?,?,?,?,?,?)";
      // $execute = $this->connect()->prepare($sql)->execute([$_SESSION['userData']['shop_id'], $data['device_id'], $data['description'], $data['phone_number'], $data['password'], $data['name'], $data['price'], date('Y-m-d')]);
      if ($this->connect()->prepare($sql)->execute([$_SESSION['userData']['shop_id'], $data['device_id'], $data['description'], $data['phone_number'], $data['password'], $data['name'], $data['price'], date('Y-m-d')])) {
        $last_id = $this->LastID('repairs');
        $this->data['id']=$last_id['LastID'];
        $this->return('success_repair');
      }
      else {
        $this->return('warning');
      }
        break;

      default:
        // do nothing
        break;
    }
  }

  public function userReturn(){
    return $this->out;
    exit();
  }

  function __destruct() {
  }
}
