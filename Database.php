<?php
class Database 
{
    private $host = "localhost";
    private $user = "root";     
    private $pass = "";        
    private $dbname = "testdb";
    private $conn;

    public function __construct() 
    {
        $this->connectDB();
        $this->createDatabase();
        $this->createTable();
    }

    private function connectDB() 
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass);
        if ($this->conn->connect_error) 
            {
                die("Database Connection Failed: " . $this->conn->connect_error);
            }
    }

    private function createDatabase() 
    {
        $sql = "CREATE DATABASE IF NOT EXISTS " . $this->dbname;
        if ($this->conn->query($sql) === TRUE) 
            {
                $this->conn->select_db($this->dbname);
            } 
        else 
            {
                die("Error creating database: " . $this->conn->error);
            }
    }

    private function createTable() 
    {
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL
        )";
        if ($this->conn->query($sql) === FALSE) 
            {
                die("Error creating table: " . $this->conn->error);
            }
    }

    public function getConnection() 
    {
        return $this->conn;
    }
}
?>