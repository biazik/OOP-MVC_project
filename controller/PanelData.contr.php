<?php
class PanelData extends GrabDataModel{

  public static function SelectOptions($data){
    $GrabDataModel = new GrabDataModel;
    $dbCat = $GrabDataModel->GrabData($data);
    foreach ($dbCat as $value) {
      echo "<option value='$value[id]'>$value[name]</option>";
    }
  }
  
  public static function TableDataWithDate($date, $panel){
    $GrabDataModel = new GrabDataModel;
    
    switch ($panel) {
      case 'dailysale':
      $dbCat = $GrabDataModel->GrabDataWithDate('sales','2022-03-21');
      if (empty($dbCat)) {
          echo <<<ECHO
            <tr>
            <td></td>
            <td>Dziś nie wprowadziłeś sprzedaży</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
          ECHO;
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
              <th>Opis</th>
              <th>Cena zakupu</th>
              <th>Cena sprzedaży</th>
              <th>Zysk</th>
              <th style="text-align: right">Operacje</th>
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
            <td><form action="" method="post" class="moreinfo"><input type="hidden" name="desc" value="$value[description]"/><button type="submit" class="btn btn-tool"><i class="fas fa-eye"></i></button></form></td>
            <td>$value[buy_price]zł</td>
            <td>$value[sell_price]zł</td>
            <td class="text-success">$earn zł <i class="$icon"></i></td>
            <td style="text-align: right">
              <button type="button" class="btn btn-tool"><i class="fas fa-pen"></i></button>
              <button type="button" class="btn btn-tool"><i class="fas fa-trash"></i></button>
            </td>
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
            <td></td>
            <td></td>
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
