<!doctype html>
<html lang="en">

<head>
  <title>Posts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="posts.css">
</head>

<?php session_start();
if (isset($_SESSION['username']))
  include_once 'headerses.php';
else
  include_once 'header.php';
?>

<body>

  <?php
  $con = new mysqli('localhost', 'root', 'banana', 'blog');
  $sql = "SELECT * FROM post ORDER BY date, image";
  if ($result = mysqli_query($con, $sql))
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        echo "<br>";
        if ($row['image'] != '')
          echo "<div class='withimage'><div class='img'>" . $row['image'] . "</div> <div class='titledesc'><a href='post.php?idpost=" . $row['id_post'] . "'><h4>" . $row['title'] . "</h4></a>" . $row['description'] . "</div></div>";
        else
          echo "<div class='noimg'><div class='titlenoimg'><a href='post.php?idpost=" . $row['id_post'] . "'><h4>" . $row['title'] . "</h4></a></div><div class='descnoimg'>" . $row['description'] . "</div></div>";
      }
    }

  ?>

</body>

</html>