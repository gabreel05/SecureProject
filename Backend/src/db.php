<?php
class Database {
    public function __construct() {}
    public function __clone() {}
    public function __destruct() {
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

    public function select($sql, $params=null, $class=null) {
        $query = $this -> connect() -> prepare($sql);
        $query -> execute($params);

        if (isset($class)) {
            $resultSet = $query -> fetchAll(PDO::FETCH_CLASS, $class) or die(print_r($query -> errorInfo(), true));
        } else {
            $resultSet = $query -> fetchAll(PDO::FETCH_OBJ) or die(print_r($query -> errorInfo(), true));
        }
        self::__destruct();
        return $resultSet;
    }

    public function insert($sql, $params=null) {
        $connection = $this -> connect();
        $query = $connection -> prepare($sql);
        $query -> execute($params);
        $resultSet -> $connection -> lastInserId() or die(print_r($query -> errorInfo(), true));
        self::__destruct();
        return $resultSet;
    }

    public function update($sql, $params=null) {
        $query = $this -> connect() -> prepare($sql);
        $query -> execute($params);
        $resultSet = $query -> rowCount() or die(print_r($query -> errorInfo(), true));
        self::__destruct();
        return $resultSet;
    }

    public function delete($sql, $params=null) {
        $query = $this -> connect() -> prepare($sql);
        $query -> execute($params);
        $resultSet = $query -> rowCount() or die(print_r($query -> errorInfo(), true));
        self::__destruct();
        return $resultSet;
    }
}
?>
