<?php
    

    $stmt=$newspostl->getdataselectedlaptop();
    $total_rowsl=$newspostl->countAll();
  
      if($total_rowsl==0){
        echo "Hello Viewers";
        ?>
?>


<?php 
} else {
  while($rowl = $stmt->fetch(PDO::FETCH_ASSOC))
{
    extract($rowl);
    if ($rowl['AdApp']=='yes'&& $rowl['AdApp']=='yes') {
    
    }
  ?>              <li>
                <div class="media wow fadeInDown"> <a href="../view/pages/single_page.php?id=<?php echo "{$NewsId}"?>" class="media-left"> <img alt="" src="../newseditor/postimages/<?php echo "{$Image}";?>"> </a>
                  <div class="media-body"> <a href="../view/pages/single_page.php?id=<?php echo "{$NewsId}"?>" class="catg_title"><?php echo "{$Topic}";?></a> </div>
                </div>
              </li>

   <?php
  
  }
}
    ?>
             