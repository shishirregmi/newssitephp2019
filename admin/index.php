
<?php
session_start();

  if( $_SESSION['username']!="admin")
  {
    echo "<script>alert('Access Restricted!!!!.');</script>";
   
  }
  $adsession=$_SESSION['username'];

?>

<?php
if ($adsession!='admin') {
    header('location: ../admin/login.php');
 }
// set page headers
$page_title = "Admin";
include_once "layout_header.php";

    

// include database and object files
include_once '../database/db.php';
include_once '../database/admin.php';
 
// instantiate database and product object
$database = new database();
$db = $database->getConnection(); 
$admin = new admin($db);
$stmt=$admin->getdata();
$total_rows=$admin->countAll();
 



echo "<div class='right-button-margin'>";
    echo "<a href='create.php' class='btn btn-primary pull-right'>";
        echo "<span class='glyphicon glyphicon-plus'></span> Create Product";
    echo "</a>";
    echo "<a href='index.php' class='btn btn-default pull-right' style ='margin-right: 10px;'>Read Products</a>";
echo "</div>";
 
// display the products if there are any
if($total_rows>0){
 
    echo "<table id='maintable' class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>UserId</th>";
            echo "<th>UserName</th>";
            echo "<th>AuthorName</th>";
            echo "<th>UserPassword</th>";
            echo "<th>UserEmail</th>";
            echo "<th>Actions</th>";
        echo "</tr>";
 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){         
            extract($row);
 
            echo "<tr>";
                echo "<td>{$UserId}</td>";
                echo "<td>{$UserName}</td>";
                echo "<td>{$AuthorName}</td>";
                echo "<td>{$UserPassword}</td>";
                echo "<td>{$UserEmail}</td>";


                echo "<td>";
 
                    // read product button
                    echo "<a href='read_one.php?UserId={$UserId}' class='btn btn-primary left-margin'>";
                        echo "<span class='glyphicon glyphicon-list'></span> Read";
                    echo "</a>";
 
                    // edit product button
                    echo "<a href='update_product.php?id={$UserId}' class='btn btn-info left-margin'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
                    echo "</a>";
 
                    // delete product button
                    echo "<a delete-UserId='{$UserId}' class='btn btn-danger delete-object'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Delete";
                    echo "</a>";
 
                echo "</td>";
 
            echo "</tr>";
 
        }
 
    echo "</table>";
 

}
 
// tell the user there are no products
else{
    echo "<div class='alert alert-danger'>No products found.</div>";
}

?>


<?php
 
// footer
include_once "layout_footer.php";
?>


