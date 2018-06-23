<?php
	require 'header.php';
	require_once 'db.php';
	ob_start();
	session_start();
	
	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: index.php");
		$test = $_SESSION['user'];
		echo $test;
		exit;
	}else{
		echo "not loged in";
	}

	$error = false;

	 if( isset($_SESSION['bookid']) ) {
		 echo " Session". $_SESSION['bookid'];
		$res=mysqli_query($conn, "SELECT * FROM vehicles WHERE vehicles_id=".$_SESSION['bookid']);
    	$vehRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
		header("Location: invoice.php");
      
    } else{
		echo "no reservation";
		echo "<a href='fleet.php'>Have a look for a nice car</a>";
	}

	if( isset($_POST['btn-login']) ) {

		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);

		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs

		if(empty($email)){
			$error = true;
			$emailError = "Please enter your email address.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}

		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
		}

		// if there's no error, continue to login
		if (!$error) {
			
			$password = hash('sha256', $pass); // password hashing

			$res=mysqli_query($conn, "SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
			$row=mysqli_fetch_array($res, MYSQLI_ASSOC);
			$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
			
			if( $count == 1 && $row['userPass']==$password ) {
			$_SESSION['user'] = $row['userId'];
			header("Location: home.php");
			} else {
			$errMSG = "Incorrect Credentials, Try again...";
			}
			
		}

	}
?>

		<div class="jumbotron">
			<h1 class="display-4">Only one step away</h1>
		  <h1>From the famoust library</h1>
		
			<div>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
						<h2>Sign In.</h2>
								<hr />
										
				<?php
					if ( isset($errMSG) ) {
					echo $errMSG; 
				?>
											
				<?php
					}
				?>
						<input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
						<span class="text-danger"><?php echo $emailError; ?></span>
						<input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
						<span class="text-danger"><?php echo $passError; ?></span>
										
						<hr />
										
						<button type="submit" name="btn-login">Sign In</button>
										
						<hr />
					
						<a href="register.php">Sign Up Here...</a>
							
				</form>
			</div>
		</div>
</div>
</body>

<?php ob_end_flush(); ?>