<?php

 $newspost->NewsId = $id;
 
// read the details of newspost to be read
$newspost->readOne();
$newsid=$newspost->NewsId;
$newstopic=$newspost->Topic;
$author=$newspost->NewsAuthor;
$dateposted=$newspost->NewsDate;
$newstype=$newspost->NewsType;
$mainnews=$newspost->News;
$imagepost=$newspost->Image;


$newspost->PageCount();
?>



<div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb">
              <li><a href="../index.html">Home</a></li>
              <li class="active"><?php echo $newstype?></li>
            </ol>
            <h1><?php echo $newstopic?></h1>
            <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i><?php echo $author?></a> <span><i class="fa fa-calendar"></i><?php echo $dateposted?></span> <a href="#"><i class="fa fa-tags"></i><?php echo $newstype?></a><i class="fa fa-user">Total View = <?php echo $newspost->PageView ?></i> </div>
            <div class="single_page_content"> <img class="img-center" src="../../newseditor/postimages/<?php echo $imagepost?>" alt="">
              <p><?php echo $mainnews?>
              
            </div>
           
 <div class="social_link">
              <?php include'../../comment/index.php'?>
            </div>
            <div class="social_link">
              <?php include'../../comment/viewcomment.php'?>
            </div>
            <div class="related_post">
              <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">
                <li>
                  <div class="media"> <a class="media-left" href="single_page.html"> <img src="../images/post_img1.jpg" alt=""> </a>
                    <div class="media-body"> <a class="catg_title" href="single_page.html"> Aliquam malesuada diam eget turpis varius</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media"> <a class="media-left" href="single_page.html"> <img src="../images/post_img2.jpg" alt=""> </a>
                    <div class="media-body"> <a class="catg_title" href="single_page.html"> Aliquam malesuada diam eget turpis varius</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media"> <a class="media-left" href="single_page.html"> <img src="../images/post_img1.jpg" alt=""> </a>
                    <div class="media-body"> <a class="catg_title" href="single_page.html"> Aliquam malesuada diam eget turpis varius</a> </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
