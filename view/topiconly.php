<?php
    

    $stmt=$newsposttopic->getdataselectedtopic();
    $total_rowstopic=$newsposttopic->countAll();
  
      if($total_rowstopic==0){
      	echo "Hello Viewers";
      	?>
?>


<?php 
} else {
	while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    extract($row);
?>
                <li><a href="../view/pages/single_page.php?id=<?php echo "{$NewsId}"?>"><img src="../newseditor/postimages/<?php echo "{$Image}";?>" alt=""><?php echo "{$Topic}";?></a></li>

   <?php
  
  }
}
    ?>


      