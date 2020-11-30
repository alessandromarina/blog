<!doctype html>
<html lang="en">
<?php
$con = new mysqli('localhost', 'root', 'banana', 'blog');
if (isset($_POST['submit'])) {
  session_start();
  $comment = $con->real_escape_string($_POST['comment']);
  $username = $_SESSION['username'];
  $email = $_SESSION['email'];
  $sql = $con->query("SELECT * FROM user WHERE username='$username'");
  while ($row = $sql->fetch_assoc())
    $iduser = $row['id_user'];
  $idpost = ($_GET['idpost']);
  $con->query("INSERT INTO comment (user, email, description, fk_id_user, fk_id_post) VALUES ('$username', '$email', '$comment', '$iduser', '$idpost')");
  header('location: ' . $_SERVER['HTTP_REFERER']);
}
?>

<head>
  <title>Post</title>
  <link rel="stylesheet" href="comments.css">

</head>

<body>
  <div class="createcomment">
    <h5>Add a comment</h5>
    <div class=" nextprev ">
      <form method="post" action="commentses.php?idpost=<?php echo $_GET['idpost'] ?>" ;>
        Comment as <?php echo $_SESSION['username']; ?>: <br><textarea class="comment" name="comment" rows="5" cols="40"></textarea>
        <br>
        <input class=" submitbtn" type="submit" name="submit" value="Submit">
      </form>
      <form method="post" action="like.php?idpost=<?php echo $_GET['idpost'] ?>" ;>

        <input class=" likebtn float-right" type="submit" name="submit" value="Like">
      </form>
    </div>
  </div>
</body>

</html>