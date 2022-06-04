<?php

class AjaxGrabber extends GrabDataModel {

    public function GrabAllById($table, $id){
        $data = $this->GrabSpecificRecord('*', $table, $id);
        return $data;
    }

    public function ChartMonthlyIncome($year, $month){
        $data = $this->GrabAllDataByYearAndMonth('sales', $year, $month);
        return $data;
    }

}