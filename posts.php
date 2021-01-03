<!doctype html>
<html lang="en">

<head>
  <title>Posts</title>
  <link rel="stylesheet" href="posts.css">
</head>
<?php
include_once 'template\header.php';
$i = RealEscape($_GET['i']);
?>

<body>
  <br>
  <?php
  $sql = SelectPost($i, 1);
  do {
    $row = $sql->fetch_assoc();
    if ($row) {
      echo "<div class='bord'></div>";
      if ($row['image'] != '')
        echo "<div class='withimage'><div class='img' ><img class='img' src='" . RealEscape($row['image']) . "'></img></div> <div class='titledesc'><a href='post?idpost=" . RealEscape($row['id_post']) . "'><h4><div class='title'>&nbsp" . RealEscape($row['title']) . "</div></h4></a><div class='descimg'>" . substr(RealEscape($row['description']), 0, 400) . "...</div></div></div>";
      else
        echo "<div class='noimg'><div class='titlenoimg'><a href='post?idpost=" . RealEscape($row['id_post']) . "'><div class='title'><h4>&nbsp" . RealEscape($row['title']) . "</h4></a></div></div><div class='descnoimg'>" . substr(RealEscape($row['description']), 0, 400) .  "</div></div>";
    }
  } while ($row);

  // $sql = "SELECT * FROM post ORDER BY date DESC LIMIT " . $i . ",10";
  // if ($result = mysqli_query($con, $sql))
  //   if (mysqli_num_rows($result) > 0)
  //     while ($row = mysqli_fetch_array($result)) {
  //       if ($row['image'] != '')
  //         echo "<div class='withimage'><div class='img' ><img class='img' src='" . RealEscape($row['image']) . "'></img></div> <div class='titledesc'><a href='post?idpost=" . RealEscape($row['id_post']) . "'><h4><div class='title'>&nbsp" . RealEscape($row['title']) . "</div></h4></a><div class='descimg'>" . substr(RealEscape($row['description']), 0, 400) . "...</div></div></div>";
  //       else
  //         echo "<div class='noimg'><div class='titlenoimg'><a href='post?idpost=" . RealEscape($row['id_post']) . "'><div class='title'><h4>&nbsp" . RealEscape($row['title']) . "</h4></a></div></div><div class='descnoimg'>" . substr(RealEscape($row['description']), 0, 400) .  "</div></div>";
  //     }
  ?>
  <div class="nextprev">
    <form method="post" action="subtp.php?i=<?php echo $i; ?>">
      <input required class="btn  buttonprev" name="submitp" type="submit" value="Previous Page">
    </form>
    <form method="post" action="subtn.php?i=<?php echo $i; ?>">
      <input required class="btn float-right" name="submitn" type="submit" value="Next Page">
    </form>
  </div>
</body>

</html>