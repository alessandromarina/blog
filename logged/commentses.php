<!doctype html>
<html lang="en">
<?php
global $page;
$username = "";
$iduser = "";
if ($_SERVER['REQUEST_URI'] == $page)
  include_once 'assets/dal.php';
else
  include_once '../assets/dal.php';
if (isset($_SESSION['username'])) {
  $sql = SelectUser($_SESSION['username'], 6);
  $img = $sql->fetch_assoc();
  if ($img)
    $img = $img['image'];
}
if (isset($_POST['submit'])) {
  session_start();
  $username = $_SESSION['username'];
  $comment = trim($_POST['comment']);
  $email = $_SESSION['email'];
  $sql = SelectUser($username, 3);
  $row = $sql->fetch_assoc();
  if ($row) {
    $idpost = $_GET['idpost'];
    $iduser = $row['id_user'];
    if ($comment)
      InsertComment($username,  $email, $comment,  $iduser,  $idpost);
    header('location: ' .  $_SERVER['HTTP_REFERER']);
  }
}
?>

<head>
  <title>Post</title>
  <link rel="stylesheet" href="assets/comments.css">
</head>

<body>
  <div class="createcomment">
    <div class="nextprev ">
      <form method="post" action="logged/commentses.php?idpost=<?php echo urlencode($idpost); ?>">
        <img class="comment-img" src="<?php echo htmlspecialchars($img); ?>"></img>
        <textarea id="text" rows="1"   name="comment" placeholder="Comment as <?php if (isset($_SESSION['username'])) echo htmlspecialchars($_SESSION['username']); ?>..."></textarea>
      </div>
 