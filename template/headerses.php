<!doctype html>
<html lang="en">

<body>
    <div class="btn-group">
        <button type="button" class="btn" data-toggle="dropdown">
            <?php

            $username = $_SESSION['username'];
            // $sql = "SELECT  image  FROM user WHERE username = '$username'";
            // $result = $con->query(($sql));
            $sql = SelectUser($username, 'id_user', 1);
            $row = $sql->fetch_assoc();
            if ($row) {
            ?>
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="profile?iduser=<?php echo RealEscape($row['id_user']); } ?>">Your Comments</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout">Log Out</a>
        </div>
    </div>
</body>

</html>