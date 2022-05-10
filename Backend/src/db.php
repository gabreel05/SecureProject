<?php
abstract class Database {
    private function __construct() {}
    private function __clone() {}
    private function __destruct() {
        foreach ($this as $key => $value) {
            unset($this -> $key);
        }
    }

    private static $database = "mysql";
    private static $host = "localhost";
    private static $port = "3306";
    private static $user = "root";
    private static $password = "root";
    private static $name = "";

    private function getDatabase() { return self::$database; }
    private function getHost() { return self::$host; }
    private function getPort() { return self::$port; }
    private function getUser() { return self::$user; }
    private function getPassword() { return self::$password; }
    private function getName() { return self::$name; }

    public function connect() {
        try {
            $this -> connection = new PDO($this -> getDatabase().":host=".$this -> getHost().";port=".$this -> getPort().";dbname=".$this -> getName(), $this -> getUser(), $this -> getPassword());
        } catch (\Throwable $th) {
            
        }
    
        return ($this -> connection);
    }

    public function disconnect() {
        $this -> connection = null;
    }
}
?>
