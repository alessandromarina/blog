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
    $sql = SelectUser(RealEscape($email), '*', 2);
    $row = $sql->fetch_assoc();
    if (isset($row['email'])) {
        $msg = "This email has already been used!";
        $ok = false;
    }
    $sql = SelectUser(RealEscape($username), '*', 1);
    $row = $sql->fetch_assoc();
    if (isset($row['username'])) {
        $msg = "This username has already been used!";
        $ok = false;
    }
    if ($passcode == $cpasscode && $ok == true) {
        if (UPLOAD_ERR_OK === $_FILES['file']['error']) {
            $filename = basename($_FILES['file']['name']);
            move_uploaded_file($_FILES['file']['tmp_name'], $directory . DIRECTORY_SEPARATOR . $filename);
            $path = $directory . $filename;
            move_uploaded_file($_FILES['img']['tmp_name'], $directory);
        } else {
            $filename = basename($_FILES['file']['name']);
            move_uploaded_file($_FILES['file']['tmp_name'], $directory . DIRECTORY_SEPARATOR . $filename);
            $path = $directory . $filename;
            move_uploaded_file($_FILES['img']['tmp_name'], $directory);
        }
        $hash = password_hash($passcode, PASSWORD_BCRYPT);
        InsertUser(RealEscape($path), RealEscape($username), RealEscape($firstname), RealEscape($lastname), RealEscape($email), RealEscape($hash));
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        header('location: index');
    } else if ($passcode != $cpasscode) $msg = "The passcode is different!";
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