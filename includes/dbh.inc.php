<?php
class Dbh{
  private $host = "localhost";
  private $user = "root";
  private $pwd = "";
  private $dbName = "combo_gsm";

  protected function connect(){
    $data = "mysql:host=$this->host;dbname=$this->dbName";
    $pdo = new PDO($data, $this->user, $this->pwd);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
  }
  function __destruct() {
  }
}
