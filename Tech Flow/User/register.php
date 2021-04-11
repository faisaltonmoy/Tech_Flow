<?php

require('header.php');

error_reporting(0);


if (isset($_SESSION['name'])) {
	header("Location: user_login.php");
}

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM user_sign_up WHERE email='$email'";
		$result = mysqli_query($con, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO user_sign_up (name, email, password)
					VALUES ('$name', '$email', '$password')";
			$result = mysqli_query($con, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$name = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
?>
	<script>
		window.location.href = 'user_login.php';
	</script>
<?php
}

?>

<div class="infinity-container">

	<!-- FORM CONTAINER BEGIN -->
	<div class="infinity-form-block">
		<div class="infinity-click-box text-center">Create an account</div>

		<div class="infinity-fold">
			<div class="infinity-form">
				<form class="form-box" action="" method="POST">
					<!-- Input Box -->
					<div class="form-input">
						<span><i class="fa fa-user" style="color: #DEF2F1"></i></span>
						<input type="text" placeholder="Username" name="name" value="<?php echo $name; ?>" required>
					</div>
					<div class="form-input">
						<span><i class="fa fa-envelope" style="color: #DEF2F1"></i></span>
						<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
					</div>
					<div class="form-input">
						<span><i class="fa fa-lock" style="color: #DEF2F1"></i></span>
						<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
					</div>
					<div class="input-group form-input">
						<span><i class="fa fa-lock" style="color: #DEF2F1"></i></span>
						<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
					</div>
					<!-- Register Button -->
					<div class="col-12 px-0 text-right">
						<button name="submit" class="btn">Register</button>
					</div>

					<div class="text-center">Already have an account?
						<a class="login-link" href="user_login.php">Login here</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- FORM CONTAINER END -->
</div>
<?php
require('footer.php');
?>