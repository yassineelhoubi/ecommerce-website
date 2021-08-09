<?php

class Order{
    /* database */
    public $db;
    /* object */
    public $product;
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
        $this->product  =   new Products($this->db);
        $this->order    =   new Orders($this->db);
        $this->line_cmd =   new Line_cmd($this->db);
        $this->user     =   new Users($this->db);

        // getdata
        $this->data=json_decode(file_get_contents("php://input"));
    }

    public function create(){
        $this->user->token          =   $this->data->token;

        if($this->user->check_token())
        {
            
            $this->product->idProduct   =   $this->data->idProduct;

            $quantity                   =   $this->data->quantity;
            $resultProduct              =   $this->product->get();

            if(!isset($quantity) || empty($quantity))
            {
                $quantity = 1;
            }
            if($resultProduct['quantity'] >= $quantity)
            {
                $this->line_cmd->quantity   =   $quantity;
                $this->line_cmd->totalPrice     =   $resultProduct['price'] * $quantity;
                $this->line_cmd->idProduct  =   $resultProduct['idProduct'];
                $infoCustomer               =   $this->user->get_info_token();
                $this->order->idCustomer    =   $infoCustomer['id'];  

                $resultOrder                =   $this->order->last_order();

                if(empty($resultOrder) || $resultOrder[0]['status'] != "en cour")
                {
                    $this->order->status = "en cour";
                    if($this->order->create()){
                        $resultOrder                =   $this->order->last_order();
                        $this->line_cmd->idOrder    =   $resultOrder[0]['idOrder'];

                        if($this->line_cmd->create()){
                            echo json_encode(array('message'=> 'The Order was created And The product has been added to your cart',
                            'state'=> true));
                        }else{
                            echo json_encode(array('message'=> 'The Order was created And The product has not been added to your cart',
                            'state'=> false));
                        }
                        
                    }else{
                        echo json_encode(array('message'=> 'the order was not created',
                        'state'=> false));
                    }
                }else{
                    $this->line_cmd->idOrder    =   $resultOrder[0]['idOrder'];
                    if(empty($this->line_cmd->product_existe())){
                        if($this->line_cmd->create()){
                            echo json_encode(array('message'=> 'The product has been added to your cart',
                            'state'=> true));
                            $this->product->quantity = $resultProduct['quantity'] - $quantity;
                            $this->product->update_quantity();
                        }else{
                            echo json_encode(array('message'=> 'The product has not been added to your cart',
                            'state'=> false));
                        }

                    }else{
                        echo json_encode(array('message'=> 'the product already exists in your basket',
                        'state'=> false));
                    }
                }

            }else{
                echo json_encode(array('message'=> 'Stoke is not enough',
                'state'=> false));
            }

        }else{
            
            echo json_encode(array(
            'auth'=> false));
        }
    }

}