<?php
session_start();

  if( $_SESSION['username']==null)
  {
   header('location: ../admin/login.php');

  }

?>

<?php
// set page headers
// read newsposts button
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-primary pull-right'>";
        echo "<span class='glyphicon glyphicon-list'></span> Read newsposts";
    echo "</a>";
echo "</div>";
 
// get ID of the newspost to be read
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
 
// include database and object files
    include_once '../database/db.php';
    include_once '../database/newspost.php';

    //instantiate database and newspost objects
    $database=new Database();
    $db=$database->getConnection();

    $newspost=new newspost($db);

 
// set ID property of newspost to be read
$newspost->NewsId = $id;
 
// read the details of newspost to be read
$newspost->readOne();


// HTML table for displaying a newspost details
echo "<table class='table table-hover table-responsive table-bordered'>";
 
    echo "<tr>";
        echo "<td>Topic</td>";
        echo "<td>{$newspost->Topic}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Date</td>";
        echo "<td>{$newspost->NewsDate}</td>";
    echo "</tr>";
     echo "<tr>";
        echo "<td>Category</td>";
        echo "<td>{$newspost->NewsCat}</td>";
    echo "</tr>";
     echo "<tr>";
        echo "<td>Type</td>";
        echo "<td>{$newspost->NewsType}</td>";
    echo "</tr>";
 
    
    echo "<tr>";
        echo "<td>Image</td>";
        echo "<td>";                        
            echo $newspost->Image ? "<img src='../images/{$newspost->Image}' style='width:300px;' />" : "This News Has No Image";
        echo "</td>";

    echo "</tr>";

    echo "<tr>";
        echo "<td>News</td>";
        echo "<td>{$newspost->News}</td>";
    echo "</tr>";
 
echo "</table>";

// set footer
include_once "layout_footer.php";
?>