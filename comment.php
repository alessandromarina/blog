<!doctype html>
<html lang="en">
<?php
  $con = new mysqli('localhost', 'root', 'banana', 'blog');
if (isset($_POST['submit'])) {
  $name = $con->real_escape_string($_POST['name']);
  $email = $con->real_escape_string($_POST['email']);
  $comment = $con->real_escape_string($_POST['comment']);
  $idpost = ($_GET['idpost']);
  $con->query("INSERT INTO comment (user ,email, description, fk_id_post) VALUES ('$name','$email','$comment','$idpost')");
  header('location: '.$_SERVER['HTTP_REFERER']);
}
?>

<head>
  <title>Post</title>
  <link rel="stylesheet" href="comments.css">

</head>

<body>

  <div class="createcomment">
    <br>
    <form method="post" action="comment.php?idpost=<?php echo $_GET['idpost']?>"; >
    <h5>Add a comment</h5>
    <div  class="name">Name: &nbsp<input  type="text" name="name" ></div>
    <div  class="email"> &nbspE-mail: &nbsp<input required  type="text" name="email" ></div>
    <p>Comment: </p>
    <textarea required class="comment" name="comment" rows="5" cols="40"></textarea>
    <br>
    <input  class="btn btn-primary" name="submit" type="submit" value="Submit"><br>
    </form>
    <br>
  </div>
</body>

</html>