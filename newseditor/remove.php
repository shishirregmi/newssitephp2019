<?php
// check if value was post\

if($_POST){
 
    // include database and object file
     include_once '../database/db.php';
    include_once '../database/newspost.php';
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // prepare product object
    $newspost = new newspost($db);
     
    // set product id to be deleted
    $newspost->NewsId = $_POST['object_id'];
     


    // delete the product
    if($newspost->delete()){
        echo "Object was deleted.";
    }


     
    // if unable to delete the product
    else{
        echo "Unable to delete object.";
    }

}
?>