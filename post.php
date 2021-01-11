<!doctype html>
<html lang="en">

<head>
    <title>Post</title>
    <link rel="stylesheet" href="post.css">
</head>
<?php
include_once 'template\header.php';
?>

<body>
    <?php
    $idpost = $_GET['idpost'];
    $sql = $con->query("SELECT * FROM post WHERE id_post=" . RealEscape($idpost));
    $row = $sql->fetch_assoc();
    if ($row) {
        if ($row['image'] != '')
            echo "<br><div class='withimage'><div class='img'><img class='imm' src='" . htmlspecialchars($row['image']) . "'></img></div> <div class='titledesc'><h4><div class='title'>&nbsp" . htmlspecialchars($row['title']) . "</div></h4><div class='descimg'>" . htmlspecialchars($row['description']) . "</div></div></div>";
        else
            echo " <br><div class='noimg'><div class='titlenoimg'><h4>" . htmlspecialchars($row['title']) . "</h4></div><div class='descnoimg'>" . htmlspecialchars($row['description']) . "</div></div>";
        $sql = SelectComment(RealEscape($idpost), 0);
        do {
            $row = $sql->fetch_assoc();
            if ($row) {
                echo "<div class='bord'></div>";
                if ($row['fk_id_user'] != '')
                    echo "<div class='commwithimage'><a href='profile.php?iduser=" . htmlspecialchars($row['fk_id_user']) . "'><h6>" . htmlspecialchars($row['user']) . "</h6></a>" . htmlspecialchars($row['description']) . "</div>";
                else
                    echo "<div class='commwithimage'> <div class='commtitledesc'><h6>" . htmlspecialchars($row['user']) . "</h6>" . htmlspecialchars($row['description']) . "</div></div>";
            }
        } while ($row);


        echo "<div class='bord'></div>";
        if (isset($_SESSION['username']))
            include_once "commentses.php";
        else
            include_once "comment.php";
    }
    ?>
</body>

</html>