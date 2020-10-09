

<?php 

session_start();

  if( $_SESSION['username']==null)
  {
   header('location: ../admin/login.php');

  }
  
if ($adsession!='admin') {
    header('location: ../newseditor/index.php');
 }
// check if value was posted
if($_POST){
 
    // include database and object file
  include_once '../database/db.php';
include_once '../database/admin.php';
 
    // get database connection
    $database = new database();
    $db = $database->getConnection();
 
    // prepare product object
    $admin = new admin($db);
     
    // set product id to be deleted
    $admin->UserId = $_POST['object_id'];
     
    // delete the product
    if($admin->delete()){
        echo "Object was deleted.";
    }
     
    // if unable to delete the product
    else{
        echo "Unable to delete object.";
    }
}
?>