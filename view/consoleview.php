<?php
    

    $stmt=$newspostc->getdataselectedconsole();
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
  ?>              <li>
                <div class="media wow fadeInDown"> <a href="../view/pages/single_page.php?id=<?php echo "{$NewsId}"?>" class="media-left"> <img alt="" src="../newseditor/postimages/<?php echo "{$Image}";?>"> </a>
                  <div class="media-body"> <a href="../view/pages/single_page.php?id=<?php echo "{$NewsId}"?>" class="catg_title"><?php echo "{$Topic}";?></a> </div>
                </div>
              </li>

   <?php
  
  }
}
    ?>
             