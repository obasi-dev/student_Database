<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $db_name = "student_database";
    private $pass = "";
    public $conn;

    public function __construct(){
        $this->conn = new mysqli($this->host,$this->user,$this->pass,$this->db_name);
        if ($this->conn->connect_error) {
            die("connection failed: ".$this->conn->connect_error);
        }
    }
}