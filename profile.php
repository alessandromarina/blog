<!doctype html>
<html lang="en">

<head>
  <title>Forum</title>
  <link rel="stylesheet" href="comments.css">
</head>

<?php
session_start();
if (isset($_SESSION['username']))
  include_once 'template\headerses.php';
else
  include_once 'template\header.php';
?>

<body>
  <?php
  $iduser=$_GET['iduser'];
$con = new mysqli('localhost', 'root', 'banana', 'blog');

  $sql = "SELECT * FROM comment WHERE fk_id_user='$iduser'";
  if ($result = mysqli_query($con, $sql))
    if (mysqli_num_rows($result) > 0)
      while ($row = mysqli_fetch_array($result)) {
        echo "<div class='bord'></div>";
                echo "<div class='commwithimage'><a href='profile.php?idprofile=" . $row['fk_id_user'] . "'><h6>" . $row['user'] . "</h6></a>" . $row['description'] . "</div>";
            }
  ?>
</body>

</html>