
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
$page_title = "Subscribers";
include_once "layout_header.php";

    

// include database and object files
include_once '../database/db.php';
include_once '../database/subscriber.php';
 
// instantiate database and product object
$database = new database();
$db = $database->getConnection(); 
$sub = new sub($db);
$stmt=$sub->getdata();
$total_rows=$sub->countAll();
 



echo "<div class='right-button-margin'>";
    echo "<a href='logout.php' class='btn btn-primary pull-right'>";
        echo "<span class='glyphicon glyphicon-plus'></span> Create Subscriber";
    echo "</a>";
    echo "<a href='index.php' class='btn btn-default pull-right' style ='margin-right: 10px;'>Read Products</a>";
echo "</div>";
 
// display the products if there are any
if($total_rows>0){
 
    echo "<table id='maintable' class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>User Id</th>";
            echo "<th>User Name</th>";
            echo "<th>Subscriber Name</th>";
            echo "<th>User Password</th>";
            echo "<th>User Email</th>";
            echo "<th>Actions</th>";
        echo "</tr>";
 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){         
            extract($row);
 
            echo "<tr>";
                echo "<td>{$SId}</td>";
                echo "<td>{$SUserName}</td>";
                echo "<td>{$SName}</td>";
                echo "<td>{$SPassword}</td>";
                echo "<td>{$SEmail}</td>";


                echo "<td>";
 
                    // read product button
                 
 
                    // edit product button
                    echo "<a href='update_product.php?id={$SId}' class='btn btn-info left-margin'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
                    echo "</a>";
 
                    // delete product button
                    echo "<a delete-UserId='{$SId}' class='btn btn-danger delete-object'>";
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


