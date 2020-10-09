<?php
// check if value was post\

if($_POST){
 
    // include database and object file
    include_once '../database/db.php';
    include_once '../database/subscriber.php';

    
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // prepare product object
    $sub = new sub($db);
     
    // set product id to be deleted
    $sub->SubId = $_POST['object_id'];
     


    // delete the product
    if($sub->delete()){
        echo "Object was deleted.";
    }


     
    // if unable to delete the product
    else{
        echo "Unable to delete object.";
    }

}
?>