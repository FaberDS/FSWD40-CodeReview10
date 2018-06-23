<?php
ob_start();
session_start();
require_once 'header.php';
require_once 'footer.php';
require_once 'db.php';

// if session is not set this will redirect to login page
// if( !isset($_SESSION['user']) ) {
//  header("Location: index.php");
//  exit;
// }
// select logged-in users detail
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

           Hi' <?php echo $userRow['userEmail']; ?>
            
           <a href="logout.php?logout">Sign Out</a>
  
        
  

<?php ob_end_flush(); ?>