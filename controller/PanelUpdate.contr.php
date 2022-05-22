<?php

class PanelUpdate extends UpdateDataModel{

    public function UpdateId($data, $table){
        if (is_numeric($data['id'])) {
            switch ($table) {
                case 'pages_sales':
                    if (is_numeric($data['sell_price']) && is_numeric($data['buy_price'])) {
                        $query = $this->UpdateById($data, 'sales');
                        return $this->UserReturn();
                    }
                    break;
                
                default:
                    // do nothig
                    break;
            }
        }
    }

}