<html>
<body>
<?php
   
   class database
   {
      //Specify your own database credentials
      private $host="localhost";
      private $db_name="newsdb";
      private $username="root";
      private $password="";
      public $conn;
      //get the database connection
      public function getConnection()
      {
         $this->conn=null;
         try{ $this->conn=new PDO("mysql:host=" .  $this->host .  ";dbname=" . $this->db_name, $this->username, $this->password);
            }catch(PDOException $exception ){
               echo"connection error:".$exception->getMessage();

            }
            return $this->conn;
         }

   }
?>
</body>
</html>