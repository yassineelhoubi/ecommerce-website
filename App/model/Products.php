<?php class Products {
    // db
    private $conn;
    //products properties
    public $idProduct;
    public $idCategory;
    public $name;
    public $quantity;
    public $price;
    public $description;
    public $img;
    

    public function __construct($db) {
        $this->conn=$db;
    }

    public function create(){

        $sql="INSERT INTO products (idCategory , name , quantity , price , description , img) VALUES (:idCategory , :name , :quantity , :price , :description , :img)";

        // Clean data
        $this->idCategory=htmlspecialchars(strip_tags($this->idCategory));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->quantity=htmlspecialchars(strip_tags($this->quantity));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->img=htmlspecialchars(strip_tags($this->img));

        // Prepare query
        $stmt=$this->conn->prepare($sql);

        // Bind data
        $stmt->bindParam(':idCategory', $this->idCategory);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':quantity', $this->quantity);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':img', $this->img);

        if($stmt->execute()) {
            return true;
        }

        else {
            return false;
        }

    }
    public function get(){
        $sql = "SELECT * FROM products WHERE idProduct = :idProduct";

        // Clean data
        $this->idProduct=htmlspecialchars(strip_tags($this->idProduct));

        // Prepare query
        $stmt=$this->conn->prepare($sql);

        // Bind data
        $stmt->bindParam(':idProduct', $this->idProduct);

        if($stmt->execute()) {
            $rowCount = $stmt->rowCount();
            if($rowCount == 0){
                return false;
            }else{
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row ;
            }
        }
        else {
            return false;
        }
    }
    public function getAll(){

        $sql="SELECT * FROM products";

        // Prepare query
        $stmt=$this->conn->prepare($sql);

        if($stmt->execute()) {
            $rowCount = $stmt->rowCount();
            if($rowCount == 0){
                return false;
            }else{
                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $row ;
            }
        }
        else {
            return false;
        }
    }

    public function update(){

        $sql="UPDATE products SET idCategory = :idCategory , name = :name ,quantity = :quantity ,price = :price ,description = :description ,img = :img   WHERE idProduct = :idProduct";

        // Clean data
        $this->idProduct=htmlspecialchars(strip_tags($this->idProduct));
        $this->idCategory=htmlspecialchars(strip_tags($this->idCategory));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->quantity=htmlspecialchars(strip_tags($this->quantity));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->img=htmlspecialchars(strip_tags($this->img));


        // Prepare query
        $stmt=$this->conn->prepare($sql);

        // Bind data
        $stmt->bindParam(':idProduct', $this->idProduct);
        $stmt->bindParam(':idCategory', $this->idCategory);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':quantity', $this->quantity);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':img', $this->img);

        if($stmt->execute()) {
            return true;
        }

        else {
            return false;
        }
    }
    public function delete(){
        $sql = "DELETE FROM products WHERE idProduct = :idProduct";

        // Clean data
        $this->idProduct=htmlspecialchars(strip_tags($this->idProduct));

        // Prepare query
        $stmt=$this->conn->prepare($sql);

        // Bind data
        $stmt->bindParam(':idProduct', $this->idProduct);

        if($stmt->execute()) {
            return true;
        }
        else {
            return false;
        }
    }





}