
<?php
session_start();

  error_reporting(0);
     $adsession=$_SESSION['sname'];

    include_once '../../database/db.php';
    include_once '../../database/comments.php';

    //instantiate database and product objects
    $database=new Database();
    $db=$database->getConnection();

    $cmnt=new cmnt($db);
    

    if ($_POST) {
      $cmnt->CName=$_POST['CName'];
      $cmnt->Coment=$_POST['Coment'];
      $cmnt->CDate=date("Y-m-d");
      $cmnt->NId=$newsid;
      $cmnt->SName=$newstopic;
      $cmnt->approval='yes';
      
          

      if ($cmnt->create()) {
        header("Location: index.php");
      }
      else {
        echo "<div class='alert alert-sucess'>Failed Entering the Student's Data</div>";
      }
      }



   if($adsession==null)
   {
    echo "<h2>Login to comment!!!<h2>";
   }
   else
   {

?>


  <form action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
  	<div >
  	  <label >Name</label>
       <input type="text" class="form-control"  placeholder="Full Name" name="CName" required="required" >
  	</div>
    
  	
  	<div class="form-group has-feedback">
      <label>Comment</label>
      <textarea class="form-control"  placeholder="Comment" name="Coment" required="required"> </textarea>
  	</div>
   
    
    

   
          <div class="row">
            
                  <button type="submit" class="btn btn-primary btn-block btn-flat" name="reg_user">Comment</button>
             </form>
          </div>
        <!-- /.col -->
       <?php }?>
   