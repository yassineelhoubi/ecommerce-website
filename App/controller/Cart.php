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

            if (!empty($resultOrder)) {
                $this->line_cmd->idOrder = $resultOrder[0]['idOrder'];
                /* hna */

                $countAll = $this->line_cmd->count_line_cmd();
                $count_p_10 = $this->line_cmd->count_line_cmd_product_10();
                $count_p_20 = $this->line_cmd->count_line_cmd_product_20();
                $count_p_30 = $this->line_cmd->count_line_cmd_product_30();
                $getAll = $this->line_cmd->getAll_line_cmd();
                echo json_encode(array('message'=> 'votre pnaier '.$countAll,'product'=>$getAll, '10'=>$count_p_10,'20'=>$count_p_20,
                '30'=>$count_p_30,                'state'=> true));
            } else {
                $countAll = 0;
                echo json_encode(array('message'=> 'votre pnaier '.$countAll,
                'state'=> true));

            }

        } else {
            echo json_encode(array(
                'auth'=> false));
        }
    }
}