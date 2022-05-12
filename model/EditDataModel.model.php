<?php 

class EditDataModel extends Dbh{

    protected function SingleColumn($table, $column, $value){
        // UPDATE cash_status SET cash = 850
        $sql = "UPDATE $table SET $column = $value";
        // $stmt = $this->connect()->query($sql);
        if ($this->connect()->query($sql)) {
            return "success";
        }
        else {
            return "false";
        }
    }

}