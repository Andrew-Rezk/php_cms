<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['school'] ) )
{
  
  if( $_POST['school'])
  {
    
    $query = 'INSERT INTO education (
        school,
        program,
        startdate,
        enddate
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['school'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['program'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['startdate'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['enddate'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Education has been added' );
    
  }
  
  header( 'Location: education.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Education</h2>

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
  
  <input type="submit" value="Add Education">
  
</form>

<p><a href="education.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include( 'includes/footer.php' );

?>