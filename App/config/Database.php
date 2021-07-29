<?php

class Database{
    private $host       =   'localhost';
    private $dbname     =   'ecommerce-website';
    private $username   =   'root';
    private $password   =   '';
    private $conn;

    public function connect(){
      try {
          $this->conn   =   new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->username,$this->password);
          $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
          echo "connection Error : ".$e->getMessage();
          
      }
      return $this->conn;
    }
    
}
/* $x= new Database;
$x->connect(); */