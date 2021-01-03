<?php
$sql = SelectTop5();
do {
    $row = $sql->fetch_assoc();
    if ($row) {
        if ($row['image'] != '')
            echo "<div class='withimage'><div class='img' ><img class='img' src='" . RealEscape($row['image']) . "'></img></div> <div class='titledesc'><a href='post?idpost=" . RealEscape($row['id_post']) . "'><h4><div class='title'>&nbsp" . $row['title'] . "</div></h4></a><div class='descimg'>" . substr(RealEscape($row['description']), 0, 400) . "...</div></div></div>";
        else
            echo "<div class='noimg'><div class='titlenoimg'><a href='post?idpost=" . RealEscape($row['id_post']) . "'><div class='title'><h4>&nbsp" . RealEscape($row['title']) . "</h4></a></div></div><div class='descnoimg'>" . substr(RealEscape($row['description']), 0, 400) .  "</div></div>";
    }
} while ($row);

// $sql = "SELECT post.*, count(id_like) AS likes FROM post INNER JOIN rate ON id_post = fk_id_post GROUP BY id_post ORDER BY likes DESC LIMIT 0,5 ";
// if ($result = mysqli_query($con, $sql))
//     if (mysqli_num_rows($result) > 0)
//         while ($row = mysqli_fetch_array($result)) {
//             if ($row['image'] != '')
//                 echo "<div class='withimage'><div class='img' ><img class='img' src='" . RealEscape($row['image']) . "'></img></div> <div class='titledesc'><a href='post?idpost=" . RealEscape($row['id_post']) . "'><h4><div class='title'>&nbsp" . $row['title'] . "</div></h4></a><div class='descimg'>" . substr(RealEscape($row['description']), 0, 400) . "...</div></div></div>";
//             else
//                 echo "<div class='noimg'><div class='titlenoimg'><a href='post?idpost=" . RealEscape($row['id_post']) . "'><div class='title'><h4>&nbsp" . RealEscape($row['title']) . "</h4></a></div></div><div class='descnoimg'>" . substr(RealEscape($row['description']), 0, 400) .  "</div></div>";
//         }
