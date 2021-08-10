<?php class Product {
    public $db;
    public $product;
    public $user;
    public $data;

    public function __construct() {
        // instantiate Database
        $database=new Database();
        $this->db=$database->connect();

        // instantiate User object
        $this->product=new Products($this->db);
        $this->user=new Users($this->db);

        // getdata
        $this->data=json_decode(file_get_contents("php://input"));
    }

    public function upload_img() {
        $target_path=$_SERVER['DOCUMENT_ROOT'].'/projet_fil_rouge/Public/resources/img/product/';
        $imgName=$_POST['imgName'];
        $target_path=$target_path . $imgName;

        if(move_uploaded_file($_FILES['imgFile']['tmp_name'], $target_path)) {
            echo "The file ". basename($_FILES['imgFile']['name']). " has been uploaded";
        }

        else {
            echo "There was an error uploading the file, please try again!";
        }
    }

    public function create_product() {
        $this->product->name            =$this->data->name;
        $this->product->idCategory      =$this->data->idCategory;
        $this->product->quantity        =$this->data->quantity;
        $this->product->price           =$this->data->price;
        $this->product->description     =$this->data->description;
        $this->product->img             =$this->data->img;
        $this->user->token              =$this->data->token;

        $role = $this->user->get_role_token();
        if ($this->user->check_token() && $role == "admin" ) {
            if($this->product->create()) {
                echo json_encode(array('message'=> 'product created successfuly',
                        'state'=> true));
            }
            else {
                echo json_encode(array('message'=> 'product does not created successfully',
                        'state'=> false));
            }
        }else{
            echo json_encode(array('message'=> 'product does not created successfully',
            'state'=> false));
        }
    }
    public function update_product() {

        // push this->data into properties
        $this->product->idProduct=$this->data->idProduct;
        $this->product->name=$this->data->name;
        $this->product->idCategory=$this->data->idCategory;
        $this->product->quantity=$this->data->quantity;
        $this->product->price=$this->data->price;
        $this->product->description=$this->data->description;
        $this->product->img=$this->data->img;
        $this->user->token              =$this->data->token;

        $role = $this->user->get_role_token();
        if ($this->user->check_token() && $role == "admin" ) {
            
            if($this->product->update()) {
                echo json_encode(array('message'=> 'product updated successfuly',
                        'state'=> true));
            }
    
            else {
                echo json_encode(array('message'=> 'product does not updated',
                        'state'=> false));
            }
        }else{
            echo json_encode(array('message'=> 'product does not updated',
            'state'=> false));
        }
    }

    public function delete_product() {

        // push this->data into properties
        $this->product->idProduct=$this->data->idProduct;
        $this->user->token              =$this->data->token;

        $role = $this->user->get_role_token();
        if ($this->user->check_token() && $role == "admin" ) {
            if($this->product->delete()) {
                echo json_encode(array('message'=>'the product was deleted', 'state'=>true));
            }
            else {
                echo json_encode(array('message'=>'the product was not deleted', 'state'=>false));
            }
        }else{
            echo json_encode(array('message'=>'the product was not deleted', 'state'=>false));
        }
    }
    public function getAll_product() {
        $rows=$this->product->getAll();

        if($rows) {
            echo json_encode(array('message'=> $rows,
                    'state'=> true));
        }
        else {
            echo json_encode(array('message'=> 'no Products found',
                    'state'=> false));
        }
    }
    /* for store */
    public function getAll_product_store() {
        $rows=$this->product->getAll_quantity_notNull();

        if($rows) {
            echo json_encode(array('message'=> $rows,
                    'state'=> true));
        }
        else {
            echo json_encode(array('message'=> 'no Products found',
                    'state'=> false));
        }
    }

    public function get_product($idProduct) {
        $this->product->idProduct=$idProduct;
        $row=$this->product->get();

        if($row) {
            echo json_encode(array('message'=>$row, 'state'=>true));
        }

        else {
            echo json_encode(array('message'=>'No Product found', 'state'=>false));
        }
    }

}