<?php
ob_start();
session_start(); // start a new session or continues the previous
if( isset($_SESSION['user'])!="" ){
 header("Location: home.php"); // redirects to home.php
}
include_once 'db.php';
$error = false;
if ( isset($_POST['btn-signup']) ) {

 // sanitize user input to prevent sql injection
 $first_name = trim($_POST['first_name']);
 $first_name = strip_tags($first_name);
 $first_name = htmlspecialchars($first_name);

// sanitize user input to prevent sql injection
 $sur_name = trim($_POST['sur_name']);
 $sur_name = strip_tags($sur_name);
 $sur_name = htmlspecialchars($sur_name);
 
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);

 // basic name validation
 if (empty($first_name && $sur_name)) {
  $error = true;
  $nameError = "Please enter your full name.";
 } else if (strlen($first_name) < 3) {
  $error = true;
  $nameError = "Name must have atleat 3 characters.";
 }else if (strlen($sur_name) < 3) {
  $error = true;
  $nameError = "Name must have atleat 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$first_name)) {
  $error = true;
  $nameError = "First Name must contain alphabets and space.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$sur_name)) {
  $error = true;
  $nameError = "Surname must contain alphabets and space.";
 }

 //basic email validation
 if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 } else {
  // check whether the email exist or not
  $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
 // password validation
 if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have atleast 6 characters.";
 }

 // password hashing for security
$password = hash('sha256', $pass);


 // if there's no error, continue to signup
 if( !$error ) {
  
  $query = "INSERT INTO users(userFirstName,userSurName,userEmail,userPass) VALUES('$first_name','$sur_name','$email','$password')";
  $res = mysqli_query($conn, $query);
  
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
  //  echo "name ".$first_name;
  //   echo "mail ".$email;
  //  echo "pass ".$pass;

   unset($first_name);
   unset($sur_name);
   unset($email);
   unset($pass);
  } else {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later...";
  }
  
 }


}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login & Registration System</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
   <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
  
      
            <h2>Sign Up.</h2>
            <hr />
          
           <?php
  if ( isset($errMSG) ) {
  
   ?>
           <div class="alert alert-<?php echo $errTyp ?>">
                        <?php echo $errMSG; ?>
       </div>

<?php
  }
  ?>
          
      
          

            <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" maxlength="50" value="<?php echo $first_name ?>" />
      
               <span class="text-danger"><?php echo $nameError; ?></span>

            <input type="text" name="sur_name" class="form-control" placeholder="Enter Surname" maxlength="50" value="<?php echo $sur_name ?>" />
      
               <span class="text-danger"><?php echo $nameError; ?></span>
    
      
  
            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
    
               <span class="text-danger"><?php echo $emailError; ?></span>
      
          
      
            
        
            <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
            
               <span class="text-danger"><?php echo $passError; ?></span>
      
            <hr />

          
            <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            <hr />
          
            <a href="index.php">Sign in Here...</a>
    
  
   </form>
</body>
</html>
<?php ob_end_flush(); ?>