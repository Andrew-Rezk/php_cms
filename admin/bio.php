<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM bio
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'bio has been deleted' );
  
  header( 'Location: bio.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM bio
  ORDER BY name DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Bio</h2>

<table>
  <tr>
    <th></th>
    <th align="center">ID</th>
    <th align="left">Name</th>
    <th align="center">Description</th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center">
        <img src="<?php echo $record['photo']; ?>" width="100">
      </td>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['name'] ); ?>
      </td>
      <td align="center"><?php echo $record['description']; ?></td>
      <td align="center"><a href="bio_photo.php?id=<?php echo $record['id']; ?>">Photo</i></a></td>
      <td align="center"><a href="bio_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="bio.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this skill?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="bio_add.php"><i class="fas fa-plus-square"></i> Add Bio</a></p>


<?php

include( 'includes/footer.php' );

?>