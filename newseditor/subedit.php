<?php
session_start();

  if( $_SESSION['username']==null)
  {
   header('location: ../admin/login.php');

  }
  ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Newsportal | Add Post</title>

        <!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

        <!-- Select2 -->
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Jquery filer css -->
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>
 
    </head>


    <body class="fixed-left">
<?php


    $SubId = isset($_GET['SubId']) ? $_GET['SubId'] : 0;
    include_once '../database/db.php';
    include_once '../database/subscriber.php';



    //instantiate database and product objects
     $database=new Database();
      $db=$database->getConnection();

    $sub=new sub($db);
    
    $sub->SubId = $SubId;
    $sub->readOne();

   
    
   
   if ($_POST) 
   {
      $sub->SubId=$_POST['SId'];
        

        $total_rows=$sub->IdCount();


    
    

        if($total_rows>0)
        {
              $sub->SubId=$_POST['SId'];
              $sub->SubName=$_POST['SName'];
              $sub->SubUserName=$_POST['SUserName'];
              $sub->Password=md5($_POST['SPassword']);
              $sub->SubEmail=$_POST['SEmail'];

              if ($sub->update()) {
                echo "<div class='alert alert-sucess'>sub Data Updated Successfully</div>";
                header("Location: subview.php"); 
              }
              else {
                echo "<div class='alert alert-sucess'>Failed Updating the sub's Data</div>";
            }  
        }  
    }
    ?>
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
           <?php include('includes/topheader.php');?>
            <!-- ========== Left Sidebar Start ========== -->
             <?php include('includes/leftsidebar.php');?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Edit Post </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                       <li class="active">
                                             <?php echo "You are logged in as :".$_SESSION['authorname']?>
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

<div class="row">
<div class="col-sm-6">  






</div>


                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">



 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  method="post">

<div class="form-group m-b-20">
    <label for="exampleInputEmail1">Subscriber Id</label>
        <input type='number' class='form-control' value='<?php echo $sub->SubId; ?>' placeholder='Subscriber ID' name='SId' required='required' readonly>
        
      </div>
      <div class="form-group m-b-20">
    <label for="exampleInputEmail1">Subscriber Name</label>
        <input type='text' class='form-control' value='<?php echo $sub->SubName; ?>' placeholder='Subscriber Name' name='SName' required='required'>
      </div>
      <div class="form-group m-b-20">
    <label for="exampleInputEmail1">User Name</label>
        <input type='text' class='form-control' value='<?php echo $sub->SubUserName; ?>' placeholder='User Name' name='SUserName'>
      </div>
      <div class="form-group m-b-20">
    <label for="exampleInputEmail1">Password</label>
        <input type='Password' class='form-control' value='<?php echo $sub->Password; ?>' placeholder='Password' name='SPassword'>
      </div>
      <div class="form-group m-b-20">
    <label for="exampleInputEmail1">Email</label>
        <input type='text' class='form-control' value='<?php echo $sub->SubEmail; ?>' placeholder='Email' name='SEmail'>
      </div>

<button type="submit" name="update" class="btn btn-success waves-effect waves-light">Update </button>
 <a href='subview.php' class='btn btn-danger left-margin'>
                       <span class='glyphicon glyphicon-cross'></span> Cancel
                  </a>
</form>

                                    </div>
                                </div> <!-- end p-20 -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->



                    </div> <!-- container -->

                </div> <!-- content -->

           <?php include('includes/footer.php');?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>
        <!-- Select 2 -->
        <script src="../plugins/select2/js/select2.min.js"></script>
        <!-- Jquery filer js -->
        <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

        <!-- page specific js -->
        <script src="assets/pages/jquery.blog-add.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script>

            jQuery(document).ready(function(){

                $('.summernote').summernote({
                    height: 240,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });
                // Select2
                $(".select2").select2();

                $(".select2-limiting").select2({
                    maximumSelectionLength: 2
                });
            });
        </script>
  <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>



    </body>
</html>
