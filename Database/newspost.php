<html>
<body>
<?php
   
   class newspost
   {
      private $conn;
      private $table_name="newspost";

 
      public $NewsId;
      public $NewsDate;
      public $Topic;
      public $NewsAuthor;
      public $News;
      public $Image;
      public $NewsType;
      public $NewsCat;
      public $PageView;
      public $AdApp;
      public $EdiApp;
 

  
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
         $query="SELECT * from ". $this->table_name . " ORDER BY NewsId DESC" ;
         $stmt=$this->conn->prepare( $query );
         $stmt->execute();
         return $stmt;
      }
public function getdataselected()
      {
         $query="SELECT * from ". $this->table_name . " ORDER BY NewsId DESC LIMIT 5";
         $stmt=$this->conn->prepare( $query );
         $stmt->execute();
         return $stmt;
      }

      public function getdataselectedmobile()
      {
         $query="SELECT * from ". $this->table_name . " Where NewsType='Mobile' ORDER BY NewsId DESC LIMIT 5";
         $stmt=$this->conn->prepare( $query );
         $stmt->execute();
         return $stmt;
      }

      public function getdataselectedconsole()
      {
         $query="SELECT * from ". $this->table_name . " Where NewsType='Console' ORDER BY NewsId DESC LIMIT 5";
         $stmt=$this->conn->prepare( $query );
         $stmt->execute();
         return $stmt;
      }

      public function getdataselectedconsoleall()
      {
         $query="SELECT * from ". $this->table_name . " Where NewsType='Console' ORDER BY NewsId DESC";
         $stmt=$this->conn->prepare( $query );
         $stmt->execute();
         return $stmt;
      }
      public function getdataselectedpc()
      {
         $query="SELECT * from ". $this->table_name . " Where NewsType='Pc' ORDER BY NewsId DESC LIMIT 5";
         $stmt=$this->conn->prepare( $query );
         $stmt->execute();
         return $stmt;
      }

       public function getdataselectedlaptop()
      {
         $query="SELECT * from ". $this->table_name . " WHERE NewsType='Laptop' ORDER BY NewsId DESC LIMIT 5";
         $stmt=$this->conn->prepare( $query );
         $stmt->execute();
         return $stmt;
      }
      public function getdataselectedlaptopall()
      {
         $query="SELECT * from ". $this->table_name . " Where NewsType='Laptop' ORDER BY NewsId DESC";
         $stmt=$this->conn->prepare( $query );
         $stmt->execute();
         return $stmt;
      }


      public function getdataselectedbreaking()
      {
         $query="SELECT * from ". $this->table_name . " Where NewsCat='BreakingNews' ORDER BY NewsId DESC LIMIT 4";
         $stmt=$this->conn->prepare( $query );
         $stmt->execute();
         return $stmt;
      }
      public function getdataselectedtopic()
      {
         $query="SELECT * from ". $this->table_name . "  ORDER BY NewsId DESC LIMIT 4";
         $stmt=$this->conn->prepare( $query );
         $stmt->execute();
         return $stmt;
      }

      public function getdataselectedviews()
      {
         $query="SELECT * from ". $this->table_name . "  ORDER BY PageView DESC LIMIT 5";
         $stmt=$this->conn->prepare( $query );
         $stmt->execute();
         return $stmt;
      }


      public function create()
      {

               $query="INSERT INTO ". $this->table_name . " (Image, NewsDate, Topic,NewsAuthor, News, NewsType , NewsCat,AdApp,EdiApp ) VALUES ('".$this->Image."','".$this->NewsDate."','". $this->Topic."','". $this->NewsAuthor."','". $this->News."','". $this->NewsType."','". $this->NewsCat."','". $this->AdApp."','". $this->EdiApp."')";

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

      function delete(){
     
        $query = "DELETE FROM " . $this->table_name . " WHERE NewsId = ?";
         
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->NewsId);
     
        if($result = $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }



        function readOne(){
 

        $query1="SELECT COUNT(NewsId) as total_rows from " . $this->table_name . " where NewsId=".$this->NewsId."";
          $stmt=$this->conn->prepare( $query1 );
         $stmt->execute();
         $row= $stmt->fetch(PDO::FETCH_ASSOC);
          if($row['total_rows']>0)
          {                  

        $query = "SELECT NewsId, NewsDate, Topic,NewsAuthor, News, Image ,NewsType, NewsCat, PageView,AdApp,EdiApp  FROM " . $this->table_name . "    WHERE NewsId = ?       LIMIT 0,1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->NewsId);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
      $this->NewsId=$row['NewsId'];
      $this->NewsDate=$row['NewsDate'];
      $this->Topic=$row['Topic'];
      $this->NewsAuthor=$row['NewsAuthor'];
      $this->News=$row['News'];
      $this->Image=$row['Image'];
      $this->NewsType=$row['NewsType'];
      $this->NewsCat=$row['NewsCat'];
      $this->PageView=$row['PageView'];
      $this->AdApp=$row['AdApp'];
      $this->EdiApp=$row['EdiApp'];


    }
    else
    {
      return 0;
      }
    }



    function PageCount(){
     $this->PageView++;
                  
      $query1 ="UPDATE " . $this->table_name . " SET PageView = " . $this->PageView . "  WHERE NewsId =".$this->NewsId."";
      $stmt = $this->conn->prepare( $query1 );
      $stmt->execute();
    
    }
    


    function update(){
 
        $query = "UPDATE     " . $this->table_name . "
                SET
                    NewsId = :NewsId,
                    NewsDate = :NewsDate,
                    Topic = :Topic,
                    NewsAuthor = :NewsAuthor,
                    News = :News,
                    Image  = :Image,
                    NewsType = :NewsType,
                    NewsCat = :NewsCat,
                    AdApp = :AdApp,
                    EdiApp = :EdiApp,
                WHERE
                    NewsId = :NewsId";
     
        $stmt = $this->conn->prepare($query);
     
        // posted values
        $this->NewsId=htmlspecialchars(strip_tags($this->NewsId));
        $this->NewsDate=htmlspecialchars(strip_tags($this->NewsDate));
        $this->Topic=htmlspecialchars(strip_tags($this->Topic));
        $this->NewsAuthor=htmlspecialchars(strip_tags($this->NewsAuthor));
        $this->News=htmlspecialchars(strip_tags($this->News));
        $this->Image=htmlspecialchars(strip_tags($this->Image));
        $this->NewsType=htmlspecialchars(strip_tags($this->NewsType));
        $this->NewsCat=htmlspecialchars(strip_tags($this->NewsCat));
        $this->AdApp=htmlspecialchars(strip_tags($this->AdApp));
        $this->EdiApp=htmlspecialchars(strip_tags($this->EdiApp));

        // bind parameters
        $stmt->bindParam(':NewsId', $this->NewsId);
        $stmt->bindParam(':NewsDate', $this->NewsDate);
        $stmt->bindParam(':Topic', $this->Topic);
        $stmt->bindParam(':NewsAuthor', $this->NewsAuthor);
        $stmt->bindParam(':News', $this->News);
        $stmt->bindParam(':Image', $this->Image);
        $stmt->bindParam(':NewsType', $this->NewsType);
        $stmt->bindParam(':NewsCat', $this->NewsCat);
        $stmt->bindParam(':AdApp', $this->AdApp);
        $stmt->bindParam(':EdiApp', $this->EdiApp);
        
        // execute the query
        if($stmt->execute()){
            return true;
        }
     
        return false;
         
    }


      function IdCount(){
 

        $query1="SELECT COUNT(NewsId) as total_rows from " . $this->table_name . " where NewsId=".$this->NewsId."";
          $stmt=$this->conn->prepare( $query1 );
         $stmt->execute();
         $row= $stmt->fetch(PDO::FETCH_ASSOC);
         return $row['total_rows'];
    }


    function NewsCount(){
 

        $query1="SELECT COUNT(*) as total_rows from " . $this->table_name . "";
          $stmt=$this->conn->prepare( $query1 );
         $stmt->execute();
         $row= $stmt->fetch(PDO::FETCH_ASSOC);
         $count=$row['total_rows'];
         return $count;
    }

    function NewsTypeCount(){
 

        $query1="SELECT COUNT(*) as total_rows from " . $this->table_name . " where NewsType='".$this->NewsType."'";
          $stmt=$this->conn->prepare( $query1 );
         $stmt->execute();
         $row= $stmt->fetch(PDO::FETCH_ASSOC);
         $count=$row['total_rows'];
         return $count;
    }


function NewsAuthCount(){
 

        $query1="SELECT COUNT(*) as total_rows from " . $this->table_name . " where NewsAuthor='".$this->NewsAuthor."'";
          $stmt=$this->conn->prepare( $query1 );
         $stmt->execute();
         $row= $stmt->fetch(PDO::FETCH_ASSOC);
         $count=$row['total_rows'];
         return $count;
    }

 function uploadPhoto(){
     
        $result_message="";
     
        // now, if image is not empty, try to upload the image
        if($this->Image){
     
            // sha1_file() function is used to make a unique file name
            $target_directory = "postimages/";
            $target_file = $target_directory . $this->Image;
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
     
            // error message is empty
            $file_upload_error_messages="";

            // make sure that file is a real image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check!==false){
                // submitted file is an image
            }else{
                $file_upload_error_messages.="<div>Submitted file is not an image.</div>";
            }
             
            // make sure certain file types are allowed
            $allowed_file_types=array("jpg", "jpeg", "png", "gif");
            if(!in_array($file_type, $allowed_file_types)){
                $file_upload_error_messages.="<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
            }
             
            // make sure file does not exist
            if(file_exists($target_file)){
                $file_upload_error_messages.="<div>Image already exists. Try to change file name.</div>";
            }
             
            // make sure submitted file is not too large, can't be larger than 1 MB
            if($_FILES['Image']['size'] > (1024000)){
                $file_upload_error_messages.="<div>Image must be less than 1 MB in size.</div>";
            }
             
            // make sure the 'uploads' folder exists
            // if not, create it
            if(!is_dir($target_directory)){
                mkdir($target_directory, 0777, true);
            }

            // if $file_upload_error_messages is still empty
            if(empty($file_upload_error_messages)){
                // it means there are no errors, so try to upload the file
                if(move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file)){
                  echo "<script>
                  alert(".$_FILES['Image']['tmp_name'].")
                  </script>";
                  //echo $target_file;
                    // it means photo was uploaded
                }else{
                    $rdesult_message.="<div class='alert alert-danger'>";
                        $result_message.="<div>Unable to upload photo.</div>";
                        $result_message.="<div>Update the record to upload photo.</div>";
                    $result_message.="</div>";
                }
            }
             
            // if $file_upload_error_messages is NOT empty
            else{
                // it means there are some errors, so show them to user
                $result_message.="<div class='alert alert-danger'>";
                    $result_message.="{$file_upload_error_messages}";
                    $result_message.="<div>Update the record to upload photo.</div>";
                $result_message.="</div>";
            }
     
        }
     
        return $result_message;
    }
    
      



































      
   }

?>
</body>
</html>