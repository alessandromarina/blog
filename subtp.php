<?php
$i = $_GET['i'];
$con = new mysqli('localhost', 'root', 'banana', 'blog');
$sql = "SELECT * FROM post ORDER BY date, image DESC LIMIT '$i',10";
if ($result = mysqli_query($con, $sql))
    if (mysqli_num_rows($result) > 0)
        while ($row = mysqli_fetch_array($result))
            if ($row['image'] != '')
                echo "<div class='withimage'><div class='img'>" . $row['image'] . "</div> <div class='titledesc'><a href='post.php?idpost=" . $row['id_post'] . "'><h4><div class='title'>&nbsp" . $row['title'] . "</div></h4></a><div class='descimg'>" . $row['description'] . "</div></div></div>";
            else
                echo "<div class='noimg'><div class='titlenoimg'><a href='post.php?idpost=" . $row['id_post'] . "'><div class='title'><h4>&nbsp" . $row['title'] . "</h4></a></div></div><div class='descnoimg'>" . $row['description'] . "</div></div>";
if ($i > 0)
    $i -= 10;
header('location: posts?i=' . $i);
