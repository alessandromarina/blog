<!doctype html>
<html lang="en">

<head>
  <title>Forum</title>
  <link rel="stylesheet" href="comments.css">
</head>

<?php
include_once 'template\header.php';
?>

<body>
  <?php
  $iduser = RealEscape($_GET['iduser']);
  $sql = SelectComment($iduser, 1);
  do {
    $row = $sql->fetch_assoc();
    if ($row)
      echo "<div class='bord'></div><div class='commwithimage'><a href='profile.php?idprofile=" . RealEscape($row['fk_id_user']) . "'><h6>" . RealEscape($row['user']) . "</h6></a>" . RealEscape($row['description']) . "</div>";
  } while ($row);

  // $sql = "SELECT * FROM comment WHERE fk_id_user='$iduser'";
  // if ($result = mysqli_query($con, $sql))
  //   if (mysqli_num_rows($result) > 0)
  //     while ($row = mysqli_fetch_array($result)) {
  //       echo "<div class='bord'></div>";
  //       echo "<div class='commwithimage'><a href='profile.php?idprofile=" . RealEscape($row['fk_id_user']) . "'><h6>" . RealEscape($row['user']) . "</h6></a>" . RealEscape($row['description']) . "</div>";
  //     }

  ?>
</body>

</html>