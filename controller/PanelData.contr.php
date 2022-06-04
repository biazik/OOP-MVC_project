<?php
class PanelData extends GrabDataModel{

  protected static $refundStatus = 0;
  protected static $repairsCatStatus = 1;
  protected static $devicesCatStatus = 1;

  public static function SelectOptions($data){
    $GrabDataModel = new GrabDataModel;
    $dbCat = $GrabDataModel->GrabData($data);
    foreach ($dbCat as $value) {
      echo "<option value='$value[id]'>$value[name]</option>";
    }
  }

  public static function SelectOptionsRole(){
    $GrabDataModel = new GrabDataModel;
    $dbCat = $GrabDataModel->GrabData('roles');
    foreach ($dbCat as $value) {
      echo "<option value='$value[id]'>$value[role], $value[description]</option>";
    }
  }

  public static function SpecificRecord($record, $table, $id){
    $GrabDataModel = new GrabDataModel;
    $echo =  $GrabDataModel->GrabSpecificRecord($record, $table, $id);
    echo $echo[$record];
  }
  
  public static function RepairDataChange($data){
    if ($data == 'in_repair') {
      self::$repairsCatStatus = 1;
    }
    if ($data == 'after_repair') {
      self::$repairsCatStatus = 2;
    }
  }
  
  public static function DeviceDataChange($data){
    if ($data == 'phones') {
      self::$devicesCatStatus = 1;
    }
    if ($data == 'all') {
      self::$devicesCatStatus = 0;
    }
  }

