<?php  if (count($serrors) > 0) : ?>
  <div class="error">
  	<?php foreach ($serrors as $error) : ?>
  	  <p><?php echo $serror ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>