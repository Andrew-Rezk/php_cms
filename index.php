<?php

include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php' );

?>
<!doctype html>
<html>
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  
  <title>Website Admin</title>
  
  <link href="styles.css" type="text/css" rel="stylesheet">
  
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  
</head>
<body>

  <h1>Welcome to My Website!</h1>
  <p>This is the website frontend!</p>

  <?php

  $query = 'SELECT *
    FROM projects
    ORDER BY date DESC';
  $result = mysqli_query( $connect, $query );

  ?>


  <p>There are <?php echo mysqli_num_rows($result); ?> projects in the database!</p>

  <hr>

  <?php while($record = mysqli_fetch_assoc($result)): ?>

    <div>

      <h2><?php echo $record['title']; ?></h2>
      <?php echo $record['content']; ?>

      <?php if($record['photo']): ?>

        <p>The image can be inserted using a base64 image:</p>

        <img width="200px" src="<?php echo $record['photo']; ?>">

      <?php else: ?>

        <p>This record does not have an image!</p>

      <?php endif; ?>

    </div>

    <hr>
    <?php endwhile;?>

  <!--End for Project section-->

<?php

$query = 'SELECT *
  FROM skills
  ORDER BY id';
$skillResult = mysqli_query( $connect, $query );

?>


<p>There are <?php echo mysqli_num_rows($skillResult); ?> Skills in the database!</p>

<hr>

<?php while($skillRecord = mysqli_fetch_assoc($skillResult)): ?>

  <div>

    <h2><?php echo $skillRecord['name']; ?></h2>
    <?php echo $skillRecord['url']; ?>
    <?php echo $skillRecord['percent']; ?>

    <?php if($skillRecord['photo']): ?>

      <p>The image can be inserted using a base64 image:</p>

      <img width="100px" src="<?php echo $skillRecord['photo']; ?>">

    <?php else: ?>

      <p>This record does not have an image!</p>

    <?php endif; ?>

  </div>

  <?php endwhile;?>

<hr>
<!--End for Skills section-->
<?php

$query = 'SELECT *
  FROM bio
  ORDER BY id';
$bioResult = mysqli_query( $connect, $query );

?>


<p>There are <?php echo mysqli_num_rows($bioResult); ?> Bio in the database!</p>

<hr>

<?php while($bioRecord = mysqli_fetch_assoc($bioResult)): ?>

  <div>

    <h2><?php echo $bioRecord['name']; ?></h2>
    <?php echo $bioRecord['description']; ?>


    <?php if($bioRecord['photo']): ?>

      <p>The image can be inserted using a base64 image:</p>

      <img width="100px" src="<?php echo $bioRecord['photo']; ?>">

    <?php else: ?>

      <p>This record does not have an image!</p>

    <?php endif; ?>

  </div>

  <?php endwhile;?>

<hr>
<!--End for Bio section-->

<?php

$query = 'SELECT *
  FROM education
  ORDER BY id';
$educationResult = mysqli_query( $connect, $query );

?>


<p>There are <?php echo mysqli_num_rows($educationResult); ?> education in the database!</p>

<hr>

<?php while($educationRecord = mysqli_fetch_assoc($educationResult)): ?>

  <div>

    <h2><?php echo $educationRecord['school']; ?></h2>
    <br>
    <?php echo $educationRecord['program']; ?>
    <br>
    <?php echo $educationRecord['startdate']; ?>
    <?php echo $educationRecord['enddate']; ?>

  </div>

  <?php endwhile;?>
</body>
</html>
