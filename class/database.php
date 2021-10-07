<?php 
    class Database {
        private $host = "localhost";
        private $database_name = "api";
        private $username = "root";
        private $password = "nopassword";

        public $conn;

        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8mb4");
            }catch(PDOException $exception){
                echo " error message : " . $exception->getMessage();
            }
            return $this->conn;
        }
    }  