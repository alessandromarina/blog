<!doctype html>
<html lang="en">

<body>
    <div class="btn-group">
        <?php
        $username = $_SESSION['username'];
        $sql = SelectUser($username,  4);
        $row = $sql->fetch_assoc();
        if ($row) {
        ?>
            <div class="propic">
                <img type="button" src="<?php echo htmlspecialchars($row['image']); ?>" class="ch btn propic" data-toggle="dropdown"></img>
                <div class="dropdown-menu">
                    <a class="dropdown-item " href="profile?iduser=<?php echo urlencode($row['id_user']);
                                                                    ?>">Your Comments</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout">Log Out</a>
                </div>
            </div>
    </div>
    <div class="btn-group">
        <button type="button" class="ch btn proname" data-toggle="dropdown">
            <?php
            echo htmlspecialchars($username);
            ?>
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="profile?iduser=<?php echo urlencode($row['id_user']);
                                                        } ?>">Your Comments</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logged/logout">Log Out</a>
        </div>
    </div>
</body>

</html>