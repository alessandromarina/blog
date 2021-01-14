<!doctype html>
<html lang="en">

<?php
include_once 'assets/template/header.php';
?>

<head>
  <title>Forum</title>
  <link rel="stylesheet" href="comments.css">
</head>


<body>
  <?php
  $iduser = $_GET['iduser'];
  do {
    $sql = SelectComment($iduser);
    $row = $sql->fetch_assoc();
    if ($row)
      echo "<div class='bord'></div><div class='commwithimage'><a href='profile.php?idprofile=" . htmlspecialchars($row['fk_id_user']) . "'><h6>" . htmlspecialchars($row['user']) . "</h6></a>" . htmlspecialchars($row['description']) . "</div>";
  } while ($row);
  ?>
</body>

</html>