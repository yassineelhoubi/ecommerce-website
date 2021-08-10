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
            $sql    = "SELECT l.id_line_cmd, l.idOrder, l.idProduct, l.quantity, l.totalPrice , p.name, p.price, p.img  FROM line_cmd l ,products p  WHERE l.idProduct=p.idProduct and l.idOrder=$this->idOrder ORDER BY l.id_line_cmd DESC";
            $stmt   = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }
        /* ___________________________________________ */
        /* counter */
        function count_line_cmd(){
            $sql= "SELECT COUNT(line_cmd.id_line_cmd) as count FROM line_cmd , orders  WHERE line_cmd.idOrder = orders.idOrder and orders.idOrder = $this->idOrder";
            $stmt   = $this->conn->prepare($sql);
            $stmt->execute();
            $countAll = $stmt->fetch(PDO::FETCH_ASSOC);
            return $countAll['count'];
        }
        function calc_quantity_cmd_product_All(){
            $sql = "SELECT SUM(l.quantity) as quantity FROM line_cmd l , products p WHERE l.idProduct = p.idProduct and l.idOrder =$this->idOrder";
            $stmt   = $this->conn->prepare($sql);
            $stmt->execute();
            $quantity_10 = $stmt->fetch(PDO::FETCH_ASSOC);
            return $quantity_10['quantity'];
        }
        function calc_quantity_cmd_product_10(){
            $sql = "SELECT SUM(l.quantity) as quantity FROM line_cmd l , products p WHERE l.idProduct = p.idProduct and p.price = 10 and l.idOrder =$this->idOrder";
            $stmt   = $this->conn->prepare($sql);
            $stmt->execute();
            $quantity_10 = $stmt->fetch(PDO::FETCH_ASSOC);
            return $quantity_10['quantity'];
        }
        function calc_quantity_cmd_product_20(){
            $sql = "SELECT SUM(l.quantity) as quantity FROM line_cmd l , products p WHERE l.idProduct = p.idProduct and p.price = 20 and l.idOrder =$this->idOrder";
            $stmt   = $this->conn->prepare($sql);
            $stmt->execute();
            $quantity_20 = $stmt->fetch(PDO::FETCH_ASSOC);
            return $quantity_20['quantity'];
        }
        function calc_quantity_cmd_product_30(){
            $sql = "SELECT SUM(l.quantity) as quantity FROM line_cmd l , products p WHERE l.idProduct = p.idProduct and p.price = 30 and l.idOrder =$this->idOrder";
            $stmt   = $this->conn->prepare($sql);
            $stmt->execute();
            $quantity_30 = $stmt->fetch(PDO::FETCH_ASSOC);
            return $quantity_30['quantity'];
        }
}