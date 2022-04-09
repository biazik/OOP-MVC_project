<?php
class InfoView{

  public static function InfoMessage($type, $desc){
    switch ($type) {
      case 'error':
        $infoType="danger";
        $infoIcon="fas fa-ban";
        $infoHeader="Błąd";
        break;
      case 'info':
        $infoType="info";
        $infoIcon="fas fa-info";
        $infoHeader="Informacja";
        break;
      case 'success':
        $infoType="success";
        $infoIcon="fas fa-check";
        $infoHeader="Udało się";
        break;
      case 'warning':
        $infoType="warning";
        $infoIcon="fas fa-exclamation-triangle";
        $infoHeader="Ostrzeżenie";
        break;

      default:
        $infoType="info";
        $infoIcon="fas fa-question";
        $infoHeader="Informacja niezidentyfikowana";
        break;
    }
    echo '<div class="alert alert-'.$infoType.' alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon '.$infoIcon.'"></i> '.$infoHeader.'</h5>'.$desc.'</div>';
  }
  function __destruct() {
  }
}
