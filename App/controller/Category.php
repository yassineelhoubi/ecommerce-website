<?php class Category {


    public $db;
    public $category;

    public function __construct() {
        // instantiate Database
        $database=new Database();
        $this->db=$database->connect();

        // instantiate User object
        $this->category=new Categories($this->db);
    }

    public function create_catego() {

        // getdata
        $data=json_decode(file_get_contents("php://input"));

        $this->category->category_name=$data->category_name;


        if($this->category->create()) {
            echo json_encode(array('message'=> 'category created successfuly',
                    'state'=> true));
        }

        else {
            echo json_encode(array('message'=> 'category does not created successfully',
                    'state'=> false));
        }
    }

    public function update_catego() {

        // getdata
        $data=json_decode(file_get_contents("php://input"));

        // push data into properties
        $this->category->idCategory = $data->idCategory;
        $this->category->category_name=$data->category_name;

        if($this->category->update()) {
            echo json_encode(array('message'=> 'category updated successfuly',
                    'state'=> true));
        }

        else {
            echo json_encode(array('message'=> 'category does not updated',
                    'state'=> false));
        }


    }
    public function get_catego(){
        // getdata
        $data=json_decode(file_get_contents("php://input"));

        // push data into properties
        $this->category->idCategory = $data->idCategory;


    }
    
    public function getAll_catego(){
        
        if($row = $this->category->getAll()){
            echo json_encode(array('message'=> $row,
            'state'=> true));
        }else{
            echo json_encode(array('message'=> 'no categories found',
            'state'=> false));
        }


    }

}