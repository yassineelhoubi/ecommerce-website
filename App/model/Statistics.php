<?php

class Statistics {



    public function __construct($db) {
        $this->conn=$db;
    }


    public function count_delivered_orders(){
        $sql = "SELECT count( orders.idOrder ) as count FROM `orders` WHERE status= 'livrée'";
        $stmt   = $this->conn->prepare($sql);
        $stmt->execute();
        $countAll = $stmt->fetch(PDO::FETCH_ASSOC);
        return $countAll['count'];

    }
    public function count_validated_Orders(){
        $sql = "SELECT count( orders.idOrder ) as count FROM `orders` WHERE status= 'Non-livré'";
        $stmt   = $this->conn->prepare($sql);
        $stmt->execute();
        $countAll = $stmt->fetch(PDO::FETCH_ASSOC);
        return $countAll['count'];
    }
    public function count_customers(){
        $sql = "SELECT count( customers.idCustomer ) as count FROM `customers`";
        $stmt   = $this->conn->prepare($sql);
        $stmt->execute();
        $countAll = $stmt->fetch(PDO::FETCH_ASSOC);
        return $countAll['count'];
    }


}