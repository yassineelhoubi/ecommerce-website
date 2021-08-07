<?php class Category {


    public $db;
    public $category;
    public $data;

    public function __construct() {
        // instantiate this->database
        $database=new database();
        $this->db=$database->connect();

        // instantiate User object
        $this->category=new Categories($this->db);
        $this->user=new Users($this->db);

        // getthis->data
        $this->data=json_decode(file_get_contents("php://input"));
    }

    public function create_catego() {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') return false;
        
        $this->category->category_name=$this->data->category_name;
        $this->user->token              =$this->data->token;

        if ($this->user->check_token()) {

            if($this->category->create()) {
                echo json_encode(array('message'=> 'category created successfuly',
                        'state'=> true));
            }
            else {
                echo json_encode(array('message'=> 'category does not created successfully',
                        'state'=> false));
            }
        }
    }

    public function update_catego() {

        // push this->data into properties
        $this->category->idCategory = $this->data->idCategory;
        $this->category->category_name=$this->data->category_name;
        $this->user->token              =$this->data->token;

        if ($this->user->check_token()) {

            if($this->category->update()) {
                echo json_encode(array('message'=> 'category updated successfuly',
                        'state'=> true));
            }
            else {
                echo json_encode(array('message'=> 'category does not updated',
                        'state'=> false));
            }
        }
    }
    public function delete_catego(){ 
        // push this->data into properties
        $this->category->idCategory     = $this->data->idCategory;
        $this->user->token              =$this->data->token;

        if ($this->user->check_token()) {
            if($this->category->delete()){
                echo json_encode(array('message'=> 'the category was deleted','status'=>true));
            }else{
                echo json_encode(array('message'=> 'the category was not deleted' , 'status'=>false));
            }
        }
    }

    public function get_catego($idCategory){

        $this->category->idCategory = $idCategory;
        $row = $this->category->get();
        if($row){
            echo json_encode(array('message'=>$row, 'state' =>true));
        }else{
            echo json_encode(array('message' =>'No categiry found','state'=>false));
        }


    }
    
    public function getAll_catego(){
        $rows = $this->category->getAll();
        if($rows){
            echo json_encode(array('message'=> $rows,
            'state'=> true));
        }else{
            echo json_encode(array('message'=> 'no categories found',
            'state'=> false));
        }


    }

}