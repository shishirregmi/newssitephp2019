<?php
class admin
{
 
    // database connection and table name
    private $conn;
    private $table_name = "adminpanel";
 
    // object properties
    public $UserId;
    public $UserName;
    public $AuthorName;
    public $UserPassword;
    public $UserEmail;
 
    public function __construct($db){
        $this->conn = $db;
    }



    //getdata
    public function getdata()
      {
         $query="SELECT * from adminpanel";
         $stmt=$this->conn->prepare( $query );
         $stmt->execute();
         return $stmt;
      }


      //count all

      public function countAll()
      {
         $query="SELECT COUNT(*) as total_rows from adminpanel";
         $stmt=$this->conn->prepare( $query );
         $stmt->execute();
         $row= $stmt->fetch(PDO::FETCH_ASSOC);
         return $row['total_rows'];
      }
 
    // create product
    function create(){
        $query = "INSERT INTO " . $this->table_name . "
                    SET UserId=:UserId, UserName=:UserName,AuthorName=:AuthorName, UserPassword=:UserPassword,
                        UserEmail=:UserEmail "; 
        $stmt = $this->conn->prepare($query);
        $this->UserId=htmlspecialchars(strip_tags($this->UserId));
        $this->UserName=htmlspecialchars(strip_tags($this->UserName));
        $this->AuthorName=htmlspecialchars(strip_tags($this->AuthorName));
        $this->UserPassword=htmlspecialchars(strip_tags($this->UserPassword));
        $this->UserEmail=htmlspecialchars(strip_tags($this->UserEmail));
        $stmt->bindParam(":UserId", $this->UserId);
        $stmt->bindParam(":UserName", $this->UserName);
         $stmt->bindParam(":AuthorName", $this->AuthorName);
        $stmt->bindParam(":UserPassword", $this->UserPassword);
        $stmt->bindParam(":UserEmail", $this->UserEmail);
       
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
    // delete the product
    function delete(){
     
        $query = "DELETE FROM " . $this->table_name . " WHERE UserId = ?";
         
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->UserId);
     
        if($result = $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

   
    function readOne(){
 
        $query = "SELECT UserId, UserName,AuthorName, UserPassword, UserEmail
            FROM " . $this->table_name . "
            WHERE UserId = ?
            LIMIT 0,1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->UserId);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        $this->UserId = $row['UserId'];
        $this->UserName = $row['UserName'];
        $this->AuthorName = $row['AuthorName'];
        $this->UserPassword = $row['UserPassword'];
        $this->UserEmail = $row['UserEmail'];
       
    }
    function update(){
 
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    
                    UserName = :UserName,
                    AuthorName = :AuthorName,
                    UserPassword = :UserPassword,
                    UserEmail  = :UserEmail                 
                WHERE
                    UserId = :UserId";
     
        $stmt = $this->conn->prepare($query);
        // posted values
        $this->UserId=htmlspecialchars(strip_tags($this->UserId));
        $this->UserName=htmlspecialchars(strip_tags($this->UserName));
                $this->AuthorName=htmlspecialchars(strip_tags($this->AuthorName));
        $this->UserPassword=htmlspecialchars(strip_tags($this->UserPassword));
        $this->UserEmail=htmlspecialchars(strip_tags($this->UserEmail));
        
     
        // bind parameters
        $stmt->bindParam(':UserId', $this->UserId);
        $stmt->bindParam(':UserName', $this->UserName);
        $stmt->bindParam(':AuthorName', $this->AuthorName);
        $stmt->bindParam(':UserPassword', $this->UserPassword);
        $stmt->bindParam(':UserEmail', $this->UserEmail);
       
     
        // execute the query
        if($stmt->execute()){
            return true;
        }
     
        return false;
         
    }

   

}