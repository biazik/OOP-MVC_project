<?php
class ErrorView{

  public static function CriticError(){
    include 'templates/error.tmplt.php';
    // Tu możemy dodać jeszcze jakieś funkcje, czy jakieś domyślne wartości we funkcji, żeby ten widok errora trochę doszególnić xD?
  }
  function __destruct() {
  }

}
