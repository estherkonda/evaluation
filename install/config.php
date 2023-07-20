<?php
class Database {
    private $host =  'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'garage';

    protected $connection;

    public function __construct() {
        $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>