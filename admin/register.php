
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

 include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Enter New Data</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../plugins/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/plugins/iCheck/square/blue.css">

 
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../project1/index.php"><b>Hello College</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Enter a new Student Data</p>


  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="form-group has-feedback">
  	  
       <input type="text" class="form-control"  placeholder="User Name" name="username" required="required">
  	</div>
    <div class="form-group has-feedback">
      
       <input type="text" class="form-control"  placeholder="Full Name" name="authorname" required="required">
    </div>
  	<div class="form-group has-feedback">
      <input type="email" class="form-control"  placeholder="Email" name="email" required="required">
  	</div>
  <div class="form-group has-feedback">
      <input type="password" class="form-control"  placeholder="Password" name="password_1" required="required">
  	</div>
  	<div class="form-group has-feedback">
      <input type="password" class="form-control"  placeholder="Confirm Passowrd" name="password_2" required="required">
  	</div>

   <div class="row">
          <div class="col-xs-8">
            
                  <button type="submit" class="btn btn-primary btn-block btn-flat" name="reg_user"><span class="glyphicon glyphicon-plus"></span>Create</button>
             </form>
          </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <form action="../admin/index.php">
                        <button type="submit" class="btn btn-danger" >
                        <span class="glyphicon glyphicon-remove"></span>Cancel
                        </button>
                  </form>
          
        </div>
</body>
</html>