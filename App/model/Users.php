 <?php
 class Users {
        // db
        private $conn;
        // Client properties
        public $Fname;
        public $Lname;
        public $nbrPhone;
        public $email;
        public $Adresse1 ;
        public $Adresse2;
        public $password;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = " INSERT INTO users (role, email, password) VALUES ('customer' , :email, :password)";

        // Clean data
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));


        // Prepare query
        $stmt = $this->conn->prepare($query);

        // Bind data
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        
        $stmt->execute();
        
        //get the last id from visitor table
        $last_id  = $this->conn->lastInsertId();

        
        
        $query2 = "INSERT INTO customer (Fname, Lname, nbrPhone, Adresse1, Adresse2, idCustomer) 
        VALUES (:Fname, :Lname, :nbrPhone, :Adresse1, :Adresse2,  ".$last_id.")";

        // clean client informations
        $this->Fname = htmlspecialchars(strip_tags($this->Fname));
        $this->Lname = htmlspecialchars(strip_tags($this->Lname));
        $this->nbrPhone = htmlspecialchars(strip_tags($this->nbrPhone));
        $this->Adresse1 = htmlspecialchars(strip_tags($this->Adresse1));
        $this->Adresse2 = htmlspecialchars(strip_tags($this->Adresse2));

        $stmt1 = $this->conn->prepare($query2);
        
        // bind data
        $stmt1->bindParam(':Fname', $this->Fname);
        $stmt1->bindParam(':Lname', $this->Lname);
        $stmt1->bindParam(':nbrPhone', $this->nbrPhone);
        $stmt1->bindParam(':Adresse1', $this->Adresse1);
        $stmt1->bindParam(':Adresse2', $this->Adresse2);

        
        if ($stmt1->execute()) {
            return true;
        }

        // print error if something goes wrong
        printf("Error %s.\n", $stmt->error);
        return false;
    }
}