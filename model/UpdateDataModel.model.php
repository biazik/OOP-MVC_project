<?php 

class UpdateDataModel extends Dbh{

    private $return;
    private $out;

  private function return($type){
    switch ($type) {
      case 'error':
        $this->out['type']="error";
        $this->out['description']="Rozpoznano naruszenie kodu.";
        break;
      case 'success':
        $this->out['type']="success";
        $this->out['description']="Poprawno zedytowano rekord.";
        break;
      case 'warning':
        $this->out['type']="warning";
        $this->out['description']="Wystąpił problem z bazą danych.";
        break;

      default:
        // do nothing
        break;
    }
  }

  public function UserReturn(){
      return $this->out;
  }

    protected function UpdateById($data, $table){
        switch ($table) {
            case 'sales':
                $sql = "UPDATE `sales` SET `description` = '$data[description]', `buy_price` = '$data[buy_price]', `sell_price` = '$data[sell_price]' WHERE `id`='$data[id]'";
                $execute = $this->connect()->query($sql);
                if ($execute) {
                    $this->return('success');
                }
                else {
                    $this->return('warning');
                }
                break;

            case 'sale_categories':
                $sql = "UPDATE `sale_categories` SET `description` = '$data[description]', `buy_price` = '$data[buy_price]', `sell_price` = '$data[sell_price]' WHERE `id`='$data[id]'";
                $execute = $this->connect()->query($sql);
                if ($execute) {
                    $this->return('success');
                }
                else {
                    $this->return('warning');
                }
                break;

            case 'repairs':
                $sql = "UPDATE `repairs` SET `description` = '$data[description]' WHERE `id`='$data[id]'";
                $execute = $this->connect()->query($sql);
                if ($execute) {
                    $this->return('success');
                }
                else {
                    $this->return('warning');
                }
                break;

            case 'devices':
                $sql = "UPDATE `devices` SET `description` = '$data[description]' WHERE `id`='$data[id]'";
                $execute = $this->connect()->query($sql);
                if ($execute) {
                    $this->return('success');
                }
                else {
                    $this->return('warning');
                }
                break;

            case 'users':
                $sql = "UPDATE `users` SET `password` = '$data[password]', `username` = '$data[username]' WHERE `id`='$data[id]'";
                $execute = $this->connect()->query($sql);
                if ($execute) {
                    $this->return('success');
                }
                else {
                    $this->return('warning');
                }
                break;

            case 'repair_status':
                $sql = "UPDATE `repairs` SET `status_id` = '$data[status_id]' WHERE `id`='$data[id]'";
                $execute = $this->connect()->query($sql);
                if ($execute) {
                    $this->return('success');
                }
                else {
                    $this->return('warning');
                }
                break;
            
            default:
                // do nothing
                break;
        }
        if ($this->connect()->query($sql)) {
            return "success";
        }
        else {
            return "false";
        }
    }

}