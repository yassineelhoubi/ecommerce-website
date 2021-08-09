<?php

class Line_cmd{
        //db
        public $conn ;
        //properties ordes
        public $id_line_cmd;
        public $idOrder;
        public $idProduct;
        public $quantity ;
        public $totalPrice ;
    
        public function __construct($db) {
            $this->conn=$db;
        }

        public function create(){
            $sql="INSERT INTO line_cmd (idOrder , idProduct , quantity , totalPrice) VALUES ('$this->idOrder', '$this->idProduct', '$this->quantity','$this->totalPrice')";

            $stmt = $this->conn->prepare($sql);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            } 
        }

        function product_existe()
        {
            $sql=("SELECT * FROM line_cmd WHERE idOrder=$this->idOrder and idProduct=$this->idProduct");

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
 
        }
        function getAll_line_cmd(){
            $sql    = "SELECT * FROM line_cmd,products WHERE line_cmd.idProduct=products.idProduct and line_cmd.idOrder=$this->idOrder";
            $stmt   = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }
        function count_line_cmd(){
            $sql= "SELECT COUNT(line_cmd.id_line_cmd) as count FROM line_cmd , orders  WHERE line_cmd.idOrder = orders.idOrder and orders.idOrder = $this->idOrder";
            $stmt   = $this->conn->prepare($sql);
            $stmt->execute();
            $countAll = $stmt->fetch(PDO::FETCH_ASSOC);
            return $countAll['count'];
        }
        function count_line_cmd_product_10(){
            $sql = "SELECT COUNT(line_cmd.id_line_cmd) as count FROM line_cmd , orders , products WHERE 
            line_cmd.idOrder = orders.idOrder and orders.idOrder = $this->idOrder and 
            products.idProduct =line_cmd.idProduct AND products.price = 10";
            $stmt   = $this->conn->prepare($sql);
            $stmt->execute();
            $count = $stmt->fetch(PDO::FETCH_ASSOC);
            return $count['count'];
        }
        function count_line_cmd_product_20(){
            $sql = "SELECT COUNT(line_cmd.id_line_cmd) as count FROM line_cmd , orders , products WHERE 
            line_cmd.idOrder = orders.idOrder and orders.idOrder = $this->idOrder and 
            products.idProduct =line_cmd.idProduct AND products.price = 20";
            $stmt   = $this->conn->prepare($sql);
            $stmt->execute();
            $count = $stmt->fetch(PDO::FETCH_ASSOC);
            return $count['count'];
        }
        function count_line_cmd_product_30(){
            $sql = "SELECT COUNT(line_cmd.id_line_cmd) as count FROM line_cmd , orders , products WHERE 
            line_cmd.idOrder = orders.idOrder and orders.idOrder = $this->idOrder and 
            products.idProduct =line_cmd.idProduct AND products.price = 30";
            $stmt   = $this->conn->prepare($sql);
            $stmt->execute();
            $count = $stmt->fetch(PDO::FETCH_ASSOC);
            return $count['count'];
        }
}