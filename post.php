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

<body onload="init();">
    <?php
    $idpost = $_GET['idpost'];
    $sql = SelectRate(NULL, $idpost, 2);
    $likenum = $sql->fetch_assoc();
    $like = "thumb";
    if ($likenum)
        $likenum = $likenum['liken'];
    else
        $likenum = 0;
    if (isset($_SESSION['username'])) {
        $sql = SelectRate($_SESSION['username'], $idpost, 1);
        $like = $sql->fetch_assoc();
        $link = "logged/like.php?idpost=" . urlencode($idpost);
        if (!$like)
            $like = "thumbl";
        else
            $like = "thumbu";
    } else $link = "#";
    $sql = SelectPost($idpost, 0);
    $row = $sql->fetch_assoc();
    if ($row) {
        if ($row['image'])
            echo "<br /><div class='withimage'><div class='img'><img id='bordmarg'class='imm' src='" . htmlspecialchars($row['image']) . "'></img></div> <div class='titledesc'><h4><div class='title'>&nbsp" . htmlspecialchars($row['title']) . "</div></h4><div class='descimg'>" . htmlspecialchars($row['description']) . "</div></div></div>";
        else
            echo "</p></div><br /><div  class='noimg'><div class='titlenoimg'><h4 >" . htmlspecialchars($row['title']) . "</h4></div><div class='descnoimg'>" . htmlspecialchars($row['description']) . "</div></div>";
        echo '<div class="float-right"><a href="' . urlencode($link) . '" type="submit" id="numl"class="btn">' . $likenum;
        echo '<i id="' . $like . '" class="fa fa-thumbs-up"></i>';
        echo "</a></div><br /><br /><div id='bordmarg' class='bord'></div>";
        $sql1 = SelectComment($idpost, 1);
        $numl = $sql1->fetch_assoc()['ncomments'];
        if ($numl == 1)
            echo $numl . " comment<br /><br />";
        else
            echo $numl . " comments<br /><br />";

        if (isset($_SESSION['username']))
            include_once "logged/commentses.php";
        else
            include_once "assets/posts/comment.php";
        echo "<div id='bordercom'></div> <input class='btn submitbtn float-right' type='submit' name='submit' value='Submit'> </form> </div></div><br /><br /><div id='bordmarg' class='bord'></div>";
        $sql2 = SelectComment($idpost, 0);
        do {
            $row = $sql2->fetch_assoc();
            if ($row) {
                $sql3 = SelectUser($row['fk_id_user'], 5);
                $user = $sql3->fetch_assoc();
                echo "<div id='bord'>";
                if ($user)
                    echo "<div class='commwithimage'> <div class='commtitledesc'><img  src='" . htmlspecialchars($user['image']) . "' class='btn propic-comment' data-toggle='dropdown'><a href='profile.php?iduser=" . urlencode($row['fk_id_user']) . "'class='title-comment'><h6>" . htmlspecialchars($row['user']) . "</h6></a><p class='comment'>" . htmlspecialchars($row['description']);
                else
                    echo "<div class='commwithimage'> <div class='commtitledesc'><h6 class='title-notreg'>" . htmlspecialchars($row['user']) . "</h6><p class='comment'>" . htmlspecialchars($row['description']) . "</div>";
            }
        } while ($row);
        echo "</p></div></div>";
        if ($numl != 0)
        echo "<div id='bordmarg' class='bord'></div>";
    }
    ?>
</body>
<script>
    let observe,
        d = 0,
        c;
    if (window.attachEvent) {
        observe = function(element, event, handler) {
            element.attachEvent('on' + event, handler);
        };
    } else {
        observe = function(element, event, handler) {
            element.addEventListener(event, handler, false);

        };
    }

    function init()

    {
        let text = document.getElementById('text'),
            bordercom = document.getElementById('bordercom');

        function resize() {
            text.style.height = 'auto';
            text.style.height = text.scrollHeight + 'px';
            if (parseFloat(text.scrollHeight) != d) {
                if (d == 0)
                    c = parseFloat(text.scrollHeight);
                bordercom.style.paddingBottom = (parseFloat(text.scrollHeight) - c) + "px";
                d = parseFloat(text.scrollHeight);
            }
        }

        function delayedResize() {
            window.setTimeout(resize, 0);
        }
        observe(text, 'change', resize);
        observe(text, 'cut', delayedResize);
        observe(text, 'paste', delayedResize);
        observe(text, 'drop', delayedResize);
        observe(text, 'keydown', delayedResize);
        text.focus();
        text.select();
        resize();
    }
</script>

</html>