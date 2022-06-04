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
                    
                case 'sale_categories':
                    if (is_numeric($data['sell_price']) && is_numeric($data['buy_price'])) {
                        $query = $this->UpdateById($data, 'sale_categories');
                        return $this->UserReturn();
                    }
                    break;
                    
                case 'repairs':
                    $query = $this->UpdateById($data, 'repairs');
                    return $this->UserReturn();
                    break;
                    
                case 'devices':
                    $query = $this->UpdateById($data, 'devices');
                    return $this->UserReturn();
                    break;
                    
                case 'repair_status':
                    $arr = array();
                    if ($data['status_id'] == 1) {
                        $arr['status_id']=2;
                    }
                    else {
                        $arr['status_id']=1;
                    }
                    $arr['id']=$data['id'];
                    $query = $this->UpdateById($arr, 'repair_status');
                    return $this->UserReturn();
                    break;

                case 'users':
                    $query = $this->UpdateById($data, 'users');
                    return $this->UserReturn();
                    break;
                
                default:
                    // do nothig
                    break;
            }
        }
    }

}