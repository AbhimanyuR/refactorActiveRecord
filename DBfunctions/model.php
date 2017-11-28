<?php

namespace DBfunctions;


abstract class model {

    private function insert() {
        $class_name = get_called_class();
        $tableName = $class_name::getName();
        $array = get_object_vars($this);
        $columnString = implode(',', array_keys($array));
        $valueString = ':'.implode(',:', array_keys($array));
        $sql =  'INSERT INTO '.$tableName.' ('.$columnString.') VALUES ('.$valueString.')';
        return $sql;
    }
    private function update() {
        $class_name = get_called_class();
        $tableName = $class_name::getName();
        $array = get_object_vars($this);
        $space = " ";
        $sql = 'UPDATE '.$tableName.' SET ';
        foreach ($array as $key=>$value){
            if( ! empty($value)) {
                $sql .= $space . $key . ' = "'. $value .'"';
                $space = ", ";
            }
        }
        $sql .= ' WHERE id='.$this->id;
        return $sql;
    }

    public function save()
    {
        if ($this->id != '') {
            $sql = $this->update();
        } else {
            $sql = $this->insert();
        }
        $db = dbConn::getConnection();
        $statement = $db->prepare($sql);
        $array = get_object_vars($this);
        foreach (array_keys($array) as $key=>$value){
            $statement->bindParam(":$value", $this->$value);
        }
        $statement->execute();
        $id = $db->lastInsertId();
        return $id;
    }
    public function delete() {
        $db = dbConn::getConnection();
        $class_name = get_called_class();
        $tableName = $class_name::getName();
        $sql = 'DELETE FROM '.$tableName.' WHERE id='.$this->id;
        $statement = $db->prepare($sql);
        $statement->execute();
    }
}
?>