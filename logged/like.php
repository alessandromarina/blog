<?php
include_once '../assets/dal.php';
session_start();
$idpost = $_GET['idpost'];
$username = $_SESSION['username'];
$sql = SelectUser($username,  3);
$row = $sql->fetch_assoc();
if ($row) 
  $iduser = $row['id_user'];
$sql = SelectRate($iduser, $idpost,0);
$row = $sql->fetch_assoc();
if ($row) 
  $fkiduser = $row['fk_id_user'];
if ($iduser != $fkiduser)
  InsertLike($iduser, $idpost);
else
  DeleteLike($iduser, $idpost);
  header('location: ' . $_SERVER['HTTP_REFERER']);

