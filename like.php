<?php
$idpost = $_GET['idpost'];
$username = $_SESSION['username'];
$sql = SelectUser(RealEscape($username), 'id_user', 1);
$row = $sql->fetch_assoc();
if ($row) {
  $iduser = $row['id_user'];
  echo $iduser;
}
$sql = SelectRate(RealEscape($iduser), RealEscape($idpost));
$row = $sql->fetch_assoc();
if ($row) {
  $fkiduser =$row['fk_id_user'];
  echo $fkiduser;
}
if ($iduser != $fkiduser)
  InsertLike(RealEscape($iduser), RealEscape($idpost));
else
  DeleteLike(RealEscape($iduser), RealEscape($idpost));
header('location: ' . $_SERVER['HTTP_REFERER']);
