<?php
    

    $stmt=$newspostm->getdataselectedmobile();
    $total_rowsm=$newspostm->countAll();
  
      if($total_rowsm==0){
        echo "Hello Viewers";
        ?>
?>


<?php 
} else {
  while($rowm = $stmt->fetch(PDO::FETCH_ASSOC))
{
    extract($rowm);
  ?>              <li>
                <div class="media wow fadeInDown"> <a href="../view/pages/single_page.php?id=<?php echo "{$NewsId}"?>" class="media-left"> <img alt="" src="../newseditor/postimages/<?php echo "{$Image}";?>"> </a>
                  <div class="media-body"> <a href="../view/pages/single_page.php?id=<?php echo "{$NewsId}"?>" class="catg_title"><?php echo "{$Topic}";?></a> </div>
                </div>
              </li>

   <?php
  
  }
}
    ?>
             