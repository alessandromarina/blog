<!doctype html>
<html lang="en">

<?php
$page = $_SERVER['REQUEST_URI'];
include_once 'assets/template/header.php';
?>

<head>
    <title>Post</title>
    <link rel="stylesheet" href="assets/post.css">
</head>

<body>
    <?php
    $idpost = $_GET['idpost'];
    if(isset($_SESSION['username']))
{    $sql = SelectUser($_SESSION['username'],3);
    $iduser=$sql->fetch_assoc();
    if($iduser){
        $iduser=   $iduser['id_user'];
    $sql = SelectRate($iduser, $idpost);
    $like = $sql->fetch_assoc();
    if (!$like) 
    $like ="Like";
    else
    $like ="Unlike";}}
    $sql = SelectPost($idpost, 0);
    $row = $sql->fetch_assoc();
    if ($row) {
        if ($row['image'])
            echo "<br /><div class='withimage'><div class='img'><img class='imm' src='" . htmlspecialchars($row['image']) . "'></img></div> <div class='titledesc'><h4><div class='title'>&nbsp" . htmlspecialchars($row['title']) . "</div></h4><div class='descimg'>" . htmlspecialchars($row['description']) . "</div></div></div>";
        else
            echo "</p></div><br /><div class='noimg'><div class='titlenoimg'><h4>" . htmlspecialchars($row['title']) . "</h4></div><div class='descnoimg'>" . htmlspecialchars($row['description']) . "</div></div>";
            echo '<form method="post" action="logged/like.php?idpost=' . urlencode($idpost) .'" ;>';
            if(isset($_SESSION['username']))
            echo '<input id="likebtn"class="btn float-right" type="submit" name="submit" value="'.htmlspecialchars($like).'"></form><br /><br />';
            echo "<div class='bord'></div>";
            $sql1 = SelectComment($idpost, 1);
            echo $sql1->fetch_assoc()['ncomments']." comments";
            if (isset($_SESSION['username']))
            include_once "logged/commentses.php";
        else
            include_once "assets/posts/comment.php";
            $sql2 = SelectComment($idpost, 0);
        do {
            $row = $sql2->fetch_assoc();
            if ($row) {
                $sql3 = SelectUser($row['fk_id_user'], 5);
                $user = $sql3->fetch_assoc();
                echo "<div class='bord'></div>";
                if ($user)
                    echo "<div class='commwithimage'> <div class='commtitledesc'><img  src='".htmlspecialchars($user['image'])."' class='btn propic-comment' data-toggle='dropdown'><a href='profile.php?iduser=" . htmlspecialchars($row['fk_id_user']) . "'class='title-comment'><h6>" . htmlspecialchars($row['user']) . "</h6></a><p class='comment'>" . htmlspecialchars($row['description']);
                else
                    echo "<div class='commwithimage'> <div class='commtitledesc'><h6 class='title-notreg'>" . htmlspecialchars($row['user']) . "</h6><p class='comment'>" . htmlspecialchars($row['description']) . "</div>";
            }
        } while ($row);
        echo "</p></div><div class='bord'></div>";
   
    }
    ?>
</body>

</html>