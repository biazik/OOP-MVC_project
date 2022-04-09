<?php
class PanelData extends GrabDataModel{

  public static function SelectOptions($data){
    $GrabDataModel = new GrabDataModel;
    $dbCat = $GrabDataModel->GrabData($data);
    foreach ($dbCat as $value) {
      echo "<option value='$value[id]'>$value[name]</option>";
    }
  }

  public static function SpecificRecord($record, $table, $id){
    $GrabDataModel = new GrabDataModel;
    $echo =  $GrabDataModel->GrabSpecificRecord($record, $table, $id);
    echo $echo[$record];
  }
  
  public static function TableDataWithDate($date, $panel){
    $GrabDataModel = new GrabDataModel;
    
    switch ($panel) {
      case 'dailysale':
      $dbCat = $GrabDataModel->GrabDataWithDate('sales', $date);
      if (empty($dbCat)) {
          // echo <<<ECHO
          //   <tr>
          //   <td></td>
          //   <td>Dziś nie wprowadziłeś sprzedaży</td>
          //   <td></td>
          //   <td></td>
          //   <td></td>
          //   <td></td>
          //   </tr>
          // ECHO;
          require_once "../view/infoView.view.php";
          InfoView::InfoMessage('info', 'Dziś nie wprowadziłeś sprzedaży');
      }
      else {
        $i=1;
        $daily_earn=0;
        echo <<<ECHO
          <table class="table table-striped table-valign-middle">
            <thead>
            <tr>
              <th style="width: 1%;">No.</th>
              <th>Produkt</th>
              <th>Cena zakupu</th>
              <th>Cena sprzedaży</th>
              <th>Zysk</th>
            </tr>
            </thead>
            <tbody>
        ECHO;
        foreach ($dbCat as $value) {
          if ($value['paymentName'] == "Gotówka") {
            $icon = "fas fa-coins";
          }
          if ($value['paymentName'] == "Karta") {
            $icon = "fas fa-credit-card";
          }
          $earn = $value['sell_price']-$value['buy_price'];
          $daily_earn = $daily_earn + $earn;
          echo <<<ECHO
            <tr>
            <td>$i</td>
            <td>$value[name]</td>
            <td>$value[buy_price]zł</td>
            <td>$value[sell_price]zł</td>
            <td class="text-success">$earn zł <i class="$icon"></i></td>
            </tr>
          ECHO;
          $i++;
        }
        echo <<<ECHO
          </tbody>
          <tr>
            <th></th>
            <th>Zysk dzienny:</th>
            <th class="text-success">$daily_earn zł</th>
            <th></th>
            <td></td>
          </tr>
          </table>
        ECHO;
      }
        break;

      default:
        // do nothing
        break;
    }
  }

}
