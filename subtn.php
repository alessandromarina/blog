<?php
include_once 'dal.php';
$sql = SelectPost(NULL, 2);
$j = $sql->fetch_assoc();
$i = $_GET['i'];
if ($i + 9 < $j)
    $i += 10;
header('location: posts?i=' . $i);
