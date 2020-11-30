<?php
$msg = "";
$ok = true;
if (isset($_POST['submit'])) {
    $con = new mysqli('localhost', 'root', 'banana', 'blog');

    $firstname = $con->real_escape_string($_POST['firstname']);
    $lastname = $con->real_escape_string($_POST['lastname']);
    $email = $con->real_escape_string($_POST['email']);
    $username = $con->real_escape_string($_POST['username']);
    $passcode = $con->real_escape_string($_POST['passcode']);
    $cpasscode = $con->real_escape_string($_POST['cpasscode']);
    $directory = 'propics/';

    $sql = $con->query("SELECT * FROM user WHERE email='" . $_POST['email'] . "'");
    while ($row = $sql->fetch_assoc()) {
        if (isset($row['email'])) {
            $msg = "This email has already been used!";
            $ok = false;
        }
    }
    $sql = $con->query("SELECT * FROM user WHERE username='" . $_POST['username'] . "'");
    while ($row = $sql->fetch_assoc()) {
        if (isset($row['username'])) {
            $msg = "This username has already been used!";
            $ok = false;
        }
    }
    if (UPLOAD_ERR_OK === $_FILES['file']['error']) {
        $filename = basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $directory . DIRECTORY_SEPARATOR . $filename);
        $avatar_path = $directory . DIRECTORY_SEPARATOR . $filename;
        if ($passcode == $cpasscode && $ok == true) {
            move_uploaded_file($_FILES['img']['tmp_name'], $directory);
            $hash = password_hash($passcode, PASSWORD_BCRYPT);
            $con->query("INSERT INTO user (image, username ,firstname, lastname, email, passcode) VALUES ('$directory','$username','$firstname','$lastname','$email','$hash')");
            $var = "INSERT INTO user (image, username ,firstname, lastname, email, passcode) VALUES ('$dir','$username','$firstname','$lastname','$email','$hash')";
            echo $var;
            session_start();
            $_SESSION['username'] = $username;
			$_SESSION['email'] = $email;
            header('location: index');
        } else if ($passcode != $cpasscode) $msg = "The passcode is different!";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Register</title>
</head>
<?php include_once 'template\header.php'; ?>

<body>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Project Blog</h5>

            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-md-offset-3" align="center">

                        <?php if ($msg != "") echo $msg;
                        $msg = "";
                        $ok = true; ?>
                        <br>
                        <form method="post" action="register.php" enctype="multipart/form-data">
                            <input required class="form-control" minlength="1" name="firstname" placeholder="Firstname..."><br>
                            <input required class="form-control" minlength="1" name="lastname" type="lastname" placeholder="Lastname..."><br>
                            <input required class="form-control" minlength="3" name="username" type="username" placeholder="Username..."><br>
                            <input required class="form-control" minlength="6" name="email" type="email" placeholder="Email..."><br>
                            <input required class="form-control" minlength="8" name="passcode" type="password" placeholder="Password..."><br>
                            <input required class="form-control" minlength="8" name="cpasscode" type="password" placeholder="Confirm Password..."><br>
                            Select a profile picture:
                            <input required type="file" name="file"><br><br>
                            <input required class="btn btn-primary" name="submit" type="submit" value="Register!"><br>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>