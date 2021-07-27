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
 
         $user->FName = $data->FName;
         $user->LName = $data->LName;
         $user->Adresse1 = $data->Adresse1;
         $user->Adresse2 = $data->Adresse2;
         $user->nbrPhone = $data->nbrPhone;

 
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