<?php
$sql = SelectTop5();
do {
    $row = $sql->fetch_assoc();
    if ($row) {
        if ($row['image'] != '')
            echo "<div class='withimage'><div class='img' ><img class='img' src='" . htmlspecialchars($row['image']) . "'></img></div> <div class='titledesc'><a href='post?idpost=" . htmlspecialchars($row['id_post']) . "'><h4><div class='title'>&nbsp" . htmlspecialchars($row['title']) . "</div></h4></a><div class='descimg'>" . substr(htmlspecialchars($row['description']), 0, 400) . "...</div></div></div>";
        else
            echo "<div class='noimg'><div class='titlenoimg'><a href='post?idpost=" . htmlspecialchars($row['id_post']) . "'><div class='title'><h4>&nbsp" . htmlspecialchars($row['title']) . "</h4></a></div></div><div class='descnoimg'>" . substr(htmlspecialchars($row['description']), 0, 400) .  "</div></div>";
    }
} while ($row);
