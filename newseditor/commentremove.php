<?php
// check if value was post\

if($_POST){
 
    // include database and object file
    include_once '../database/db.php';
    include_once '../database/comments.php';

    
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // prepare product object
    $cmnt = new cmnt($db);
     
    // set product id to be deleted
    $cmnt->CId = $_POST['object_id'];
     


    // delete the product
    if($cmnt->delete()){
        echo "Object was deleted.";
    }


     
    // if unable to delete the product
    else{
        echo "Unable to delete object.";
    }

}
?>