<!doctype html>
<html lang="en">

<head>
    <title>Homepage</title>
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
                <div><img src="img/web_image1.jpg" class="d-block w-100" alt="img/web_image1.jpg"></div>
                <div class="card-body">
                    <h5 class="card-title">Lore</h5>
                    <p class="card-text">Maecenas iaculis est tempor, lobortis tortor non, varius ligula. Integer rhoncus sem nec risus blandit, a faucibus sem ullamcorper. Etiam in rhoncus purus, quis porttitor risus. Maecenas in sapien in risus ultricies maximus. Morbi
                        cursus bibendum luctus. Vivamus hendrerit ut lacus sit amet imperdiet. Sed nec sodales arcu, eu consequat turpis. In hac habitasse platea dictumst. Quisque vel magna turpis. Sed id luctus leo, eget bibendum mauris. Nunc magna urna,
                        rutrum ut dolor in, consectetur cursus massa. Nunc sit amet nisl id nisl convallis dapibus nec eu leo. Aenean blandit ullamcorper dolor vel molestie.</p>
                    <a href="post.php?idpost=0" class="btn btn-primary">Go to post</a>
                </div>
            </div>
            <div class="carousel-item top-image">
                <div><img src="img/web_image2.jpg" class="d-block w-100" alt="img/web_image2.jpg"></div>

                <div class="card-body">
                    <h5 class="card-title">M Ip</h5>
                    <p class="card-text">Morbi mollis turpis quis faucibus scelerisque. Sed molestie elit sit amet tortor dignissim, id faucibus velit aliquam. Mauris mollis, enim ut finibus ullamcorper, quam nulla pellentesque lectus, nec tempus arcu nunc ut felis. Donec
                        quis diam vehicula, placerat eros id, fringilla nisl. Donec quis lobortis nisl, nec tempor lorem. Proin blandit nulla neque, eget eleifend ligula dignissim in. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                        cubilia curae; Vestibulum mi tortor, suscipit a euismod ut, tristique porta nisl.</p>
                    <a href="post.php?idpost=1" class="btn btn-primary">Go to post</a>
                </div>
            </div>
            <div class="carousel-item top-image">
                <div><img src="img/web_image3.jpg" class="d-block w-100" alt="img/web_image3.jpg"></div>
                <div class="card-body">
                    <h5 class="card-title">Sum</h5>
                    <p class="card-text">Sed sit amet elit imperdiet, dictum justo ut, blandit dolor. Quisque non dui non turpis euismod blandit sit amet quis urna. Praesent fermentum varius libero nec congue. Aenean non enim ligula. Phasellus viverra nunc non massa ultricies
                        imperdiet. Donec gravida viverra odio a pharetra. Duis pretium, odio et feugiat pellentesque, orci justo interdum neque, sit amet tempus turpis odio et sem. Nam lacus sem, lobortis id enim et, molestie bibendum dui. Pellentesque
                        vehicula, risus non pulvinar tempus, libero tellus gravida justo, sed posuere leo lacus eu dui. Curabitur vitae mauris erat. Aenean gravida, risus ut molestie finibus, urna purus hendrerit neque, id euismod turpis nisl nec eros.
                        Maecenas gravida, metus eget consectetur pharetra, ligula sem volutpat velit, vel blandit felis justo vitae tellus. Sed laoreet aliquam felis non porta. Ut rhoncus aliquet justo, sit amet dictum nunc aliquet id. Integer ullamcorper
                        urna nec neque pharetra accumsan. Donec enim augue, luctus vel risus quis, iaculis iaculis risus.</p>
                    <a href="post.php?idpost=2" class="btn btn-primary">Go to post</a>
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
</body>

</html>