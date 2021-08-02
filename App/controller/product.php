<?php
class Product {
    public $db;
    public $product;

    public function __construct() {
        // instantiate Database
        $database=new Database();
        $this->db=$database->connect();

        // instantiate User object
        $this->product=new Products($this->db);
    }

    public function upload_img(){
        $target_path  =$_SERVER['DOCUMENT_ROOT'].'/projet_fil_rouge/Public/resources/img/product/';
        $imgName = $_POST['imgName'];
        $target_path = $target_path . $imgName;
        if(move_uploaded_file($_FILES['imgFile']['tmp_name'], $target_path)) {
            echo "The file ".  basename( $_FILES['imgFile']['name']).    " has been uploaded";
        } else {
            echo "There was an error uploading the file, please try again!";
        }
    }

    public function create_product(){
        // getdata
        $data=json_decode(file_get_contents("php://input"));

        $this->product->name            =   $data->name;
        $this->product->idCategory      =   $data->idCategory;
        $this->product->quantity        =   $data->quantity;
        $this->product->price           =   $data->price;
        $this->product->description     =   $data->description;
        $this->product->img             =   $data->img;

        if($this->product->create()) {
            echo json_encode(array('message'=> 'product created successfuly',
                    'state'=> true));
        }

        else {
            echo json_encode(array('message'=> 'product does not created successfully',
                    'state'=> false));
        }
    }
    public function getAll_product(){
        $rows = $this->product->getAll();
        if($rows){
            echo json_encode(array('message'=> $rows,
            'state'=> true));
        }else{
            echo json_encode(array('message'=> 'no Products found',
            'state'=> false));
        }

    }
    public function get_product($idProduct){
        $this->product->idProduct = $idProduct;
        $row = $this->product->get();
        if($row){
            echo json_encode(array('message'=>$row, 'state' =>true));
        }else{
            echo json_encode(array('message' =>'No Product found','state'=>false));
        }
    }
    public function update_product(){
        
        // getdata
        $data=json_decode(file_get_contents("php://input"));

        // push data into properties
        $this->product->idProduct       =   $data->idProduct;
        $this->product->name            =   $data->name;
        $this->product->idCategory      =   $data->idCategory;
        $this->product->quantity        =   $data->quantity;
        $this->product->price           =   $data->price;
        $this->product->description     =   $data->description;
        $this->product->img             =   $data->img;

        if($this->product->update()) {
            echo json_encode(array('message'=> 'product updated successfuly',
                    'state'=> true));
        }

        else {
            echo json_encode(array('message'=> 'product does not updated',
                    'state'=> false));
        }

    }
    public function delete_product($idProduct){
        $this->product->idProduct = $idProduct;
        if($this->product->delete()){
            echo json_encode(array('message'=>'the product was deleted', 'state' =>true));
        }else{
            echo json_encode(array('message' =>'the product was not deleted','state'=>false));
        }

    }
}
