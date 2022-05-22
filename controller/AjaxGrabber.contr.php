<?php

class AjaxGrabber extends GrabDataModel {

    public function GrabAllById($table, $id){
        $data = $this->GrabSpecificRecord('*', $table, $id);
        return $data;
    }

}