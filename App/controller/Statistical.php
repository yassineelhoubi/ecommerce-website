<?php class Statistical {

    public $db;


    public $user;
    public $statistical;

    public function __construct() {
        // instantiate Database
        $database=new Database();
        $this->db=$database->connect();

        // instantiate User object

        $this->user=new Users($this->db);
        $this->statistical=new Statistics($this->db);
    }

    public function count_delivered_orders(){
        $count = $this->statistical->count_delivered_orders();
        echo json_encode($count);
    }
    public function count_validated_Orders(){
        $count = $this->statistical->count_validated_Orders();
        echo json_encode($count);
    }
    public function count_customers(){
        $count = $this->statistical->count_customers();
        echo json_encode($count);
    }
}