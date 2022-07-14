<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: bio.php' );
  die();
  
}

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] )
  {
    
    $query = 'UPDATE bio SET
      name = "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
      description = "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'bio has been updated' );
    
  }

  header( 'Location: bio.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM bio
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: bio.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit bio</h2>

<form method="post">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" value="<?php echo htmlentities( $record['name'] ); ?>">
    
  <br>
  
  <label for="description">Description:</label>
  <textarea type="text" name="description" id="description" value="<?php echo htmlentities( $record['description'] ); ?>"></textarea>
   

  <br>
  
  <input type="submit" value="Edit bio">
  
</form>

<p><a href="bio.php"><i class="fas fa-arrow-circle-left"></i> Return to Bio List</a></p>


<?php

include( 'includes/footer.php' );

?>