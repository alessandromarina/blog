<?php
session_start();
$idpost = $_GET['idpost'];
$username = $_SESSION['username'];
$con = new mysqli('localhost', 'root', 'banana', 'blog');
$sql = $con->query("SELECT * FROM user WHERE username='$username'");
while ($row = $sql->fetch_assoc())
  $iduser = $row['id_user'];
echo $iduser;
$sql = $con->query("SELECT * FROM rate WHERE fk_id_user='$iduser' AND fk_id_post='$idpost'");
while ($row = $sql->fetch_assoc())
  $fkiduser = $row['fk_id_user'];
echo $fkiduser;
if ($iduser != $fkiduser)
  $con->query("INSERT INTO rate (fk_id_user, fk_id_post) VALUES ('$iduser','$idpost')");
else
  $con->query("DELETE FROM rate WHERE fk_id_user='$iduser' AND fk_id_post='$idpost'");
header('location: ' . $_SERVER['HTTP_REFERER']);
