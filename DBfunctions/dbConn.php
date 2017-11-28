<?php
namespace DBfunctions;
//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);
define('DATABASE', 'paa36');
define('USERNAME', 'paa36');
define('PASSWORD', 'ESYoCrmHd');
define('CONNECTION', 'sql2.njit.edu');

class dbConn{

    protected static $db;

    private function __construct() {
        try {

            self::$db = new \PDO( 'mysql:host=' . CONNECTION .';dbname=' . DATABASE, USERNAME, PASSWORD );
            self::$db->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
        }
        catch (\PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
    }

    public static function getConnection() {

        if (!self::$db) {
            new dbConn();
        }
        return self::$db;
    }
}
?>