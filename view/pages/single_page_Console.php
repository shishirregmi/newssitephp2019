
<?php
// set page headers

// get ID of the newspost to be read 
// include database and object files
    include_once '../../database/db.php';
    include_once '../../database/newspost.php';
    include_once '../../database/comments.php';

    //instantiate database and newspost objects
    $database=new Database();
    $db=$database->getConnection();

    $newspost=new newspost($db);
    $newspost1=new newspost($db);
    $newspostm=new newspost($db);
    $newspostp=new newspost($db);
    $newspostl=new newspost($db);
    $newspostc=new newspost($db);
    $newspostbr=new newspost($db);
    $newsposttopic=new newspost($db);
    $cmnt = new cmnt($db);
 
// set ID property of newspost to be read
?>
<!DOCTYPE html>
<html>
<head>
<title>NewsFeed</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="../assets/css/font.css">
<link rel="stylesheet" type="text/css" href="../assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="../assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="../assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="../assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
<!--[if lt IE 9]>
<script src="../assets/js/html5shiv.min.js"></script>
<script src="../assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
             <li><a href="index.php">Home</a></li>
             <?php  error_reporting(0);if($adsession==null){ 
              ?>
              <li><a href="../../subscriber/login.php">Login</a></li>
           <?php }
            else{
              ?>
              <li><a href="../../subscriber/logout.php">Logout</a></li>
           <?php }?>
              <li><a href="contact.php">Contact</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <p><?php echo date("Y-m-d");?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="index.php" class="logo"><img src="images/logo.jpg" alt=""></a></div>
          <div class="add_banner"><a href="#"><img src="images/addbanner_728x90_V1.jpg" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>
  <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          <li class="active"><a href="../index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
          <li><a href="#">Mobile</a></li>
          <li><a href="#">Laptop</a></li>
          <li><a href="#">Pc</a></li>
          <li><a href="pages/404.php">Console</a></li>
          <li><a href="pages/contact.php">Contact Us</a></li>
        </ul>
      </div>
    </nav>
  </section>
  <section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>Latest News</span>
          <ul id="ticker01" class="news_sticker">
                <?php
              include 'topiconly.php';
            ?>       
          </ul>
          <div class="social_area">
            <ul class="social_nav">
              <li class="facebook"><a href="#"></a></li>
              <li class="twitter"><a href="#"></a></li>
              <li class="flickr"><a href="#"></a></li>
              <li class="pinterest"><a href="#"></a></li>
              <li class="googleplus"><a href="#"></a></li>
              <li class="vimeo"><a href="#"></a></li>
              <li class="youtube"><a href="#"></a></li>
              <li class="mail"><a href="#"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <ul>
            <?php
    

    $stmt=$newspostc->getdataselectedconsoleall();
    $text=$newspostc->News;
    $total_rowsc=$newspostc->countAll();
  
      if($total_rowsc==0){
        echo "Hello Viewers";
        ?>
?>


<?php 
} else {
  while($rowc = $stmt->fetch(PDO::FETCH_ASSOC))
{
    extract($rowc);
  ?>              <li></li><li>
                <div class="media wow fadeInDown"><div class="media-body"> <a href="../../view/pages/single_page.php?id=<?php echo "{$NewsId}"?>" class="catg_title"><h2><?php echo "{$Topic}";?></h2> </div><br> <a href="../../view/pages/single_page.php?id=<?php echo "{$NewsId}"?>" class="media-left"> <img alt="" src="../../newseditor/postimages/<?php echo "{$Image}";?>"> </a>
                  <div class="media-body"> <a href="../../view/pages/single_page.php?id=<?php echo "{$NewsId}"?>" class="catg_title"><?php echo substr($text, 0,50);?></a> </div>
                </div>
              </li>
              <br><hr><br>

   <?php
  
  }
}
    ?>
  </ul>
            
          </div>
        </div>
      </div>
      <nav class="nav-slit"> <a class="prev" href="#"> <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
        <div>
          <h3>City Lights</h3>
          <img src="../images/post_img1.jpg" alt=""/> </div>
        </a> <a class="next" href="#"> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
        <div>
          <h3>Street Hills</h3>
          <img src="../images/post_img1.jpg" alt=""/> </div>
        </a> </nav>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
            <ul class="spost_nav">
              <?php 
                  include 'popularview.php';
              ?>
          </div>
          <div class="single_sidebar">
            <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
            <ul class="spost_nav">
              <?php 
                  include 'latestposts.php';
              ?>
          </div>
            </div>
          </div>
          
    </div>
  </section>
  <footer id="footer">
    <div class="footer_top">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInLeftBig">
          
          </div>
        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInRightBig">
           <h2>Contact</h2>
            <p>Contact us at Mobile No:987654321</p>
            <address>
            Paknajol , Kathmandu.
            </address>
        </div>
      </div>
    </div>
    <div class="footer_bottom">
      <p class="copyright">Copyright &copy; 2019 <a href="../index.html">NewsFeed</a></p>
      <p class="developer">Developed By Wpfreeware</p>
    </div>
  </footer>
</div>
<script src="../assets/js/jquery.min.js"></script> 
<script src="../assets/js/wow.min.js"></script> 
<script src="../assets/js/bootstrap.min.js"></script> 
<script src="../assets/js/slick.min.js"></script> 
<script src="../assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="../assets/js/jquery.newsTicker.min.js"></script> 
<script src="../assets/js/jquery.fancybox.pack.js"></script> 
<script src="../assets/js/custom.js"></script>
</body>
</html>