
<?php
ob_start();
session_start();
require_once 'header.php';
require_once 'footer.php';
include('db.php');

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user'])!="" ) {
 header("Location: items.php");
 exit;
}

$error = false;

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

  $res=mysqli_query($conn, "SELECT userId, userFirstName, userSurName, userPass FROM users WHERE userEmail='$email'");
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
  
  if( $count == 1 && $row['userPass']==$password ) {
   $_SESSION['user'] = $row['userId'];
   header("Location: items.php");
  } else {
   $errMSG = "Incorrect Credentials, Try again...";
  }
  
 }

}
?>

    <div class="jumbotron ">
      <div class="container jb">
        <h1 class="display-4 text-white">The Shelf</h1>
        <p class="lead text-white">Welcome to the largest digital Shelf on this planet</p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 mx-auto shadow-sm p-3 mb-5 bg-white rounded">
        <div class="box">
          <h1>Sign In</h1>
          <h3>to see our medias</h3>
        </div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
              <?php
                if ( isset($errMSG) ) {
                echo $errMSG; ?>
                      
                        <?php
                }
              ?>
            
            <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
        
            <span class="text-danger"><?php echo $emailError; ?></span>
  
          
            <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
        
           <span class="text-danger"><?php echo $passError; ?></span>
            <hr />
            <button type="submit" name="btn-login" class="btn btn-outline-success"><i class="fas fa-sign-in-alt"></i>

 Sign In</button>
          
          
            <hr />
            <div class="mx-auto">
                <button type="button" class="btn btn-outline-info"><a href="register.php">Sign Up Here...</a></button>
            </div>
            
  
        </form>
      </div>

    </div>
    
          
   </div>
</div>
</body>
</html>
<?php ob_end_flush(); ?>