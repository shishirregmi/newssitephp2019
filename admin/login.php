<?php include('server.php') ?>
<?php
error_reporting(0);
session_start();

  if( $_SESSION['username']!=null)
  {
   header('location: ../newseditor/index.php');

  }
  echo $_SESSION['susername'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
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
    <a href="../project1/index.html"><b>Tech News </a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg"><php echo $_SESSION['subname'];?> Administration Log In</p>

   
  <form method="post" action="login.php">
    <?php include('errors.php'); ?>
    
    <div class="form-group has-feedback">
      <label for="exampleInputEmail1">User Name</label>
        <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
    <div class="form-group has-feedback">
      <label for="exampleInputEmail1">Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
    <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="login_user">Login</button>
        </div>
       
        <!-- /.col -->
      </div>
    

  </form>
</body>
</html>