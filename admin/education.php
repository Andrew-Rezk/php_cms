<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM education
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'education has been deleted' );
  
  header( 'Location: education.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM education
  ORDER BY startdate DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Education</h2>

<table>
  <tr>

    <th align="center">ID</th>
    <th align="left">School</th>
    <th align="center">Program</th>
    <th align="center">Start Date</th>
    <th align="center">End Date</th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['school'] ); ?>
      </td>
      <td align="center"><?php echo $record['program'];?></td>
      <td align="center"><?php echo $record['startdate']; ?></td>
      <td align="center"><?php echo $record['enddate']; ?></td>
      <td align="center"><a href="education_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="education.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this education?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="education_add.php"><i class="fas fa-plus-square"></i> Add Education</a></p>


<?php

include( 'includes/footer.php' );

?>