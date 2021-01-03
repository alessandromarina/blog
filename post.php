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
    $idpost = RealEscape($_GET['idpost']);
    $sql = $con->query("SELECT * FROM post WHERE id_post=" . $idpost);
    $row = $sql->fetch_assoc();
    if ($row) {
        if ($row['image'] != '')
            echo "<br><div class='withimage'><div class='img'><img class='imm' src='" . RealEscape($row['image']) . "'></img></div> <div class='titledesc'><h4><div class='title'>&nbsp" . RealEscape($row['title']) . "</div></h4><div class='descimg'>" . RealEscape($row['description']) . "</div></div></div>";
        else
            echo " <br><div class='noimg'><div class='titlenoimg'><h4>" . RealEscape($row['title']) . "</h4></div><div class='descnoimg'>" . RealEscape($row['description']) . "</div></div>";
        $sql = SelectComment($idpost, 0);
        do {
            $row = $sql->fetch_assoc();
            if ($row) {
                echo "<div class='bord'></div>";
                if ($row['fk_id_user'] != '')
                    echo "<div class='commwithimage'><a href='profile.php?iduser=" . RealEscape($row['fk_id_user']) . "'><h6>" . RealEscape($row['user']) . "</h6></a>" . RealEscape($row['description']) . "</div>";
                else
                    echo "<div class='commwithimage'> <div class='commtitledesc'><h6>" . RealEscape($row['user']) . "</h6>" . RealEscape($row['description']) . "</div></div>";
            }
        } while ($row);

        // $sql = "SELECT * FROM comment WHERE fk_id_post=" . $idpost . " ORDER BY id_comment DESC";
        // if ($result = mysqli_query($con, $sql))
        //     if (mysqli_num_rows($result) > 0)
        //         while ($row = mysqli_fetch_array($result)) {
        //             echo "<div class='bord'></div>";
        //             if ($row['fk_id_user'] != '')
        //                 echo "<div class='commwithimage'><a href='profile.php?iduser=" . $row['fk_id_user'] . "'><h6>" . $row['user'] . "</h6></a>" . $row['description'] . "</div>";
        //             else
        //                 echo "<div class='commwithimage'> <div class='commtitledesc'><h6>" . $row['user'] . "</h6>" . $row['description'] . "</div></div>";
        //         }

        echo "<div class='bord'></div>";
        if (isset($_SESSION['username']))
            include_once "commentses.php";
        else
            include_once "comment.php";
    }
    ?>
</body>

</html>