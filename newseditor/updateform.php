<div class='register-box-body'>
    <p class='login-box-msg'>Enter a new newspost Data</p>
    <form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>' method='POST'>
      <div class='form-group has-feedback'>
        <input type='text' class='form-control' value='<?php echo $newspost->NewsId; ?>' placeholder='newspost ID' name='SId' required='required' readonly>
        <span class='glyphicon glyphicon-user form-control-feedback'></span>
      </div>
      <div class='form-group has-feedback'>
        <input type='Date' class='form-control' value='<?php echo $newspost->NewsDate; ?>' placeholder='newspost Roll No' name='SDate' required='required'>
        <span class='glyphicon glyphicon-user form-control-feedback'></span>
      </div>
      <div class='form-group has-feedback'>
        <input type='text' class='form-control' value='<?php echo $newspost->Topic; ?>' placeholder='Full name' name='STopic'>
        <span class='glyphicon glyphicon-user form-control-feedback'></span>
      </div>
      <div class='form-group has-feedback'>
        <input type='text' class='form-control' value='<?php echo $newspost->News; ?>' placeholder='Class' name='SNews'>
        <span class='glyphicon glyphicon-home form-control-feedback'></span>
      </div>
      <div class='form-group has-feedback'>
        <input type='file' class='form-control' value='<?php echo $newspost->Image; ?>' placeholder='Image' name='SImage'>
        <span class='glyphicon glyphicon-home form-control-feedback'></span>
      </div>
            <div class='form-group has-feedback'>
        <input type='text' class='form-control' value='<?php echo $newspost->NewsType; ?>' placeholder='Section' name='Stype'>
        <span class='glyphicon glyphicon-home form-control-feedback'></span>
      </div>
            <div class='form-group has-feedback'>
        <input type='text' class='form-control' value='<?php echo $newspost->NewsCat; ?>' placeholder='Section' name='SCat'>
        <span class='glyphicon glyphicon-home form-control-feedback'></span>
      </div>
      <div class='row'>
        <div class='col-xs-8'>         
            <button type='submit' class='btn btn-primary btn-block btn-flat'>Update</button></form>   
        </div>
        <!-- /.col -->
        <div class='col-xs-4'>
          <form action='../newseditor/index.php'>
        <button type='submit' class='btn btn-info' >
          <span class='glyphicon glyphicon-plus'></span>Cancel
        </button>
      </form>
        </div>
        <!-- /.col -->
      </div>
    

   

  </div>
  <!-- /.form-box -->
</div>