<?php
class PanelInsert{

  public function InsertSell($category, $payment, $description, $buy_price, $sell_price, $date){
    if (is_numeric($category) AND is_numeric($payment) AND $buy_price>=0 AND $sell_price>=0) {
      $array = array(
        "category" => $category,
        "payment" => $payment,
        "description" => $description,
        "buy_price" => $buy_price,
        "sell_price" => $sell_price,
        "date" => $date
      );
      $insert = new InsertDataModel('sales', $array);
      $return = $insert->userReturn();
      $out['type']=$return['type'];
      $out['description']=$return['description'];
      return $out;
      exit();
    }
    else {
      $out['type']="warning";
      $out['description']="Wystąpił błąd. Sprawdź czy wszystko poprawnie wypełniłeś";
      return $out;
      exit();
    }

  }
  public function InsertRepair($category, $repair_description, $phone_number, $password, $device_name, $price){
    if (is_numeric($category) AND preg_match("/\d{3}[-]\d{3}[-]\d{3}/", $phone_number)) {
      $array = array(
        "device_id" => $category,
        "description" => $repair_description,
        "phone_number" => $phone_number,
        "password" => $password,
        "name" => $device_name,
        "price" => $price
      );
      $insert = new InsertDataModel('repairs', $array);
      $return = $insert->userReturn();
      $out['type']=$return['type'];
      $out['description']=$return['description'];
      return $out;
      exit();
    }
    else {
      $out['type']="warning";
      $out['description']="Wystąpił błąd. Sprawdź czy wszystko poprawnie wypełniłeś";
      return $out;
      exit();
    }
  }

  function __destruct() {
  }
}
