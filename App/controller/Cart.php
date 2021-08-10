<?php

class Cart {
    /* database */
    public $db;
    /* object */
    public $user;
    public $line_cmd;
    public $order;
    /* data from json */
    public $data;

    public function __construct() {
        // instantiate Database
        $database=new Database();
        $this->db=$database->connect();

        // instantiate User object
        $this->order    =   new Orders($this->db);
        $this->line_cmd =   new Line_cmd($this->db);
        $this->user     =   new Users($this->db);

        // getdata
        $this->data=json_decode(file_get_contents("php://input"));
    }
    function index()
    {
        $this->user->token          =   $this->data->token;
        if ($this->user->check_token()) {

            $infoCustomer               =   $this->user->get_info_token();
            $this->order->idCustomer    =   $infoCustomer['id'];  

            $resultOrder                =   $this->order->last_order();
            $countAll = 0 ;
            $delivery = 0;
            $calcPrice = 0 ;
            $totalPrice = 0;
            if (!empty($resultOrder)) {
                $this->line_cmd->idOrder = $resultOrder[0]['idOrder'];


                $countAll = $this->line_cmd->count_line_cmd(); 
                $quantity_All = $this->line_cmd->calc_quantity_cmd_product_All();
                $quantity_10 = $this->line_cmd->calc_quantity_cmd_product_10();
                $quantity_20 = $this->line_cmd->calc_quantity_cmd_product_20();
                $quantity_30 = $this->line_cmd->calc_quantity_cmd_product_30();

                $getAll = $this->line_cmd->getAll_line_cmd();
                /* Delivery cost calculator */
                /*  */
                if($quantity_All <= 5){
                    if($quantity_30 <= 3){
                        $delivery=3;
                        if($quantity_20 <= 4){
                            $delivery = 4;
                            if($quantity_10 <= 5){
                                $delivery = 5;
                            }else{
                                $delivery = 0;
                            }
                        }else{
                            $delivery = 0;
                        }
                    }else{
                        $delivery = 0;
                    }
                }
                /* Calculate the total price */
                
                foreach($getAll as $get){
                    $calcPrice += $get['price'];
                }
                $totalPrice = $calcPrice + $delivery ;
                /* */

                echo json_encode(array('message'=> 'votre pnaier ','countAll'=>$countAll, 'quantity_All' =>$quantity_All,'calcPrice'=>$calcPrice,'totalPrice'=>$totalPrice,'delivery'=>$delivery,'product'=>$getAll,'state'=> true));
            } else {
                echo json_encode(array('message'=> 'votre pnaier est null','countAll'=>$countAll,
                'state'=> false));

            }

        } else {
            echo json_encode(array(
                'auth'=> false));
        }
    }
}