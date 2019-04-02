<?php 
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "login";
 private $table_name1 = "student";
    // object properties
    public $id;
    public $username;
    public $password;
    public $s_name;
 public $sem;
public $department;
public $address;
public $gender;
public $email;
public $name;
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
    function signup(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET  username=:username, password=:password";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
       // $this->created=htmlspecialchars(strip_tags($this->created));
    
        // bind values
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
      //  $stmt->bindParam(":created", $this->created);
    
        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }
    
        return false;
        
    }
function register(){

 if($this->isAlreadyExist()){
            return false;
        }
        // query to insert record
        $query = "INSERT INTO ".$this->table_name1." SET  s_name=:s_name, sem=:sem, department=:department, address=:address, email=:email ,  gender=:gender";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->s_name=htmlspecialchars(strip_tags($this->s_name));
        $this->sem=htmlspecialchars(strip_tags($this->sem));
        $this->department=htmlspecialchars(strip_tags($this->department));
         $this->address=htmlspecialchars(strip_tags($this->address));
       $this->email=htmlspecialchars(strip_tags($this->email));
$this->gender=htmlspecialchars(strip_tags($this->gender));
        // bind values
        $stmt->bindParam(":s_name", $this->s_name);
        $stmt->bindParam(":sem", $this->sem);
        $stmt->bindParam(":department", $this->department);
         $stmt->bindParam(":address", $this->address);
         $stmt->bindParam(":email", $this->email);
         $stmt->bindParam(":gender", $this->gender);
//         execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
          return true;
        }
    
        return false;
        
}

    // login user
    function login(){
        // select all query
	//$_SESSION["username"]=$this->name=$this->username;
        $query = "SELECT  `id`, `username`, `password`  FROM    " . $this->table_name . "  WHERE  username='".$this->username."' AND password='".$this->password."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }
    function isAlreadyExist(){
        $query = "SELECT *  FROM  " . $this->table_name . "   WHERE  username='".$this->username."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
  function sessionvalue(){
  $name1=$_SESSION["username"];
       return name1;
}
}