  public static function TableData($table){
    $GrabDataModel = new GrabDataModel;

    switch ($table) {
      case 'repairs':
        $dbCat = $GrabDataModel->GrabData('repairs');
        if (empty($dbCat)) {
          require_once "../view/infoView.view.php";
          InfoView::InfoMessage('info', 'Brak danych');
        }
        else {
        $i=1;
        echo <<<ECHO
          <table id="table" class="table table-striped table-valign-middle">
            <thead>
            <tr>
              <th style="width: 2%">No.</th>
              <th style="width: 12%">Nazwa urządzenia</th>
              <th style="width: 7%">Data</th>
              <th style="width: 10%">Numer telefonu</th>
              <th style="width: 41%">Opis naprawy</th>
              <th style="width: 10%">Kwota naprawy</th>
              <th style="width: 15%">Operacje</th>
            </tr>
            </thead>
            <tbody>
        ECHO;
        foreach ($dbCat as $value) {
          if ($value['status_id'] == self::$repairsCatStatus) {
            if ($value['status_id']==1) {
              // $editStatus = '<button class="btn btn-success" onclick="operations(changeStatus, $value[id])"><i class="fas fa-check" title="Oznacz jako naprawione"></i></button>';
              $editStatus = "<button class='btn btn-success' onclick=\"operations('changeStatus', $value[id])\"><i class='fas fa-angle-double-right' title='Oznacz jako naprawione'></i></button>";
            }
            else {
              $editStatus = "<button class='btn btn-success' onclick=\"operations('changeStatus', $value[id])\"><i class='fas fa-angle-double-left' title='Oznacz jako nienaprawione'></i></button>";
              // $editStatus = '<button class="btn btn-success" onclick="operations(changeStatus, $value[id])"><i class="fas fa-backspace" title="Oznacz jako naprawione"></i></button>';
            }
            echo <<<ECHO
              <tr class="data">
                <td>$i</td>
                <td>$value[name]</td>
                <td>$value[created_at]</td>
                <td>$value[phone_number]</td>
                <td>$value[description]</td>
                <td>$value[price]</td>
                <td>
                $editStatus
                <button class="btn btn-info" onclick="operations('view', $value[id])"><i class="fas fa-file" title="Podgląd PDF"></i></button>
                <button class="btn btn-info" onclick="operations('update', $value[id]); window.location.href='#EditHref'"><i class="fas fa-pen" title="Edytuj"></i></button>
                <button class="btn btn-danger" onclick="operations('delete', $value[id])"><i class="fas fa-trash" title="Usuń"></i></button>
                </td>
              </tr>
            ECHO;
            $i++;
          }
        }
        echo "</tbody></table>";
        }
        break;
      
      case 'users':
        $dbCat = $GrabDataModel->GrabData_InnerJoin('users');
        if (empty($dbCat)) {
          require_once "../view/infoView.view.php";
          InfoView::InfoMessage('info', 'Brak danych');
        }
        else {
        echo <<<ECHO
          <table id="table" class="table table-striped table-valign-middle">
            <thead>
            <tr>
              <th style="width: 5%">ID</th>
              <th style="width: 30%">Nazwa użytkownika</th>
              <th style="width: 30%">Rola użytkownika</th>
              <th style="width: 15%">Operacje</th>
            </tr>
            </thead>
            <tbody>
        ECHO;
        foreach ($dbCat as $value) {
            echo <<<ECHO
              <tr class="data">
                <td>$value[id]</td>
                <td>$value[username]</td>
                <td>$value[role]</td>
                <td>
                <button class="btn btn-info" onclick="operations('update', $value[id]); window.location.href='#EditHref'"><i class="fas fa-pen" title="Edytuj"></i></button>
                <button class="btn btn-danger" onclick="operations('delete', $value[id])"><i class="fas fa-trash" title="Usuń"></i></button>
                </td>
              </tr>
            ECHO;
        }
        echo "</tbody></table>";
        }
        break;
      
      case 'devices':
        $dbCat = $GrabDataModel->GrabData('devices');
        if (empty($dbCat)) {
          require_once "../view/infoView.view.php";
          InfoView::InfoMessage('info', 'Brak danych');
        }
        else {
        $i=1;
        echo <<<ECHO
          <table id="table" class="table table-striped table-valign-middle">
            <thead>
            <tr>
              <th style="width: 2%">No.</th>
              <th style="width: 12%">Nazwa urządzenia</th>
              <th style="width: 41%">Opis dodatkowy</th>
              <th style="width: 10%">Cena zakupu</th>
              <th style="width: 15%">Operacje</th>
            </tr>
            </thead>
            <tbody>
        ECHO;
        foreach ($dbCat as $value) {
          switch (self::$devicesCatStatus) {
            case '1':
                if ($value['device_id'] == 1) {
                  echo <<<ECHO
                    <tr class="data">
                      <td>$i</td>
                      <td>$value[name]</td>
                      <td>$value[description]</td>
                      <td>$value[buy_price]</td>
                      <td>
                      <button class="btn btn-info" onclick="operations('view', $value[id])"><i class="fas fa-file" title="Podgląd PDF"></i></button>
                      <button class="btn btn-info" onclick="operations('update', $value[id]); window.location.href='#EditHref'"><i class="fas fa-pen" title="Edytuj"></i></button>
                      <button class="btn btn-danger" onclick="operations('delete', $value[id])"><i class="fas fa-trash" title="Usuń"></i></button>
                      </td>
                    </tr>
                  ECHO;
                  $i++;
                }
              break;

            case '0':
                if ($value['device_id'] == 2 OR $value['device_id'] == 3 OR $value['device_id'] == 4) {
                  echo <<<ECHO
                    <tr class="data">
                      <td>$i</td>
                      <td>$value[name]</td>
                      <td>$value[description]</td>
                      <td>$value[buy_price]</td>
                      <td>
                      <button class="btn btn-info" onclick="operations('view', $value[id])"><i class="fas fa-file" title="Podgląd PDF"></i></button>
                      <button class="btn btn-info" onclick="operations('update', $value[id]); window.location.href='#EditHref'"><i class="fas fa-pen" title="Edytuj"></i></button>
                      <button class="btn btn-danger" onclick="operations('delete', $value[id])"><i class="fas fa-trash" title="Usuń"></i></button>
                      </td>
                    </tr>
                  ECHO;
                  $i++;
                }
              break;
            
            default:
              # code...
              break;
          }
        }
        echo "</tbody></table>";
        }
        break;
      
      case 'categories':
        $dbCat = $GrabDataModel->GrabData('sale_categories');
        if (empty($dbCat)) {
          require_once "../view/infoView.view.php";
          InfoView::InfoMessage('info', 'Brak danych');
        }
        else {
        $i=1;
        echo <<<ECHO
          <table id="table" class="table table-striped table-valign-middle">
            <thead>
            <tr>
              <th style="width: 12%">Nazwa kategorii</th>
              <th style="width: 41%">Opis dodatkowy</th>
              <th style="width: 10%">Cena zakupu</th>
              <th style="width: 10%">Cena sprzedaży</th>
              <th style="width: 15%">Operacje</th>
            </tr>
            </thead>
            <tbody>
        ECHO;
        foreach ($dbCat as $value) {
            echo <<<ECHO
                <tr class="data">
                  <td>$value[name]</td>
                  <td>$value[description]</td>
                  <td>$value[buy_price]</td>
                  <td>$value[sell_price]</td>
                  <td>
                  <button class="btn btn-info" onclick="operations('update', $value[id]); window.location.href='#EditHref'"><i class="fas fa-pen" title="Edytuj"></i></button>
                  <button class="btn btn-danger" onclick="operations('delete', $value[id])"><i class="fas fa-trash" title="Usuń"></i></button>
                  </td>
                </tr>
              ECHO;

        }
        echo "</tbody></table>";
        }
        break;
           
      default:
        // do nothing
        break;
    }
  }

