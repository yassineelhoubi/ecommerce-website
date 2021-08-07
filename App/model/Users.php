 <?php
 class Users {
        // db
        private $conn;
        //users properties
        public $email;
        public $password;
        public $nbrPhone;
        // Client properties
        public $Fname;
        public $Lname;
        public $gender;
        public $address1 ;
        public $address2;
        public $id;
        public $token ;
        

    public function __construct($db)
    {
        $this->conn = $db;
    }
    /* register */
    public function checkemail(){
        $sql = "SELECT * FROM users WHERE email = :email";
        
        // Clean data
        $this->email = htmlspecialchars(strip_tags($this->email));

    
        // Prepare query
        $stmt = $this->conn->prepare($sql);

        // Bind data
        $stmt->bindParam(':email', $this->email);
        
        
        if ($stmt->execute()) {
            $rowCount        =   $stmt->rowCount();
            
            return $rowCount ;
        }
    }
    public function create()
    {
        
        $sql = " INSERT INTO users (role, email , password) VALUES ('customer' , :email , :password)";

        // Clean data
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));


        // Prepare query
        $stmt = $this->conn->prepare($sql);

        // Bind data
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        
        $stmt->execute();
        
        //get the last id from visitor table
        $last_id  = $this->conn->lastInsertId();

        
        
        $sql2 = "INSERT INTO customers (Fname, Lname,nbrPhone , gender , address1, address2, idCustomer) 
        VALUES (:Fname, :Lname, :nbrPhone , :gender , :address1, :address2,  ".$last_id.")";

        // clean client informations
        $this->Fname = htmlspecialchars(strip_tags($this->Fname));
        $this->Lname = htmlspecialchars(strip_tags($this->Lname));
        $this->nbrPhone = htmlspecialchars(strip_tags($this->nbrPhone));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->address1 = htmlspecialchars(strip_tags($this->address1));
        $this->address2 = htmlspecialchars(strip_tags($this->address2));

        $stmt1 = $this->conn->prepare($sql2);
        
        // bind data
        $stmt1->bindParam(':Fname', $this->Fname);
        $stmt1->bindParam(':Lname', $this->Lname);
        $stmt1->bindParam(':nbrPhone', $this->nbrPhone);
        $stmt1->bindParam(':gender', $this->gender);
        $stmt1->bindParam(':address1', $this->address1);
        $stmt1->bindParam(':address2', $this->address2);

        
        if ($stmt1->execute()) {
            return true;
        }

        // print error if something goes wrong
        printf("Error %s.\n", $stmt1->error);
        return false;
    }
    /* login  */
    public function login(){
        $sql = "SELECT * FROM users WHERE email = :email";
        
        // Clean data
        $this->email = htmlspecialchars(strip_tags($this->email));

    
        // Prepare query
        $stmt = $this->conn->prepare($sql);

        // Bind data
        $stmt->bindParam(':email', $this->email);
        
        
        if ($stmt->execute()) {
            $row        =   $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $row ;
        }

        // print error if something goes wrong
        printf("Error %s.\n", $stmt->error);
        return false;
    }
    public function gen_token()
    {
        $customAlphabet = '0123456789ABCDEFabcdefghijklmnopqrstuvwxyz@-';
        $token = password_hash(uniqid($customAlphabet, true), PASSWORD_DEFAULT);

        return $token;
    }
    public function gave_token(){
        $sql="UPDATE users SET token = :token WHERE id = $this->id";
        
        // Prepare query
        $stmt = $this->conn->prepare($sql);

        // Bind data
        $stmt->bindParam(':token', $this->token);
        
        
        if ($stmt->execute()) {
            
            return true ;
        }

        return false;
    }
    public function check_token(){
        $sql="SELECT * FROM users WHERE token = :token";
        
        // Prepare query
        $stmt = $this->conn->prepare($sql);

        // Bind data
        $stmt->bindParam(':token', $this->token);
        
        
        if ($stmt->execute()) {
            
            $row        =   $stmt->rowcount();
            if($row == 1){

                return true ;
            }else{
                return false;
            }
            
        }

        return false;
    }
    public function get_role_token(){
        $sql="SELECT role FROM users WHERE token = :token";
        
        // Prepare query
        $stmt = $this->conn->prepare($sql);

        // Bind data
        $stmt->bindParam(':token', $this->token);
        
        
        if ($stmt->execute()) {
            
            $row        =   $stmt->fetch(PDO::FETCH_ASSOC);

            return $row['role'];
        }

        return false;
    }

}