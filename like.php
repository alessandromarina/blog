<?php
$idpost = RealEscape($_GET['idpost']);
$username = $_SESSION['username'];
$sql = SelectUser($username, 'id_user', 1);
$row = $sql->fetch_assoc();
if ($row) {
  $iduser = RealEscape($row['id_user']);
  echo $iduser;
}
$sql = SelectRate($iduser, $idpost);
$row = $sql->fetch_assoc();
if ($row) {
  $fkiduser = RealEscape($row['fk_id_user']);
  echo $fkiduser;
}
if ($iduser != $fkiduser)
  InsertLike($iduser, $idpost);
else
  DeleteLike($iduser, $idpost);
header('location: ' . $_SERVER['HTTP_REFERER']);
