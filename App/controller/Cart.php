<?php

class Cart {
    /* database */
    public $db;
    /* object */
    public $user;
    public $line_cmd;
    public $order;
    public $product;
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
        $this->product  =   new Products($this->db);

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

                $getAll = $this->line_cmd->getAll_line_cmd();
                /* Delivery cost calculator */
                /*  */
                if($quantity_All != 0){
                    if($quantity_All <= 3){
                        $delivery = 10;
                    }elseif($quantity_All <= 5){
                        $delivery = 5;
                    }else{
                        
                    }
                }else{
                    $delivery = 0;
                }
                /* Calculate the total price */
                
                foreach($getAll as $get){
                    $calcPrice += $get['totalPrice'];
                }
                $totalPrice = $calcPrice + $delivery ;

                $this->order->totalPrice = $totalPrice;
                $this->order->idOrder    = $getAll[0]['idOrder'];
                $this->order->update_price();
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

    function drop($id)
    {
        $this->line_cmd->id_line_cmd =   $id;

        $result_line_cmd            =   $this->line_cmd->get_line_cmd();
        $this->product->idProduct   =   $result_line_cmd['idProduct'];
        $quantity_line_cmd          =   $result_line_cmd['quantity'];

        $result_product             =  $this->product->get();
        $quantity_stock                   =  $result_product['quantity'];

        if($this->line_cmd->delete()){
        $this->product->quantity = $quantity_stock + $quantity_line_cmd;
        $this->product->update_quantity();

        }
    }
    function update_quantity_cart($id){
        $this->line_cmd->id_line_cmd    =   $id;
        $result_line_cmd                =   $this->line_cmd->get_line_cmd();
        /* old quantity in cart( line_cmd) */
        $old_quantity                   =   $result_line_cmd['quantity'];

        $this->product->idProduct       =   $result_line_cmd['idProduct'];
        $result_product                 =   $this->product->get();
        /* quantity in stock  */
        $stock_quantity                 =   $result_product['quantity'];
        /* price the product */
        $price                      =   $result_product['price'];

        /* new quantity from customer */
        $new_quantity                   =   $this->data->new_quantity;
        
        if($old_quantity != $new_quantity){
            if($stock_quantity >= $new_quantity - $old_quantity){
                if($old_quantity > $new_quantity)
                {
                    $this->line_cmd->totalPrice =   $price * $new_quantity;
                    $this->line_cmd->quantity   =   $new_quantity;  
                    if($this->line_cmd->update_quantity_totalPrice_line_cmd())
                    {
                        $result_quantity = $old_quantity - $new_quantity;
                        $this->product->quantity = $stock_quantity + $result_quantity;
                        $this->product->update_quantity();
                        echo json_encode(array('message'=> 'updated successfully',
                        'state'=> true));
                    }
                }elseif($old_quantity < $new_quantity)
                {
                    $this->line_cmd->totalPrice =   $price * $new_quantity;
                    $this->line_cmd->quantity   =   $new_quantity;  
                    if($this->line_cmd->update_quantity_totalPrice_line_cmd())
                    {
                        $result_quantity =  $new_quantity - $old_quantity ;
                        $this->product->quantity = $stock_quantity - $result_quantity;
                        $this->product->update_quantity();
                        echo json_encode(array('message'=> 'updated successfully',
                        'state'=> true));
                    }
                }


            }else{
                echo json_encode(array('message'=> 'Stoke is not enough',
                'state'=> false));
            }
        }

    }
}