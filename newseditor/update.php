<?php
session_start();

  if( $_SESSION['username']==null)
  {
   header('location: ../admin/login.php');

  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Update</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

 
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../project1/index.html"><b>Hello College</a>
  </div>

  


<?php


    $NewsId = isset($_GET['NewsId']) ? $_GET['NewsId'] : 0;
 include_once '../database/db.php';
    include_once '../database/newspost.php';


    //instantiate database and product objects
     $database=new Database();
    $db=$database->getConnection();

    $newspost=new newspost($db);
    
    $newspost->NewsId = $NewsId;
    $newspost->readOne();

   
    
   
   if ($_POST) 
   {
      $newspost->NewsId=$_POST['SId'];
        

        $total_rows=$newspost->IdCount();


    
    

        if($total_rows>0)
        {
              $newspost->NewsId=$_POST['SId'];
              $newspost->NewsDate=$_POST['SDate'];
              $newspost->Topic=$_POST['STopic'];
              $newspost->News=$_POST['SNews'];
              $newspost->Image=$_POST['SSection'];
              $newspost->NewsType=$_POST['SType'];
              $newspost->NewsCat=$_POST['SCat'];

              if ($newspost->update()) {
                echo "<div class='alert alert-sucess'>newspost Data Updated Successfully</div>";
                header("Location: index.php"); 
              }
              else {
                echo "<div class='alert alert-sucess'>Failed Updating the newspost's Data</div>";
            }  
        }  
    }

            
include_once 'updateform.php';
     
 
     



?>





  



<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>

