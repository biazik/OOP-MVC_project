<?php

class PanelDelete extends DeleteDataModel{

    public function DeleteId($id, $table){
        if (is_numeric($id)) {
            $class = $this->DeleteSpecificRecord('id', $id, $table);
            if ($class="true") {
                $out['type']="success";
                $out['description']="Usunięto rekord pomyślnie.";
                return $out;
            }
            else{
                $out['type']="danger";
                $out['description']="Rekord nie został usunięty.";
                return $out;
            }
        }
    }

}