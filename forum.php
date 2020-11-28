<!doctype html>
<html lang="en">

<head>
  <title>Forum</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Posts</title>
</head>

<?php
session_start();
if (isset($_SESSION['username']))
  include_once 'headerses.php';
else
  include_once 'header.php';
?>

<body>

</body>

</html>