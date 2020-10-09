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
function getSubCat(val) {
  $.ajax({
  type: "POST",
  url: "get_subcategory.php",
  data:'catid='+val,
  success: function(data){
    $("#subcategory").html(data);
  }
  });
  }
  </script>
    </head>


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
              $newspost->NewsAuthor=$_POST['AName'];
              $newspost->NewsDate=$_POST['SDate'];
              $newspost->Topic=$_POST['STopic'];
              $newspost->News=$_POST['SNews'];
             // $newspost->Image=$_POST['SSection'];
              $newspost->NewsType=$_POST['SType'];
              $newspost->NewsCat=$_POST['SCat'];
              $newspost->AdApp=$_POST['AdApp'];
              $newspost->EdiApp=$_POST['EdiApp'];
              if ($newspost->update()) {
                echo "<div class='alert alert-sucess'> Data Updated Successfully</div>";
                //header("Location: index.php"); 
              }
              else {
                echo "<div class='alert alert-sucess'>Failed Updating the Data</div>";
            }  
         } 
         echo "<script type='text/javascript'>alert('".$newspost->Topic."')</script>";
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
<!---Success Message--->  




</div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">
<form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>' method='POST'>
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">News Id</label>
<input type='text' class='form-control' value='<?php echo $newspost->NewsId; ?>' placeholder='News ID' name='SId' required='required' readonly>
</div>



<div class="form-group m-b-20">
<label for="exampleInputEmail1">News Topic</label>
<input type='text' class='form-control' value='<?php echo $newspost->Topic; ?>' placeholder='News Topic' name='STopic'>
</div>
    
<div class="form-group m-b-20">
<label for="exampleInputEmail1">Date</label>
<input type='Date' class='form-control' value='<?php echo $newspost->NewsDate; ?>' placeholder='Date' name='SDate' required='required'>
</div>
         
          <div class="form-group m-b-20">
<label for="exampleInputEmail1">Post Author</label>
 <input type="text" class="form-control" placeholder="Author Name" name="AName" required="required" value="<?php echo $authorname; ?>" readonly>
        
</div>

     <div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Post Details</b></h4>
<textarea class="summernote" name="SNews" required><?php echo $newspost->News; ?></textarea>
</div>
</div>
</div>

 <div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Post Image</b></h4>
<?php if($newspost->Image!=null){?>
<img src="postimages/<?php echo $newspost->Image; ?>" width="300"/>
<?php }
else
{
    echo "This News Has No Image";
}?>
<br />
<input type="file" class="form-control" id="postimage" name="image"  >
</div>
</div>
</div>

<div class="form-group m-b-20">
<label for="exampleInputEmail1">Post Type : </label>
 <input type="text" name="SType" value="<?php echo $newspost->NewsType; ?>">       
</div>


 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Post Category : </label>
<input type="text" name="SCat" value="<?php echo $newspost->NewsCat; ?>">                
</div>


<?php 
if( $_SESSION['username']=='edi1' || $_SESSION['username']=='edi2' || $_SESSION['username']=='edi3')
{
?>

<div class="form-group m-b-20">
<label for="exampleInputEmail1">Editor Approval : </label>
<select name="EdiApp" value="<?php echo $newspost->EdiApp; ?>">
             <option value="no">no</option>
            <option value="yes">yes</option>
           
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
<select name="AdApp" value="<?php echo $newspost->AdApp; ?>">
            <option value="no">no</option>
            <option value="yes">yes</option>
           
          </select>      
</div>
<?php }?>
<button type="submit" name="update" class="btn btn-success waves-effect waves-light">Update </button>
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
