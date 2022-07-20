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
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
  <title>Website Admin</title>
  
  <link href="styles.css" type="text/css" rel="stylesheet">
  
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  
</head>
<body>

  
<div class="w3-container w3-black w3-margin-bottom">
  <h1 class="w3-center w3-text-Steel">Andrew Rezk</h1>
</div>

<?php

$query = 'SELECT *
  FROM bio
  ORDER BY id';
$bioResult = mysqli_query( $connect, $query );

?>

<?php while($bioRecord = mysqli_fetch_assoc($bioResult)): ?>

  <div>

    <?php if($bioRecord['photo']): ?>

    <div class="w3-row w3-margin-top w3-margin-bottom">
      <div class="w3-container w3-quarter">
        <img width="300px" height="250px" class="w3-round" src="<?php echo $bioRecord['photo']; ?>">
      </div>

    <?php else: ?>

      <p>This record does not have an image!</p>

    <?php endif; ?>

    <div class="w3-container w3-threequarter w3-center" style="margin-top: 5 rem">
      <h1>
        Andrew Rezk
      </h1>
      <?php echo $bioRecord['description']; ?>
    </div>

  </div>
  

  <?php endwhile;?>

<hr>
<!--End for Bio section-->

<?php

$query = 'SELECT *
  FROM skills
  ORDER BY id';
$skillResult = mysqli_query( $connect, $query );

?>
 <h1 class="w3-center w3-text-Steel">Skills</h1>
 <ul>
 <li>
  <?php while($skillRecord = mysqli_fetch_assoc($skillResult)): ?>
      <?php if($skillRecord['photo']): ?>

        <img width="100px" src="<?php echo $skillRecord['photo']; ?>">
        
        
      <?php else: ?>

        <p>This record does not have an image!</p>

      <?php endif; ?>

      </li>
  <?php endwhile;?>
  </ul>

  


<hr>
<!--End for Skills section-->

  <?php

  $query = 'SELECT *
    FROM projects
    ORDER BY date DESC';
  $result = mysqli_query( $connect, $query );

  ?>

<h1 class="w3-center w3-text-Steel w3-margin" style="margin: top 50px;">Projects</h1>

  <?php while($record = mysqli_fetch_assoc($result)): ?>

    <div class="w3-margin-bottom">

      <?php if($record['photo']): ?>

      <div class="w3-row w3-margin-bottom">
        <div class="w3-container w3-half">
          <img width="500px" src="<?php echo $record['photo']; ?>">
        </div>

      <?php else: ?>

        <p>This record does not have an image!</p>

      <?php endif; ?>


    <div class="w3-container w3-half w3-center">
      <h2><?php echo $record['title']; ?></h2>
      <?php echo $record['content']; ?>
    </div>

  </div>

    <?php endwhile;?>
    <hr>

  <!--End for Project section-->

<?php

$query = 'SELECT *
  FROM education
  ORDER BY id';
$educationResult = mysqli_query( $connect, $query );

?>

<h1 class="w3-center w3-text-Steel w3-margin-bottom">Education</h1>

<?php while($educationRecord = mysqli_fetch_assoc($educationResult)): ?>

  <div class="w3-center w3-text-Steel w3-margin-bottom">

    <h3><?php echo $educationRecord['school']; ?></h3>
    <br>
    <?php echo $educationRecord['program']; ?>
    <br>
    <p> Start Date:
    <?php echo $educationRecord['startdate']; ?>
    </p>
    <p> End Date:
    <?php echo $educationRecord['enddate']; ?>
    </p>

  </div>

  <?php endwhile;?>

<style> 
  li {
    display: inline-block;
}

ul {
text-align: center;
}


</style>
</body>
</html>
