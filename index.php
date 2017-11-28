<?php


class Manage {
    public static function autoload($class) {
       // include $class . '.php';
        include str_replace('\\', '/', $class). '.php';
    }
}
spl_autoload_register(array('Manage', 'autoload'));

$obj = new main();
class main
{
    public function __construct()
    {
        $form = '<form method="post" enctype="multipart/form-data">';
        $form .= '<h1>Accounts Table</h1>';

        $form .= '<h2>Display all records</h2>';
        $records = accounts::findAll();
        $createTable = htmlTable::genTable($records);
        $form .= $createTable;


        $form .= '<h2>Select one record</h2>';
        $id=4;
        $records = accounts::findOne($id);
        $createTable = htmlTable::genTableRecord($records);
        $form .= '<h3>ID used: '.$id.'</h3>';
        $form .= $createTable;

        $form .= '<h2>Insert Record</h2>';
        $record = new account();
        $record->email="studentnjit.edu";
        $record->fname="Big";
        $record->lname="Bob";
        $record->phone="787Big787";
        $record->birthday="11-12-1961";
        $record->gender="male";
        $record->password="7890";
        $lastInsertedId=$record->save();
        $records = accounts::findAll();
        $createTable = htmlTable::genTable($records);
        $form .= $createTable;

        $form .= '<h2>Update Record</h2>';
        $records = accounts::findOne($lastInsertedId);
        $record = new account();
        $record->id=$records->id;
        $record->lname="Mama";
        $record->gender="Female";
        $record->save();
        $form .= '<h3>ID used: '.$records->id.'</h3>';
        $records = accounts::findAll();
        $createTable = htmlTable::genTable($records);
        $form .= $createTable;


        $form .= '<h2>Delete Record</h2>';
        $records = accounts::findOne($lastInsertedId);
        $record= new account();
        $record->id=$records->id;
        $record->delete();
        $form .= '<h3>ID: '.$records->id.' is deleted</h3>';
        $records = accounts::findAll();
        $createTable = htmlTable::genTable($records);
        $form .= $createTable;


        $form .= '<h1>Todos Table</h1>';

        $form .= '<h2>Display all records</h2>';
        $records = todos::findAll();
        $$createTable = htmlTable::genTable($records);
        $form .= $createTable;


        $form .= '<h2>Select one record</h2>';
        $id=5;
        $records = todos::findOne($id);
        $createTable = htmlTable::genTableRecord($records);
        $form .= '<h3>ID used: '.$id.'</h3>';
        $form .= $createTable;


        $form .= '<h2>Insert Record</h2>';
        $record = new todo();
        $record->owneremail="rockstar@pace.edu";
        $record->ownerid=12;
        $record->createddate="00-00-0000";
        $record->duedate="11-11-1901";
        $record->message="works fine";
        $record->isdone=1;
        $lastInsertedId=$record->save();
        $records = todos::findAll();
        $createTable = htmlTable::genTable($records);
        $form .= $createTable;


        $form .= '<h2>Update Record</h2>';
        $records = todos::findOne($lastInsertedId);
        $record = new todo();
        $record->id=$records->id;
        $record->owneremail="kickstart@njit.edu";
        $record->message="updates fine";
        $record->save();
        $form .= '<h3>ID used: '.$records->id.'</h3>';
        $records = todos::findAll();
        $createTable = htmlTable::genTable($records);
        $form .= $createTable;

        $form .= '<h2>Delete Record</h2>';
        $records = todos::findOne($lastInsertedId);
        $record= new todo();
        $record->id=$records->id;
        $record->delete();
        $form .= '<h3>Record ID: '.$records->id.' is deleted</h3>';
        $records = todos::findAll();
        $createTable = htmlTable::genTable($records);
        $form .= $createTable;
        $form .= '</form> ';
        print($form);
    }
}
?>