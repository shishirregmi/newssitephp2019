<?php
// retrieve one product will be here
 session_start();

  if( $_SESSION['username']==null)
  {
   header('location: ../admin/login.php');

  }
  
if ($adsession!='admin') {
    header('location: ../newseditor/index.php');
 }
// set page header
$page_title = "Update Product";
include_once "layout_header.php";
 
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>Read Products</a>";
echo "</div>";

// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
 
// include database and object files
include_once '../database/db.php';
include_once '../database/admin.php';
 
// instantiate database and product object
$database = new database();
$db = $database->getConnection();
 
$admin = new admin($db);

 
// set ID property of product to be edited
$admin->UserId = $id;
 
// read the details of product to be edited
$admin->readOne();
 
?>

<?php 
// if the form was submitted
if($_POST){
 
    // set product property values
    $admin->UserId = $_POST['UserId'];
    $admin->UserName = $_POST['UserName'];
    $admin->AuthorName = $_POST['AuthorName'];
    $admin->UserPassword = $_POST['UserPassword'];
    $admin->UserEmail = $_POST['UserEmail'];
 

    
    

    // update the product
    if($admin->update()){        
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "Product was updated.";
        echo "</div>";
    }
 
    // if unable to update the product, tell the user
    else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "Unable to update product.";
        echo "</div>";
    }
}
?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'> 
         <tr>
            <td>UserId</td>
            <td><input type='text' name='UserId' value='<?php echo $admin->UserId; ?>' class='form-control' /></td>
        </tr> 
 
        <tr>
            <td>UserName</td>
            <td><input type='text' name='UserName' value='<?php echo $admin->UserName; ?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>UserName</td>
            <td><input type='text' name='AuthorName' value='<?php echo $admin->AuthorName; ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>UserPassword</td>
            <td><input type='password' name='UserPassword' value='<?php echo $admin->UserPassword; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>UserEmail</td>
            <td><input type='text' name='UserEmail' value='<?php echo $admin->UserEmail; ?>' class='form-control' /></td>
        </tr> 
        
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
 
    </table>
</form>

<?php
 
// set page footer
include_once "layout_footer.php";
?>