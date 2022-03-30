<?php

class InsertDataModel extends Dbh{

  private $data;
  private $return;

  public function __construct($category, $payment, $description, $buy_price, $sell_price){
    $this->data=array(
      "category" => $category,
      "payment" => $payment,
      "description" => $description,
      "buy_price" => $buy_price,
      "sell_price" => $sell_price
    );
    $this->CheckData();
  }

  private function LastID($data){
    $sql="SELECT `id` as 'LastID' FROM $data ORDER BY `id` DESC LIMIT 1;";
    $stmt = $this->connect()->query($sql);
    $data = $stmt -> fetch();
    return $data;
  }

  private function CheckData(){
    $sc = $this->LastID('sale_categories');
    $pm = $this->LastID('payments');
    if ($this->data['category']<=$sc['LastID'] AND $this->data['payment']<=$pm['LastID']) {
      $this->InsertData();
    }
    else {
      $out['type']="error";
      $out['description']="Rozpoznano naruszenie kodu";
      return $out;
      exit();
    }
  }
    private function InsertData(){
      $sql = "INSERT INTO sales (shop_id,	category_id,	payment_id,	description,	buy_price,	sell_price,	created_at) VALUES (?,?,?,?,?,?,?)";
      $execute = $this->connect()->prepare($sql)->execute([$_SESSION['userData']['shop_id'], $this->data['category'], $this->data['payment'], $this->data['description'], $this->data['buy_price'], $this->data['sell_price'], date('Y-m-d')]);
      if ($execute) {
        $this->return['type']="success";
        $this->return['description']="Sprzedaż została wstawiona do bazy";
      }
      else {
        $this->return['type']="warning";
        $this->return['description']="Wystąpił błąd";
      }
    }

    public function Return(){
      return $this->return;
    }

  function __destruct() {
  }
}
