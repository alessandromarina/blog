<!doctype html>
<html lang="en">
<?php
global $page;
if (isset($_POST['submit'])) {
  if ($_SERVER['REQUEST_URI'] == $page)
    include_once 'assets/dal.php';
  else
    include_once '../dal.php';
  $name = $_POST['name'];
  $email = $_POST['email'];
  $comment = trim($_POST['comment']);
  $idpost = $_GET['idpost'];
  InsertComment($name, $email, $comment, NULL, $idpost);
  header('location: ' . $_SERVER['HTTP_REFERER']);
}
?>

<head>
  <title>Post</title>
  <link rel="stylesheet" href="assets/comments.css">
</head>

<body>

  <div class="createcomment">
    <div class="nextprev ">
      <form method="post" action="assets/posts/comment.php?idpost=<?php echo urlencode($idpost) ?>" ;>
        Comment:
        <div class="name">Name: &nbsp<input required id="name" type="text" name="name"> E-mail: &nbsp<input id="email" required type="email" name="email"></div>
        <textarea rows="1" id="text" class="comment txtcom" name="comment" placeholder="Comment..." cols="40"></textarea>
        <br />