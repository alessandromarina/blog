<!doctype html>
<html lang="en">
<?php
include_once 'dal.php';
if (isset($_POST['submit'])) {
  session_start();
  $comment = $_POST['comment'];
  $username = $_SESSION['username'];
  $email = $_SESSION['email'];
  $sql = SelectUser($username, '*', 1);
  $row = $sql->fetch_assoc();
  if ($row) {
    $iduser =$row['id_user'];
    $idpost = $_GET['idpost'];
    InsertComment( RealEscape($username),  RealEscape($email), RealEscape($comment),  RealEscape($iduser),  RealEscape($idpost));
  }
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
      <form method="post" action="commentses.php?idpost=<?php echo $idpost ?>" ;>
        Comment as <?php echo $username; ?>: <br><textarea class="comment" name="comment" rows="5" cols="40"></textarea>
        <br>
        <input class=" submitbtn" type="submit" name="submit" value="Submit">
      </form>
      <form method="post" action="like.php?idpost=<?php echo $idpost ?>" ;>
        <input class=" likebtn float-right" type="submit" name="submit" value="Like">
      </form>
    </div>
  </div>
</body>

</html>