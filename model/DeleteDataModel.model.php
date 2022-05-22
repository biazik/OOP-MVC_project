<?php 

class DeleteDataModel extends Dbh{

    protected function DeleteSpecificRecord($arg1, $arg2, $table){
        $sql = "DELETE FROM $table WHERE $arg1 = $arg2";
        if ($this->connect()->query($sql)) {
            return "success";
        }
        else {
            return "false";
        }
    }

}