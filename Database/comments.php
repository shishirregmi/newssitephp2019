<html>
<body>
<?php
   
   class cmnt
   {
      private $conn;
      private $table_name="cmnt";

 
      public $CId;
      public $CName;
      public $Coment;
      public $CDate;
      public $NId;
      public $SName;
      public $approval;



  
    public function __construct($db){
        $this->conn = $db;
    }


      public function countAll()
      {
         $query="SELECT COUNT(*) as total_rows from " . $this->table_name . "";
         $stmt=$this->conn->prepare( $query );
         $stmt->execute();
         $row= $stmt->fetch(PDO::FETCH_ASSOC);
         return $row['total_rows'];
      }
      public function getdata()
      {
         $query="SELECT * from " . $this->table_name . "";
         $stmt=$this->conn->prepare( $query );
         $stmt->execute();
         return $stmt;
      }
  public function getdatadesc()
      {
         $query="SELECT * from " . $this->table_name . "  ORDER BY CId DESC LIMIT 3";
         $stmt=$this->conn->prepare( $query );
         $stmt->execute();
         return $stmt;
      }

      public function create()
      {
       
           $query="INSERT INTO " . $this->table_name . " (CId, CName, Coment, CDate,NId,SName,approval) VALUES ('".$this->CId."', '".$this->CName."', '". $this->Coment." ','". $this->CDate."','". $this->NId." ','". $this->SName."','". $this->approval."')";
            $stmt=$this->conn->prepare( $query );
            if($stmt->execute())
            {
            return 1;
         }
         else
         {
            return 0;
         }
        
      }

      public function delete(){
     
       $query = "DELETE FROM " . $this->table_name . " WHERE CId = ?";
       
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->CId);
     
        if($result = $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }


    function readOne(){
 
        $query1="SELECT COUNT(CId) as total_rows from " . $this->table_name . " where CId=".$this->CId."";
          $stmt=$this->conn->prepare( $query1 );
         $stmt->execute();
         $row= $stmt->fetch(PDO::FETCH_ASSOC);
          if($row['total_rows']>0)
          {                  

        $query = "SELECT CId , CName , Coment , CDate , NId , SName, approval   FROM " . $this->table_name . "    WHERE CId = ?       LIMIT 0,1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->CId);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        $this->CId = $row['CId'];
        $this->CName = $row['CName'];
        $this->Coment = $row['Coment'];
        $this->CDate = $row['CDate'];
        $this->SName = $row['SName'];
        
        $this->NId = $row['NId'];
        $this->approval = $row['approval'];
    }
    
function IdCount(){
 

        $query1="SELECT COUNT(CId) as total_rows from " . $this->table_name . " where CId=".$this->CId."";
          $stmt=$this->conn->prepare( $query1 );
         $stmt->execute();
         $row= $stmt->fetch(PDO::FETCH_ASSOC);
         return $row['total_rows'];
    }


 function updatedata(){
 
        $query = "UPDATE  " . $this->table_name . "
                SET
                    CId = :CId,                    
                    CName  = :CName,
                    Coment = :Coment,
                    CDate  = :CDate, 
                    SName  = :SName,                    
                    NId  = :NId,   
                    approval  = :approval               
                WHERE
                    CId = :CId";
     
       
     
        // posted values
        $this->CId=htmlspecialchars(strip_tags($this->CId));
        $this->CName=htmlspecialchars(strip_tags($this->CName));
        $this->Coment=htmlspecialchars(strip_tags($this->Coment));
        $this->CDate=htmlspecialchars(strip_tags($this->CDate));
        $this->SName=htmlspecialchars(strip_tags($this->SName));      
        $this->NId=htmlspecialchars(strip_tags($this->NId));
        $this->approval=htmlspecialchars(strip_tags($this->approval));
       
     
        // bind parameters
        $stmt->bindParam(':CId', $this->CId);
        $stmt->bindParam(':CName', $this->CName);
        $stmt->bindParam(':Coment', $this->Coment);
        $stmt->bindParam(':CDate', $this->CDate);
        $stmt->bindParam(':SName', $this->SName);   
        $stmt->bindParam(':NId', $this->NId);
        $stmt->bindParam(':approval', $this->approval);
        // execute the query
        if(mysqli_query($db, $query)){
            return true;
        }
     
        return false;
         
    }




}
}

?>
</body>
</html>