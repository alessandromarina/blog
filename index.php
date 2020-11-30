<!doctype html>
<html lang="en">

<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="posts.css">

</head>

<?php
session_start();
if (isset($_SESSION['username']))
    include_once 'template\headerses.php';
else
    include_once 'template\header.php';
?>

<body>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <a class="carousel-control-prev " href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <div class="carousel-item active top-image">
                <?php 
                $con = new mysqli('localhost', 'root', 'banana', 'blog');
                $sql = $con->query("SELECT * FROM post WHERE id_post='1001'");
                while ($row = $sql->fetch_assoc()){                 
                    $idpost = $row['id_post'];
                    $description = $row['description'];
                    $title = $row['title'];
                    $image = $row['image'];
                }
                ?>
                <div><img src="img/web_image1.jpg" class="d-block w-100" alt="<?php echo $image;?>"></div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $title;?></h5>
                    <p class="card-text"><?php echo $description;?>
                       </p>
                    <a href="post.php?idpost=<?php echo $idpost;?>" class="btn btn-primary">Go to post</a>
                </div>
            </div>
            <?php 
                $con = new mysqli('localhost', 'root', 'banana', 'blog');
                $sql = $con->query("SELECT * FROM post WHERE id_post='1002'");
                while ($row = $sql->fetch_assoc()){                 
                    $idpost = $row['id_post'];
                    $description = $row['description'];
                    $title = $row['title'];
                    $image = $row['image'];
                }
                ?>
            <div class="carousel-item top-image">
                <div><img src="<?php echo $image;?>" class="d-block w-100" alt="<?php echo $image;?>"></div>

                <div class="card-body">
                    <h5 class="card-title"><?php echo $title;?></h5>
                    <p class="card-text"><?php echo $description;?></p>
                    <a href="post.php?idpost=<?php echo $idpost;?>" class="btn btn-primary">Go to post</a>
                </div>
            </div>
            <?php 
                $con = new mysqli('localhost', 'root', 'banana', 'blog');
                $sql = $con->query("SELECT * FROM post WHERE id_post='1003'");
                while ($row = $sql->fetch_assoc()){                 
                    $idpost = $row['id_post'];
                    $description = $row['description'];
                    $title = $row['title'];
                    $image = $row['image'];
                }
                ?>
            <div class="carousel-item top-image">
                <div><img src="<?php echo $image;?>" class="d-block w-100" alt="<?php echo $image;?>"></div>
                <div class="card-body">
                    <h5 class="card-title">Sum</h5>
                    <p class="card-text"><?php echo $description;?></p>
                    <a href="post.php?idpost=<?php echo $idpost;?>" class="btn btn-primary">Go to post</a>
                </div>
            </div>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <nav class=" navbar-light bg-light">
        <h1>Popular Posts</h1>
    </nav>
<?php
include_once 'top5posts.php';
?>

</body>

</html>