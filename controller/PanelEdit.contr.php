<?php

class PanelEdit extends EditDataModel{

    public function EditInCash($value){
        if (is_numeric($value)) {
            $class = $this->SingleColumn('cash_status', 'cash', $value);
            if ($class="true") {
                $out['type']="success";
                $out['description']="Stan kasowy zedytowany pomyślnie.";
                return $out;
            }
            else{
                $out['type']="danger";
                $out['description']="Stan kasowy nie został zedytowany.";
                return $out;
            }
        }
    }

}