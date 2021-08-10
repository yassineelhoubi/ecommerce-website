<?php 
class Orders{
    //db
    public $conn ;
    //properties ordes
    public $idOrder;
    public $idCustomer;
    public $date ;
    public $status  ;
    public $totalPrice ;

    public function __construct($db) {
        $this->conn=$db;
    }
    
    public function last_order(){
        $sql="SELECT * FROM orders WHERE idCustomer = $this->idCustomer AND status = 'en cour'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function create(){
        $sql="INSERT INTO orders (status, idCustomer) VALUES ('$this->status','$this->idCustomer')";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        } 
    }

}