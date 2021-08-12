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
    public function showOrder(){
        $sql ="SELECT * FROM orders o , customers c WHERE o.status != 'en cour' and o.idCustomer =c.idCustomer ORDER BY idOrder DESC";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()) {
            $rowCount = $stmt->rowCount();
            if($rowCount == 0){
                return false;
            }else{
                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $row ;
            }
        }
        else {
            return false;
        }
    }
    public function delivered(){
        $sql = "UPDATE orders SET status = 'livrée'  WHERE idOrder=$this->idOrder";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
    public function get(){
        $sql = "SELECT * FROM orders WHERE idOrder=$this->idOrder ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update_validate(){
        $sql = "UPDATE orders SET status = 'Non-livré' , date = '$this->date' WHERE idOrder=$this->idOrder";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
    public function update_price(){
        $sql = "UPDATE orders SET  totalPrice = $this->totalPrice WHERE idOrder=$this->idOrder";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

}