<?php
session_start();
	$con=mysql_connect('localhost','bharat_regmi','jaljala4') or die(mysl_error());
		mysql_select_db('bharat_regmi',$con);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bharat Regmi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style_red.css">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
	
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet"> 

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    <script src="js/application.js"></script>
</head>	
<body bgcolor="#006633">

<div class="main">

<div class="container">



<div class="row-fluid">


	
	<!--
    <div class="span3"><br/>
	<div class="pull-right">
	<a href="#"  original-title="facebook"><img src="icon/facebook.png"  alt="facebook"></a>
	<a href="#"  original-title="Delicious"><img src="icon/digg.png"  alt="Delicious"></a>
	<a href="#"  original-title="myspace"><img src="icon/myspace.png" alt="myspace"></a><br/><br/>
	</div>
	</div>
	<div class="pull-right">
	<a href="#"  original-title="facebook"><img src="css/images/admin/facebook.jpg" width="23" height="22" alt="facebook"></a>
	<a href="#"  original-title="Delicious"><img src="css/images/admin/delicious.jpg" width="23" height="22" alt="Delicious"></a>
	<a href="#"  original-title="Digg"><img src="css/images/admin/digg.jpg" width="23" height="22" alt="Digg"></a>
	<a href="#"  original-title="Twitter"><img src="css/images/admin/twitter.jpg" width="23" height="22" alt="Twitter"></a>
	<a href="#"  original-title="Stumbleupon"><img src="css/images/admin/stumbleupon.jpg" width="23" height="22" alt="Stumbleupon"></a> <br/><br/>
	</div> -->
</div>
	<div class="banner">
    	<img src="img/baner.png">
    </div>

<div class="navbar">
    <div class="navbar-inner">
      <div class="container">
        <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        
        <div class="nav-collapse">
          <ul class="nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li class="active"><a href="#">Portfolio</a></li>
            <li class="active"><a href="Galary.php">Gallery</a></li>
            <li class="active"><a href="date/date.php">Date Convert</a></li>
            <li class="active"><a href="#">Software</a></li>
            <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">Contact<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">About Us</a></li>
                <li><a href="Contact.php">Contact Us</a></li>
                
              </ul>
            </li>
          </ul>
          
         
        </div><!-- /.nav-collapse -->
      </div>
    </div><!-- /navbar-inner -->
  </div>
	<div class="add">
    <h1 style="text-align:center; background-color:#0F6; color:#F00; font-variant:small-caps;">For your information</h1>
   	  <p style="text-align:justify; color:#00F; font-size:16px; font-size-adjust:inherit; font-stretch:extra-expanded;font-stretch:wider; ">आज विश्व २१ औं शताब्दीको अन्त्यतिर आईसकेको छ । आजको समयमा विज्ञान र प्रविधिले दुनियाँलाई एकातिर यति साँघुरो बनाईदिएको छ कि विश्वको कुनैपनि ठाउँमा २४ घण्टाको अन्तरमा भ्रमण गर्नलाई सम्भव बनाईदिएको छ । अर्कोतिर विश्वको कुनैपनि एकठाउँमा बसेर विश्वको कुनै पनि ठाउँ र परिस्थितिको बारेमा अध्ययन एवं अनुसन्धान गर्न सम्भव बनाईदिएको छ । <br>
तर विश्वले विज्ञान र प्रविधिको बिकास गरिसक्दा पनि नेपाल र नेपाली प्रविधिको क्षेत्रमा निकै पछि परेको यथार्थ पनि सत्य हो । विश्व प्रविधिको प्रयोगमा यति अगाडि पुगिसक्दा पनि हामी निकै पछाडि छौं । अबको परिस्थिति भने बदलिन लागेको छ र यसलाई बदल्नु नै जरुरी छ । <br>

प्रविधिको यहि याथार्थलाई आत्मसात गर्दै हामी यहाँहरुको सहयोगको लागि सेवामा हाजिर भएका छौ । हामीलाई सहयोग गर्ने मौका अवश्यदिनु हुनेछ । <br>

हामी यहाँहरुलाई निम्न बमोजिम का सेवा र सुविधाहरु प्रदान गर्दछौं । <br>

<strong><h2>हाम्रा सेवाहरु :</strong></h2>

<font style="color:#030; font-weight:bold;background-color:#FF6; font-size:18px;">हरेक प्रकारका वेभर्साईट निर्माण, डिजाईन, वेभ होस्टिड., यहाँहरुको आवश्यकता अनुसारका सफ्टवेर एप्लीकेशन निर्माण, डेक्सटप सम्बन्धी सम्पूर्ण कार्यहरु, कम्प्युटर मर्मत, लगायत विविध सेवाहरु । </font><br><br>


<strong><h4 style="color:#F00; background-color:#FFF;">अन्य जानकारीको लागि सर्म्पर्क गर्नुहोस् :</h4></strong><br>

<strong><P style="font-size:18px; color:#300;">भरत रेग्मी</P></strong>

<strong><p style="font-size:15px;">९८५११५३५३०<br>

९८४१३३९४०५</p></strong>

<i><a href="regmi427@hotmail.com">regmi427@hotmail.com</i>
</p>
    </div>
<button type="button" class="gb"><a href="index.php"><font style="color:#FF0; font-weight:bold;">Back To Homepage</font></a></div></button>


<!--Footer start-->
<div class="footer">

        <div class="span3" style="margin-top:6px;"><a href="#"  original-title="myspace"><img src="icon/soc3.png" alt="myspace"></a><a href="#"  original-title="facebook"><img src="icon/soc1.png"  alt="facebook"></a><a href="#"  original-title="Delicious"><img src="icon/soc2.png"  alt="Delicious"></a>
        </div>
       <div class="copy" style="margin-top:6px; float:left;"> <strong>copyright @ <a href="www.bharatregmi.com.np">Bharat Regmi</a>; Allright reserved.</strong>            
    </div>
    
    <div class="design" style="margin-top:6px;"> <strong>Desigine By: <a href="bharatregmi.com.np">Bharat Regmi</strong>            
    </div>
            
        
        
        </div>
</div>


<style>
.main
	{
		background-color:#9FF;
		
	}
	
	
.design
	{
		float:right;
		color:#F00;
		
	}
	
.gb
	{
		background-image:url(img/Button.png);
	}
	
.footer
	{
		width:100%;
	}
</style>
	
<script>
$(function() {
	$('#theme_switcher ul li a').bind('click',
		function(e) {
			$("#switch_style").attr("href", "css/"+$(this).attr('rel')+"/bootstrap.min.css");    		
			return false;
		}
	);
});
</script>
</div>
</body>

</html>