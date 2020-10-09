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


    $CId = isset($_GET['CId']) ? $_GET['CId'] : 0;
    include_once '../database/db.php';
    include_once '../database/comments.php';



    //instantiate database and product objects
     $database=new Database();
      $db=$database->getConnection();

    $cmnt = new cmnt($db);
    
    $cmnt->CId = $CId;
    $cmnt->readOne();
    
   
    
   
   if ($_POST) 
   {
      //$cmnt->CId=$_POST['CId'];
        // $total_rows=$cmnt->IdCount();


    
    

       // if($total_rows>0)
       // {
              $cmnt->CId=$_POST['CId'];
              $cmnt->CName=$_POST['CName'];
             
              $cmnt->comnet=$_POST['cmnt'];
              $cmnt->CDate=$_POST['CDate'];
              $cmnt->NId=$_POST['NId'];
              $cmnt->SName=$_POST['SName'];
              $cmnt->approval=$_POST['approval'];
              $newsidforview=$cmnt->NId;

              if ($cmnt->updatedata()) {
                echo "<div class='alert alert-sucess'>cmnt Data Updated Successfully</div>";
                header("Location:../view/pages/single_page.php?id=$newsidforview"); 
              }
              else {
                echo "<div class='alert alert-sucess'>Failed Updating the cmnt's Data</div>";
            }  
       // }  
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
    <label for="exampleInputEmail1">cmnt Id</label>
        <input type='number' class='form-control' value='<?php echo $cmnt->CId; ?>' placeholder='cmntscriber ID' name='CId' required='required' readonly>
        
      </div>
      <div class="form-group m-b-20">
    <label for="exampleInputEmail1">Full Name</label>
        <input type='text' class='form-control' value='<?php echo $cmnt->CName; ?>' placeholder='cmntscriber Name' name='CName' required='required'>
      </div>
        
     
       <div class="form-group m-b-20">
    <label for="exampleInputEmail1">News Id</label>
        <input type='number' class='form-control' value='<?php echo $cmnt->NId; ?>' placeholder='cmntscriber ID' name='NId' required='required' readonly>
        
      </div>

 <div class="form-group m-b-20">
    <label for="exampleInputEmail1">News Title</label>
        <input type='text' class='form-control' value='<?php echo $cmnt->SName; ?>' placeholder='cmntscriber Name' name='SName' required='required'>
      </div>

      <div class="form-group m-b-20">
    <label for="exampleInputEmail1">Comment</label>
        <input type='text' class='form-control' value='<?php echo $cmnt->Coment; ?>' placeholder='cmntscriber Name' name='cmnt' required='required'>
      </div>
      <div class="form-group m-b-20">
    <label for="exampleInputEmail1">Date</label>
        <input type='date' class='form-control' value='<?php echo $cmnt->CDate; ?>' placeholder='cmntscriber ID' name='CDate' required='required' >
        
      </div>
      <div class="form-group m-b-20">
    <label for="exampleInputEmail1">Approval Status</label>
        <input type='text' class='form-control' value='<?php echo $cmnt->approval; ?>' placeholder='Approval Status' name='approval' required='required'>
      </div>

<button type="cmntmit" name="update" class="btn btn-success waves-effect waves-light">Update </button>
 <a href='cmntview.php' class='btn btn-danger left-margin'>
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
