<?php
  


    
    $cmnt->CId=$id;
    $stmt=$cmnt->getdatadesc();
    $total_rows=$cmnt->countAll();
    
    
    if($total_rows!=0) {
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
      {
    extract($row);
    if ($row['NId']==$id && $row['approval']=='yes') {
?>

  	<div >
  	  <label >Name</label><br>
       <?php echo "{$CName}";?>
  	</div>
    
  	
  	<div class="form-group has-feedback">
      <label>Comment</label><br>
      <?php echo "{$Coment}";?>
  	</div>
   <hr>

    <?php
  }
  }
}
    ?>
    

   
         