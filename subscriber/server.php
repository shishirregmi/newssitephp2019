<?php

session_start();
// initializing variables
$susername = "";
$sname="";
$semail = "";
$serrors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'newsdb');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $susername = mysqli_real_escape_string($db, $_POST['susername']);
  $sname = mysqli_real_escape_string($db, $_POST['sname']);
  $semail = mysqli_real_escape_string($db, $_POST['semail']);
  $spassword_1 = mysqli_real_escape_string($db, $_POST['spassword_1']);
  $spassword_2 = mysqli_real_escape_string($db, $_POST['spassword_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($susername)) { array_push($errors, "Username is required"); }
  if (empty($semail)) { array_push($errors, "Email is required"); }
  if (empty($spassword_1)) { array_push($errors, "Password is required"); }
  if ($spassword_1 != $spassword_2) {
  array_push($serrors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM sub WHERE SUserName='$susername' OR SEmail='$semail' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['SUserName'] === $susername) {
      array_push($serrors, "Username already exists");
    }

    if ($user['SEmail'] === $semail) {
      array_push($serrors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $spassword = md5($spassword_1);//encrypt the password before saving in the database

    $query = "INSERT INTO sub (SUserName , SName, SEmail, SPassword) 
          VALUES('$susername','$sname', '$semail', '$spassword')";
    mysqli_query($db, $query);
    $_SESSION['susername'] = $susername;
    $_SESSION['sname'] = $sname;
    $_SESSION['success'] = "You are now logged in";
    header('location: ../subscriber/logout.php');
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
  $susername = mysqli_real_escape_string($db, $_POST['susername']);
  $spassword = mysqli_real_escape_string($db, $_POST['spassword']);

  if (empty($susername)) {
    array_push($serrors, "Username is required");
  }
  if (empty($spassword)) {
    array_push($serrors, "Password is required");
  }

  if (count($errors) == 0) {
    $spassword = md5($spassword);
    $query = "SELECT * FROM sub WHERE SUserName='$susername' AND SPassword='$spassword'";
  
    $results = mysqli_query($db, $query);
    $user1 = mysqli_fetch_assoc($results);
  
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['susername'] = $susername;
      $_SESSION['sname'] = $user1['SName'];
      echo 
      $_SESSION['success'] = "You are now logged in";
      header('location: ../index.php');
    }else {
      array_push($serrors, "Wrong username/password combination");
    }
  }
}

?>