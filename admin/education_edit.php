<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: education.php' );
  die();
  
}

if( isset( $_POST['school'] ) )
{
  
  if( $_POST['school'] )
  {
    
    $query = 'UPDATE education SET
      school = "'.mysqli_real_escape_string( $connect, $_POST['school'] ).'",
      program = "'.mysqli_real_escape_string( $connect, $_POST['program'] ).'",
      startdate = "'.mysqli_real_escape_string( $connect, $_POST['startdate'] ).'",
      enddate = "'.mysqli_real_escape_string( $connect, $_POST['enddate'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'education has been updated' );
    
  }

  header( 'Location: education.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM education
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: education.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Skills</h2>

<form method="post">
  
  <label for="school">School:</label>
  <input type="text" name="school" id="school" value="<?php echo htmlentities( $record['school'] ); ?>">
    
  <br>
  
  <label for="program">Program:</label>
  <input type="text" name="program" id="program" value="<?php echo htmlentities( $record['program'] ); ?>">
    
  <br>

  <label for="startdate">startdate:</label>
  <input type="date" name="startdate" id="startdate" value="<?php echo htmlentities( $record['startdate'] ); ?>">

  <br>

  <label for="enddate">enddate:</label>
  <input type="date" name="enddate" id="enddate" value="<?php echo htmlentities( $record['enddate'] ); ?>">

  <br>
  
  <input type="submit" value="Edit Education">
  
</form>

<p><a href="education.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include( 'includes/footer.php' );

?>