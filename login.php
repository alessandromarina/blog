<?php
include_once 'template\header.php';
$msg = "";
if (isset($_POST['submit'])) {
	$emailusername = RealEscape($_POST['emailusername']);
	$passcode = RealEscape($_POST['passcode']);
	$sql = SelectUser($emailusername, 'username, email', 0);
	$row = $sql->fetch_assoc();
	if ($row) {
		session_start();
		$_SESSION['username'] = RealEscape($row['username']);
		$_SESSION['email'] = RealEscape($row['email']);
	}
	$sql = SelectUser($emailusername, 'id_user, passcode', 0);
	if ($sql->num_rows > 0) {
		$data = $sql->fetch_array();
		if (password_verify($passcode, $data['passcode'])) {
			header('location: index');
		} else
			$msg = "Please check your inputs!";
	} else
		$msg = "Please check your inputs!";
}
?>
<!doctype html>
<html lang="en">

<head>
	<title>Log In</title>
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
						<?php if ($msg != "") echo $msg; ?>
						<br>
						<form method="post" action="login.php">
							<input required class="form-control" minlength="3" name="emailusername" type="email username" placeholder="Email/Username..."><br>
							<input required class="form-control" minlength="8" name="passcode" type="password" placeholder="Password..."><br>
							<input class="btn btn-primary" name="submit" type="submit" value="Log In"><br>
						</form>
						<br>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>