<?php
$i = $_GET['i'];
if ($i > 0)
    $i -= 10;
header('location: posts?i=' . $i);
