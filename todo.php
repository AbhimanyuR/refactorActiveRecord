<?php

use DBfunctions\model;

final class todo extends model {
    public $id;
    public $owneremail;
    public $ownerid;
    public $createddate;
    public $duedate;
    public $message;
    public $isdone;

    public static function getName(){
        $tableName='todos';
        return $tableName;
    }
}
?>