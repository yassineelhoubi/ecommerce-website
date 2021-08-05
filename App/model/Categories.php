<?php class Categories {
    // db
    private $conn;
    //categories properties
    public $idCategory;
    public $category_name;

    public function __construct($db) {
        $this->conn=$db;
    }

    public function create() {

        $sql="INSERT INTO categories (category_name) VALUES (:category_name)";

        // Clean data
        $this->category_name=htmlspecialchars(strip_tags($this->category_name));


        // Prepare query
        $stmt=$this->conn->prepare($sql);

        // Bind data
        $stmt->bindParam(':category_name', $this->category_name);

        if($stmt->execute()) {
            return true;
        }

        else {
            return false;
        }


    }

    public function update() {

        $sql="UPDATE categories SET category_name = :category_name WHERE idCategory = :idCategory";

        // Clean data
        $this->category_name=htmlspecialchars(strip_tags($this->category_name));
        $this->idCategory=htmlspecialchars(strip_tags($this->idCategory));


        // Prepare query
        $stmt=$this->conn->prepare($sql);

        // Bind data
        $stmt->bindParam(':category_name', $this->category_name);
        $stmt->bindParam(':idCategory', $this->idCategory);

        if($stmt->execute()) {
            return true;
        }

        else {
            return false;
        }
    }
    public function getAll(){
        $sql="SELECT * FROM categories ORDER BY idCategory DESC";

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
    public function get(){
        $sql = "SELECT * FROM categories WHERE idCategory = :idCategory";

        // Clean data
        $this->idCategory=htmlspecialchars(strip_tags($this->idCategory));

        // Prepare query
        $stmt=$this->conn->prepare($sql);

        // Bind data
        $stmt->bindParam(':idCategory', $this->idCategory);

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
    public function delete(){
        $sql = "DELETE FROM categories WHERE idCategory = :idCategory";

        // Clean data
        $this->idCategory=htmlspecialchars(strip_tags($this->idCategory));

        // Prepare query
        $stmt=$this->conn->prepare($sql);

        // Bind data
        $stmt->bindParam(':idCategory', $this->idCategory);

        if($stmt->execute()) {
            return true;
        }
        else {
            return false;
        }

    }


}