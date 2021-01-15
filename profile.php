<!doctype html>
<html lang="en">

<?php
include_once 'assets/template/header.php';
?>

<head>
  <title>Forum</title>
  <link rel="stylesheet" href="assets/post.css">
  <link rel="stylesheet" href="assets/profile.css">
</head>


<body>
  <br />
  <?php
  $iduser = $_GET['iduser'];
  $sql1 = SelectComment($iduser, 2);
  do {
    $row = $sql1->fetch_assoc();
    if ($row) {
      $sql2 = SelectUser($iduser, 5);
      $user = $sql2->fetch_assoc();
      if ($user)
        echo "<div class='commwithimage'> <div class='commtitledesc'><img src='" . htmlspecialchars($user['image']) . "' class='btn propic-comment' data-toggle='dropdown'></img><h6 class='name'>&nbsp;" . htmlspecialchars($row['user']) . "</h6><p class='comment'>" . htmlspecialchars($row['description']) . "</p></div></div><a href='post?idpost=".urlencode($row['fk_id_post'])."'>Go to post -></a>";
    }
  } while ($row);
  ?>
</body>

</html>