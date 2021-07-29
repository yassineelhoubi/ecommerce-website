<?php

class User {


    public function sign_up(){
         // instantiate Database
         $database = new Database();
         $db = $database->connect();
 
         // instantiate User object
         $user = new Users($db);
 
         // get raw posted data
         $data = json_decode(file_get_contents("php://input"));
 
         $user->email = $data->email;
         $user->password = $data->password;
 
         $user->Fname = $data->Fname;
         $user->Lname = $data->Lname;
         $user->address1 = $data->address1;
         $user->address2 = $data->address2;
         $user->nbrPhone = $data->nbrPhone;
         $user->gender = $data->gender;


 
         $u_arr = array();
         if ($user->create()) {
         $u_arr = array(
         'message' => 'user iserted',
         'state' => true);
 
         echo json_encode($u_arr);
 
         } else {
 
         $u_arr = array('message' => 'user not iserted',
             'state' => false);
 
         echo json_encode($u_arr);
 
             }
 
    }
}