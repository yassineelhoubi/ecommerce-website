<?php class User {


    public function sign_up() {
        // instantiate Database
        $database=new Database();
        $db=$database->connect();

        // instantiate User object
        $user=new Users($db);

        // get raw posted data
        $data=json_decode(file_get_contents("php://input"));

        $user->email=$data->email;
        $user->password=password_hash($data->password, PASSWORD_DEFAULT);;

        $user->nbrPhone=$data->nbrPhone;
        $user->Fname=$data->Fname;
        $user->Lname=$data->Lname;
        $user->address1=$data->address1;
        $user->address2=$data->address2;
        $user->gender=$data->gender;


        $bol = true;
        $rowCount = $user->checkemail();
        if($rowCount >= 1){
            $bol = false;
        }
        if($bol){
            if ($user->create()) {
            

                echo json_encode(array('message'=> 'user iserted',
                    'state'=> true));
    
            }
    
            else {
    
            
                echo json_encode(array('message'=> 'user not iserted',
                'state'=> false));
    
            }
        }else{
            echo json_encode(array('message'=> 'this email already exist',
                'state'=> false));
        }


    }

    public function login() {
        // instantiate database
        $database=new Database();
        $db=$database->connect();

        //Instantiate User object
        $user=new Users($db);

        // get raw posted data
        $data=json_decode(file_get_contents("php://input"));

        $user->email    =   $data->email;
        $password       =   $data->password;

        
        if($row = $user->login()){

            $hachPassword = $row['password'];
        }

       

        if($row == !0 && password_verify($password , $hachPassword)) {
            echo json_encode(array('message'=> 'user login',
                    'state'=> true));
        }elseif($row ==!0){
            echo json_encode(array('message'=>'data not valid'));
        }
        else{
            echo json_encode(array('message'=>"doesn't user exist"));
        }




    }
}