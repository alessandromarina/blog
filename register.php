<?php
include_once 'assets/template/header.php';
$msg = "";
$ok = true;
if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $passcode = $_POST['passcode'];
    $cpasscode = $_POST['cpasscode'];
    $directory = 'assets/img/propics/';
    $row = SelectUser($email, 'email', 2);
    if (isset($row['email'])) {
        $msg = "This email has already been used!";
        $ok = false;
    } else {
        $sql = SelectUser($username, 'username', 1);
        $row = $sql->fetch_assoc();
        if (isset($row['username'])) {
            $msg = "This username has already been used!";
            $ok = false;
        } else if ($passcode == $cpasscode && $ok == true && ctype_alpha($username)) {
            if (UPLOAD_ERR_OK === $_FILES['file']['error']) {
                $ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
                $path =  $directory . $username . "." . $ext;
                move_uploaded_file($_FILES["file"]["tmp_name"], $path);
            } else
                $path = $directory . 'im.jpg';
            $hash = password_hash($passcode, PASSWORD_BCRYPT);
            InsertUser($path, $username, $firstname, $lastname, $email, $hash);
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            header('location: index');
        } else if ($passcode != $cpasscode) $msg = "The passcode is different!";
        else
            $msg = "This username has prohibited chars in it";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Register</title>
</head>

<body>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Project Blog</h5>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-md-offset-3" align="center">
                        <?php if ($msg != "") echo htmlspecialchars($msg);
                        $msg = "";
                        $ok = true; ?>
                        <br />
                        <form method="post" action="register.php" enctype="multipart/form-data">
                            <input required class="form-control" minlength="1" name="firstname" placeholder="Firstname..."><br />
                            <input required class="form-control" minlength="1" name="lastname" type="lastname" placeholder="Lastname..."><br />
                            <input required class="form-control" minlength="3" name="username" type="username" placeholder="Username..."><br />
                            <input required class="form-control" minlength="6" name="email" type="email" placeholder="Email..."><br />
                            <input required class="form-control" minlength="8" name="passcode" type="password" placeholder="Password..."><br />
                            <input required class="form-control" minlength="8" name="cpasscode" type="password" placeholder="Confirm Password..."><br />
                            Select a profile picture:
                            <input type="file" name="file"><br /><br />
                            <input required class="btn btn-primary" name="submit" type="submit" value="Register!"><br />
                        </form>
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>