  public static function TableDataWithDate($date, $panel){
    $GrabDataModel = new GrabDataModel;
    
    switch ($panel) {
      case 'dailysale':
      $dbCat = $GrabDataModel->GrabDataWithDate('sales', $date);
      if (empty($dbCat)) {
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
        echo "</tbody></table>";
      }
        break;

      case 'dailysaleDetailed':
      $dbCat = $GrabDataModel->GrabDataWithDate('sales', $date);
      if (empty($dbCat)) {
          require_once "../view/infoView.view.php";
          InfoView::InfoMessage('info', 'W tym dniu nie była prowadzona sprzedaż');
      }
      else {
        $i=1;
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
              <th>Operacje</th>
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
          echo <<<ECHO
            <tr>
            <td>$i</td>
            <td>$value[name]</td>
            <td>$value[description]</td>
            <td>$value[buy_price]zł</td>
            <td>$value[sell_price]zł</td>
            <td class="text-success">$earn zł <i class="$icon"></i></td>
            <td><button class="btn btn-danger" onclick="deleterecord($value[id])"><i class="fas fa-trash" title="Usuń"></i></button>
            <button class="btn btn-link"> </button>
            <button class="btn btn-success" onclick="editrecord($value[id]); window.location.href='#EditHref'"><i class="fas fa-pen" title="Edytuj"></i></button></td>
            </tr>

          ECHO;
          $i++;
        }
        echo "</tbody></table>";
      }
        break;

      default:
        // do nothing
        break;
    }
  }

  public static function MonthSum($type, $year, $month){
    $GrabDataModel = new GrabDataModel;
    $request =  $GrabDataModel->GrabMonthRecords('sales', $year ,$month);
    switch ($type) {
      case 'Income':
        $cash=0;
        foreach ($request as $value) {
          $oneIncome = $value['sell_price'] - $value['buy_price'];
          $cash = $cash + $oneIncome;
        }
        echo "$cash zł";
        break;

      case 'Card':
        $cash=0;
        foreach ($request as $value) {
          if ($value['payment_id']==2) {
            $cash = $cash + $value['sell_price'];
          }
        }
        echo "$cash zł";
        break;
      
      case 'Sell':
        $cash=0;
        foreach ($request as $value) {
            $cash = $cash + $value['sell_price'];
        }
        echo "$cash zł";
        break;
      
      case 'Buy':
        $cash=0;
        foreach ($request as $value) {
            $cash = $cash + $value['buy_price'];
        }
        echo "$cash zł";
        break;
      
      default:
        echo "Nieznana funkcja";
        break;
    }
  }

  public static function DaySum($type, $year ,$month, $day){
    $GrabDataModel = new GrabDataModel;
    $request =  $GrabDataModel->GrabDailyRecords('sales', $year ,$month, $day);
    $inCashStatus = $GrabDataModel->GrabData('cash_status');
      switch ($type) {
        case 'earnings':
            $cash=0;
            foreach ($request as $value) {
              $oneIncome = $value['sell_price'] - $value['buy_price'];
              $cash = $cash + $oneIncome;
            }
            echo "$cash zł";
          break;

        case 'refunds':
            $request =  $GrabDataModel->GrabLogs('refund', $year ,$month, $day);
            $cash=0;
            foreach ($request as $value) {
              $cash = $cash + $value['refund_price'];
            }
            echo "$cash zł";
            self::$refundStatus = $cash;
          break;

        case 'card':
            $cash=0;
            foreach ($request as $value) {
              if ($value['payment_id']==2) {
                $cash = $cash + $value['sell_price'];
              }
            }
            echo "$cash zł";
          break;

          case 'inCash':
            $cash=0;
            // $inCashStatus[0]['cash'];
            // self::$refundStatus
            foreach ($request as $value) {
              if ($value['payment_id']==1) {
                $cash = $cash + $value['sell_price'];
              }
            }
            $inCash = $inCashStatus[0]['cash'] + $cash - self::$refundStatus;
            echo "$inCash zł";
          break;
        
        default:
          echo "Nieznana funkcja";
          break;
      }
  }

  public static function InCash($type){
    $GrabDataModel = new GrabDataModel;
    switch ($type) {
      case 'StartValue':
        $data = $GrabDataModel->GrabData('cash_status');
        foreach ($data as $item) {
          if ($item['shop_id']=$_SESSION['userData']['shop_id']) {
            echo "$item[cash] zł";
          }
          else {
            echo "Błąd krytyczny";
          }
        }
        break;

      case 'EndDayValue':
        // po podliczeniu tj. kasa początkowa + sprzedaż gotówką - depozyty
        // items sold with cash
        $data1 = $GrabDataModel->GrabDataWithDate('sales', date("Y-m-d"));
        $dailySale = 0;
        foreach ($data1 as $value) {
          if ($value['payment_id']=1) {
            $dailySale = $dailySale + $value['sell_price'];
          }
        }
        // start cash
        $data2 = $GrabDataModel->GrabData('cash_status');
        $startMoney = 0;
        foreach ($data2 as $value) {
          if ($value['shop_id']=$_SESSION['userData']['shop_id']) {
            $startMoney = $value['cash'];
          }
          else {
            echo "Błąd krytyczny";
          }
        }
        // deposits
        $data3 = $GrabDataModel->GrabDataWithDate('logs', date("Y-m-d"));
        $dailyDeposit = 0;
        foreach ($data3 as $value) {
          if ($value['shop_id']=$_SESSION['userData']['shop_id'] && $value['log_id']=4) {
            $dailyDeposit = $dailyDeposit + $value['refund_price'];
          }
        }
        // final
        $EndDayValue = $startMoney + $dailySale - $dailyDeposit;
        echo "$EndDayValue zł";
        break;
      
      default:
        echo "Błędny typ danych";
        break;
    }
  } 

  public static function DepositInfo($type){
    $GrabDataModel = new GrabDataModel;
    switch ($type) {
      case 'depositValue':
        // $sql = "SELECT `refund_price` FROM `logs` WHERE `log_id`=4 AND `created_at` = CURDATE()";
        $data = $GrabDataModel->GrabLogs("refund", date("Y") ,date("m"), date("d"));
        $refundvalue=0;
        foreach ($data as $value) {
          $refundvalue = $refundvalue + $value['refund_price'];
        }
        echo "$refundvalue zł";
        break;
      
      default:
        echo "Błędny typ danych";
        break;
    }
  }

}
