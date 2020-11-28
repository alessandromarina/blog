<?php
$msg = "";

if (isset($_POST['submit'])) {
	$con = new mysqli('localhost', 'root', 'banana', 'blog');

	$firstname = $con->real_escape_string($_POST['firstname']);
	$lastname = $con->real_escape_string($_POST['lastname']);
	$email = $con->real_escape_string($_POST['email']);
	$username = $con->real_escape_string($_POST['username']);
	$passcode = $con->real_escape_string($_POST['passcode']);
	$cpasscode = $con->real_escape_string($_POST['cpasscode']);

	if ($passcode != $cpasscode)
		$msg = "The passcode is different!";
	else {
		$hash = password_hash($passcode, PASSWORD_BCRYPT);
		$con->query("INSERT INTO user (image, username ,firstname, lastname, email, passcode) VALUES ('','$username','$firstname','$lastname','$email','$hash')");
		session_start();
		$_SESSION['username'] = $username;
		header('location: index.php');
	}
}
?>
<!doctype html>
<html lang="en">

<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<?php include_once 'header.php'; ?>

<body>

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Project Blog</h5>

			</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 col-md-offset-3" align="center">

						<?php if ($msg != "") echo $msg; ?>
						<br>
						<form method="post" action="register.php">

							<input required class="form-control" minlength="1" name="firstname" placeholder="Firstname..."><br>
							<input required class="form-control" minlength="1" name="lastname" type="lastname" placeholder="Lastname..."><br>
							<input required class="form-control" minlength="3" name="username" type="username" placeholder="Username..."><br>
							<input required class="form-control" minlength="6" name="email" type="email" placeholder="Email..."><br>
							<input required class="form-control" minlength="8" name="passcode" type="password" placeholder="Password..."><br>
							<input required class="form-control" minlength="8" name="cpasscode" type="password" placeholder="Confirm Password..."><br>
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