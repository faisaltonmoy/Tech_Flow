<?php
require('header.php');

if (isset($_SESSION['name'])) {
?>
	<script>
		window.location.href = 'home.php';
	</script>
<?php
}

error_reporting(0);

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM user_sign_up WHERE email='$email' AND password='$password'";
	$result = mysqli_query($con, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['name'] = $row['name'];
		header("Location:home.php");
		die();
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}
//if (isset($_SESSION['name'])) { header("Location:home.php"); }

?>

<main>

	<div class="infinity-container">


		<!-- FORM CONTAINER BEGIN -->
		<div class="infinity-form-block">
			<div class="infinity-click-box text-center">Login into your account</div>

			<div class="infinity-fold">
				<div class="infinity-form">
					<form class="form-box" method="POST" action="">
						<!-- Input Box -->
						<div class="form-input">
							<span><i class="fa fa-envelope" style="color: #DEF2F1"></i></span>
							<input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock" style="color: #DEF2F1"></i></span>
							<input type="password" name="password" placeholder="Password" value="<?php echo $_POST['password']; ?>" required>
						</div>

						<!-- Login Button -->
						<div class="col-12 px-0 text-right">
							<button name="submit" class="btn mb-3">Login
							</button>
						</div>


						<div class="text-center">Don't have an account?
							<a class="register-link" href="register.php">Register here</a>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- FORM CONTAINER END -->
	</div>
</main>

<?php
require('footer.php');
?>