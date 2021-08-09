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

        function existe()
        {
            $sql=("SELECT * FROM line_cmd WHERE idOrder=$this->idOrder and idProduct=$this->idProduct");

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
 
        }
}