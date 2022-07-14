<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'])
  {
    
    $query = 'INSERT INTO bio (
        name,
        photo,
        description
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['photo'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'bio has been added' );
    
  }
  
  header( 'Location: bio.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add bio</h2>

<form method="post">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name">
    
  <br>
  
  <label for="description">Description:</label>
  <textarea  type="text" name="description" id="description"></textarea>


  <br>

  
  <input type="submit" value="Add bio">
  
</form>

<p><a href="bio.php"><i class="fas fa-arrow-circle-left"></i> Return to Bio List</a></p>


<?php

include( 'includes/footer.php' );

?>