<?php class User {
    public $db;
    public $product;
    public $data;

    public function __construct() {
        // instantiate database
        $database=new Database();
        $this->db=$database->connect();

        //Instantiate User object
        $this->user=new Users($this->db);
        
        // fetch data
        $this->data=json_decode(file_get_contents("php://input"));

    }

    public function sign_up() {


        $this->user->email=$this->data->email;
        $this->user->password=password_hash($this->data->password, PASSWORD_DEFAULT);

        $this->user->nbrPhone=$this->data->nbrPhone;
        $this->user->Fname=$this->data->Fname;
        $this->user->Lname=$this->data->Lname;
        $this->user->address1=$this->data->address1;
        $this->user->address2=$this->data->address2;
        $this->user->gender=$this->data->gender;


        $bol=true;
        $rowCount=$this->user->checkemail();

        if($rowCount >=1) {
            $bol=false;
        }

        if($bol) {
            if ($this->user->create()) {


                echo json_encode(array('message'=> 'Account created successfult',
                        'state'=> true));

            }

            else {
                echo json_encode(array('message'=> 'error',
                        'state'=> false));
            }
        }

        else {
            echo json_encode(array('message'=> 'this email already exist',
                    'state'=> false));
        }


    }



    public function login() {


        $this->user->email=$this->data->email;
        $password=$this->data->password;


        if($row=$this->user->login()) {

            $hachPassword=$row['password'];
            $this->user->id=$row['id'];
        }

        if($row !=0 && password_verify($password, $hachPassword) && $row['role']=='admin') 
        {
            $token=$this->user->gen_token();
            $this->user->token=$token;

            $this->user->gave_token();
            $role=$this->user->get_role_token();
            echo json_encode(array('message'=> 'user login',
                    'token'=>$token,
                    'role'=>$role,
                    'state'=> true));
        }
        elseif($row !=0 && password_verify($password, $hachPassword)) {
            $token=$this->user->gen_token();
            $this->user->token=$token;
            $this->user->gave_token();
            echo json_encode(array('message'=> 'user login', 'token'=>$token,
                    'state'=> true));

        }

        elseif($row !=0) {
            echo json_encode(array('message'=>'data not valid',
                    'state'=>false));
        }

        else {
            echo json_encode(array('message'=>"doesn't user exist", 'state'=>false));
        }

    }

    public function get_info_client_token(){
        
        $this->user->token=$this->data->token;
        if($info=$this->user->get_info_token()) {
            echo json_encode(array('info'=>$info));
        }else {
            echo json_encode(array('message'=>"token not valid"));
        }

    }
    public function check_token() {

        $this->user->token=$this->data->token;

        if($this->user->check_token()) {
            echo json_encode(array('message'=>'token is valid'));
        }

        else {
            echo json_encode(array('message'=>"token not valid"));
        }

    }
    public function get_role_token() {

        $this->user->token=$this->data->token;

        if($this->user->check_token()) {
            if($role=$this->user->get_role_token()) {
                echo json_encode(array('role'=>$role));
            }
        }
        else {
            echo json_encode(array('message'=>"token not valid"));
        }

    }
    public function get_id_token() {

        $this->user->token=$this->data->token;

        if($this->user->check_token()) {
            if($info=$this->user->get_info_token()) {
                echo json_encode(array('id'=>$info['id']));
            }
        }
        else {
            echo json_encode(array('message'=>"token not valid"));
        }
    }
    public function get_info_customer(){


        $this->user->token=$this->data->token;
        if($this->user->check_token()) {
            if($info=$this->user->get_info_token()) {
                echo json_encode($info);
            }
        }
    }

    public function update_customer_info(){
        $this->user->token=$this->data->token;
        if($this->user->check_token()) {
            if($info=$this->user->get_info_token()) {
                $this->user->idCustomer = $info['id'];
                $this->user->nbrPhone=$this->data->nbrPhone;
                $this->user->Fname=$this->data->Fname;
                $this->user->Lname=$this->data->Lname;
                $this->user->address1=$this->data->address1;
                $this->user->address2=$this->data->address2;
                $this->user->gender=$this->data->gender;
        
                if($this->user->update_customer_info()){
                    echo json_encode(array('message'=>"Update successfuly", 'state'=>true));
                }else{
                    echo json_encode(array('message'=>"err", 'state'=>false));
                }
            }
        }
    }
}