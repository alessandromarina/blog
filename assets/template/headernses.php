<!doctype html>
<html lang="en">

<body>
    <ul class="navbar-nav  mt-2 mt-lg-0">
        <?php
        if ($_SERVER['REQUEST_URI'] != '/ProgettoBlog/login')
            echo '<li class="nav-item active"><a class="nav-link" href="login">Login </a></li>';
        if ($_SERVER['REQUEST_URI'] != '/ProgettoBlog/register')
            echo '<li class="nav-item"><a class="nav-link" href="register">Register</a></li>';
        ?>
    </ul>
</body>

</html>