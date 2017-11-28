<?php

class htmlTable{
    static public function genTable($input){
        $createTable = '<table border="2">';
        foreach($input as $row => $innerArray){
            $createTable .= '<tr>';
            foreach($innerArray as $innerRow => $value){
                $createTable .= '<th>' . $innerRow . '</th>';
            }
            $createTable .= '</tr>';
            break;
        }
        foreach($input as $row => $innerArray){
            $createTable .= '<tr>';
            foreach($innerArray as $innerRow => $value){
                $createTable .= '<td>' . $value . '</td>';
            }
            $createTable .= '</tr>';
        }
        $createTable .= '</table><hr>';
        return $createTable;
    }
    static public function genTableRecord($input){
        $createTable = '<table border="2"><tr>';
        $createTable .= '<tr>';
        foreach($input as $innerRow => $value){
            $createTable .= '<th>' . $innerRow . '</th>';
        }
        $createTable .= '</tr>';
        foreach($input as $value){
            $createTable .= '<td>' . $value . '</td>';
        }
        $createTable.= '</tr></table><hr>';
        return $createTable;
    }
}
?>