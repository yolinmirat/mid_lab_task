<?php
require_once "Database.php";

class User 
{
    private $conn;

    public function __construct() 
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function insertUser($name) 
    {
        $stmt = $this->conn->prepare("INSERT INTO users (name) VALUES (?)");
        $stmt->bind_param("s", $name);
        return $stmt->execute();
    }

    public function getAllUsers() 
    {
        $result = $this->conn->query("SELECT * FROM users ORDER BY id ASC");
        return $result;
    }

    public function deleteUser($id) 
    {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    public function updateUser($id, $name)
    {
        $stmt = $this->conn->prepare("UPDATE users SET name = ? WHERE id = ?");
        $stmt->bind_param("si", $name, $id);
        return $stmt->execute();
    }
}
?>