<?php
    

    $stmt=$newspostbr->getdataselectedbreaking();
    $total_rowsbr=$newspostbr->countAll();
  
      if($total_rowsbr==0){
      	echo "Hello Viewers";
      	?>
?>


<?php 
} else {
	while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    extract($row);
?>
               <div class="single_iteam"> <a href="../../view/pages/single_page.php?id=<?php echo "{$NewsId}"?>"> <img alt="" src="../newseditor/postimages/<?php echo "{$Image}";?>"> </a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="../../view/pages/single_page.php?id=<?php echo "{$NewsId}"?>"><?php echo "{$Topic}";?></a></h2><br>
             
            </div>
          </div>

   <?php
  
  }
}
    ?>


     