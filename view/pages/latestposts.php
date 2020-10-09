
<?php
    

    $stmt=$newspost1->getdataselected();
    $total_rows1=$newspost1->countAll();
  
      if($total_rows1==0){
      	echo "Hello Viewers";
      	?>
?>


<?php 
} else {
	while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    extract($row);
?><li>
                <div class="media wow fadeInDown"> <a href="../../view/pages/single_page.php?id=<?php echo "{$NewsId}"?>" class="media-left"> <img alt="" src="../../newseditor/postimages/<?php echo "{$Image}";?>"> </a>
                  <div class="media-body"> <a href="../../view/pages/single_page.php?id=<?php echo "{$NewsId}"?>" class="catg_title"><?php echo "{$Topic}";?></a> </div>
                </div>
              </li>

   <?php
  
  }
}
    ?>