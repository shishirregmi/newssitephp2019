<?php
session_start();

  if( $_SESSION['username']==null)
  {
   header('location: ../admin/login.php');

  }
  $authorname = $_SESSION['authorname'];

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
 <script>

  </script>
    </head>

<?php

    include_once '../database/db.php';
    include_once '../database/newspost.php';

    //instantiate database and product objects
    $database=new Database();
    $db=$database->getConnection();

    $newspost=new newspost($db);
    

    if ($_POST) {
      $newspost->Topic=$_POST['Title'];
      $newspost->NewsAuthor=$_POST['AName'];
      $newspost->NewsDate=$_POST['Ndate'];
      $newspost->News=$_POST['News'];
      $newspost->NewsType=$_POST['NewsType'];
      $newspost->NewsCat=$_POST['NewsCat'];
      $newspost->AdApp=$_POST['AdApp'];
      $newspost->EdiApp=$_POST['EdiApp'];
      if($newspost->AdApp==null)
      {
        $newspost->AdApp='no';
      }

      if($newspost->EdiApp==null)
      {
        $newspost->EdiApp='no';
      }


      
      $filetemp=$_FILES["image"]["temp_name"];
$filename=$_FILES["image"]["name"];
$filepath="postimage/".$filename;
move_uploaded_file($filetemp,$filepath );
$newspost->Image = 'img2.jpg';
        

    
    

      if ($newspost->create()) {
        echo "<div class='alert alert-sucess'>Student Data Entered</div>";
       header("Location: index.php");
      }
      else {
        echo "<div class='alert alert-sucess'>Failed Entering the Student's Data</div>";
      }
      }



   

?>
    <body class="fixed-left">

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
                                    <h4 class="page-title">Add Post </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li class="active">
                                             <?php echo "You are logged in as :".$_SESSION['username']?>
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->




                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">



<form action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Post Title</label>
 <input type="text" class="form-control" placeholder="Title" name="Title" required="required">
        
</div>

 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Post Date</label>
 <input type="Date" class="form-control" placeholder="Date" name="Ndate" value="<?php echo date("Y-m-d");?>">
        
</div>

 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Post Author</label>
 <input type="text" class="form-control" placeholder="Author Name" name="AName" required="required" value="<?php echo $authorname; ?>" readonly>
        
</div>



<div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Post Details</b></h4>
<textarea class="summernote" name="News" required></textarea>
</div>
</div>
</div>


<div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Feature Image</b></h4>
<input type="file" class="form-control" name="image"  >
</div>
</div>
</div>

 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Post Type : </label>
 <select name="NewsType">
            <option value="Moblie">Mobile</option>
            <option value="Pc">PC</option>
            <option value="Laptop">Laptop</option>
            <option value="Console">Console</option>
          </select>        
</div>


 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Post Category : </label>
<select name="NewsCat">
            <option value="BreakingNews">Breaking News</option>
            <option value="OrdinaryNews">Ordinary News</option>
            <option value="MinorNews">Minor News</option>
           
          </select>      
</div>

<?php 
if( $_SESSION['username']=='edi1' || $_SESSION['username']=='edi2' || $_SESSION['username']=='edi3')
{
?>

<div class="form-group m-b-20">
<label for="exampleInputEmail1">Editor Approval : </label>
<select name="AdApp">
             <option value="no">No</option>
            <option value="yes">Yes</option>
           
          </select>      
</div>

<?php 
}

?>

<?php 
if( $_SESSION['username']=='edimain')
{
?>
<div class="form-group m-b-20">
<label for="exampleInputEmail1">Admin Approval : </label>
<select name="EdiApp">
            <option value="no">No</option>
            <option value="yes">Yes</option>
          </select>      
</div>
<?php }?>

<button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Save and Post</button>
<a href='index.php' class='btn btn-danger left-margin'>
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
