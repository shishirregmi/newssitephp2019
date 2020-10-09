<html>
<body>
<?php
   
   class journal
   {
      private $conn;
      private $table_name="journal";

 
      public $Id;
      public $NewsDate;
      public $Topic;
      public $NewsAuthor;
      public $News;
    

  
      public function __construct($db)
      {
         $this->conn=$db;
      }      

      public function countAll()
      {
         $query="SELECT COUNT(*) as total_rows from ". $this->table_name . "";
         $stmt=$this->conn->prepare( $query );
         $stmt->execute();
         $row= $stmt->fetch(PDO::FETCH_ASSOC);
         return $row['total_rows'];
      }
      public function getdata()
      {
         $query="SELECT * from ". $this->table_name . " ORDER BY Id DESC" ;
         $stmt=$this->conn->prepare( $query );
         $stmt->execute();
         return $stmt;
      }


      public function create()
      {

               $query="INSERT INTO ". $this->table_name . " ( NewsDate, Topic,NewsAuthor, News ) VALUES ('".$this->NewsDate."','". $this->Topic."','". $this->NewsAuthor."','". $this->News.")";

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



        function readOne(){
 

        $query1="SELECT COUNT(Id) as total_rows from " . $this->table_name . " where NewsId=".$this->NewsId."";
          $stmt=$this->conn->prepare( $query1 );
         $stmt->execute();
         $row= $stmt->fetch(PDO::FETCH_ASSOC);
          if($row['total_rows']>0)
          {                  

        $query = "SELECT Id, NewsDate, Topic,NewsAuthor, News  FROM " . $this->table_name . "    WHERE Id = ?       LIMIT 0,1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->NewsId);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
      $this->Id=$row['Id'];
      $this->NewsDate=$row['NewsDate'];
      $this->Topic=$row['Topic'];
      $this->NewsAuthor=$row['NewsAuthor'];
      $this->News=$row['News'];
     


    }
    else
    {
      return 0;
      }
    }




































      
   }

?>
</body>
</html>