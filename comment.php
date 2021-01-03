<!doctype html>
<html lang="en">
<?php
if (isset($_POST['submit'])) {
  $name = RealEscape($_POST['name']);
  $email = RealEscape($_POST['email']);
  $comment = RealEscape($_POST['comment']);
  $idpost = RealEscape($_GET['idpost']);
  InsertComment($name, $email, $comment, NULL, $idpost);
  header('location: ' . $_SERVER['HTTP_REFERER']);
}
?>

<head>
  <title>Post</title>
  <link rel="stylesheet" href="comments.css">
</head>

<body>

  <div class="createcomment">
    <br>
    <form method="post" action="comment.php?idpost=<?php echo $idpost ?>" ;>
      <h5>Add a comment</h5>
      <div class="name">Name: &nbsp<input type="text" name="name"></div>
      <div class="email"> &nbspE-mail: &nbsp<input required type="text" name="email"></div>
      <p>Comment: </p>
      <textarea required class="comment" name="comment" rows="5" cols="40"></textarea>
      <br>
      <input class="btn btn-primary" name="submit" type="submit" value="Submit"><br>
    </form>
    <br>
  </div>
</body>

</html>