<?php echo " <div class='register-box-body'><table id='maintainable' class='table table-hover table-responsive table-bordered'>";
    echo"<tr>";
    echo "<div class='form-group has-feedback'><td>Roll</td><td>{$student->Roll}</td></div>";
    echo"</tr>";
    echo"<tr>";
      echo "<div class='form-group has-feedback'><div class='form-group has-feedback'><div class='form-group has-feedback'><td>Name</td><td>&nbsp{$student->Name}</td></div>";
      echo"</tr>";
    echo"<tr>";
      echo "<div class='form-group has-feedback'><div class='form-group has-feedback'><td>Class</td><td>&nbsp{$student->StudentClass}</td></div>";
      echo"</tr>";
    echo"<tr>";
      echo "<div class='form-group has-feedback'><td>Section</td><td>&nbsp{$student->Section}</td></div>";
    echo"</tr></div></table>";


    echo" <div class='row'>
          ";
   
   
echo "<form action='../project1/index.php'> <div class='col-xs-4'>
                        <button type='submit' class='btn btn-danger' >
                        <span class='glyphicon glyphicon-remove'></span>Cancel
                        </button>
                  </form></div>";
                  echo "<div class='col-xs-4'><a delete-id='{$Id}' class='btn btn-danger delete-object'>";
                        echo "<span class='glyphicon glyphicon-trash'></span> Delete";
                    echo "</a></div>";

   echo "<div class='col-xs-4'><a href='update.php?Id={$Id}' class='btn btn-primary left-margin'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
                    echo "</a>";


             echo"</td></tr>";
         echo"</div></div>"; ?>