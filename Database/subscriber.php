<?php
class sub
{
 
    // database connection and table name
    private $conn;
    private $table_name = "sub";
 
    // object properties
    public $SId;
    public $SUserName;
    public $SName;
    public $SPassword;
    public $SEmail;
 
    public function __construct($db){
        $this->conn = $db;
    }



    //getdata
    public function getdata()
      {
         $query="SELECT * from sub";
         $stmt=$this->conn->prepare( $query );
         $stmt->execute();
         return $stmt;
      }


      //count all

      public function countAll()
      {
         $query="SELECT COUNT(*) as total_rows from sub";
         $stmt=$this->conn->prepare( $query );
         $stmt->execute();
         $row= $stmt->fetch(PDO::FETCH_ASSOC);
         return $row['total_rows'];
      }
 
    // create product
    function create(){
        $query = "INSERT INTO " . $this->table_name . "
                    SET SId=:SId, SUserName=:SUserName,SName=:SName, SPassword=:SPassword,
                        SEmail=:SEmail "; 
        $stmt = $this->conn->prepare($query);
        $this->SId=htmlspecialchars(strip_tags($this->SId));
        $this->SUserName=htmlspecialchars(strip_tags($this->SUserName));
        $this->SName=htmlspecialchars(strip_tags($this->SName));
        $this->SPassword=htmlspecialchars(strip_tags($this->SPassword));
        $this->SEmail=htmlspecialchars(strip_tags($this->SEmail));
        $stmt->bindParam(":SId", $this->SId);
        $stmt->bindParam(":SUserName", $this->SUserName);
         $stmt->bindParam(":SName", $this->SName);
        $stmt->bindParam(":SPassword", $this->SPassword);
        $stmt->bindParam(":SEmail", $this->SEmail);
       
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
    // delete the product
    function delete(){
     
        $query = "DELETE FROM " . $this->table_name . " WHERE SId = ?";
         
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->SId);
     
        if($result = $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

   
    function readOne(){
 
        $query = "SELECT SId, SUserName,SName, SPassword, SEmail
            FROM " . $this->table_name . "
            WHERE SId = ?
            LIMIT 0,1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->SId);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        $this->SId = $row['SId'];
        $this->SUserName = $row['SUserName'];
        $this->SName = $row['SName'];
        $this->SPassword = $row['SPassword'];
        $this->SEmail = $row['SEmail'];
       
    }
    function update(){
 
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    
                    SUserName = :SUserName,
                    SName = :SName,
                    SPassword = :SPassword,
                    SEmail  = :SEmail                 
                WHERE
                    SId = :SId";
     
        $stmt = $this->conn->prepare($query);
        // posted values
        $this->SId=htmlspecialchars(strip_tags($this->SId));
        $this->SUserName=htmlspecialchars(strip_tags($this->SUserName));
                $this->SName=htmlspecialchars(strip_tags($this->SName));
        $this->SPassword=htmlspecialchars(strip_tags($this->SPassword));
        $this->SEmail=htmlspecialchars(strip_tags($this->SEmail));
        
     
        // bind parameters
        $stmt->bindParam(':SId', $this->SId);
        $stmt->bindParam(':SUserName', $this->SUserName);
        $stmt->bindParam(':SName', $this->SName);
        $stmt->bindParam(':SPassword', $this->SPassword);
        $stmt->bindParam(':SEmail', $this->SEmail);
       
     
        // execute the query
        if($stmt->execute()){
            return true;
        }
     
        return false;
         
    }

   

}