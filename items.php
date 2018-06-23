
<?php 
    include("header.php");
    include("footer.php");
    include("db.php");
    include('classes.php');

	ob_start();
	session_start();
	
	// it will never let you open index(login) page if session is set
	// if ( isset($_SESSION['user'])!="" ) {
	// 	header("Location: items.php");
	// 	$test = $_SESSION['user'];
	// 	echo $test;
	// 	exit;
	// }else{
	// 	echo "not loged in";
	// }

    // LOGOUT is in the NAV-BAR integrated --------------------------------------------------------------
    // $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
    // $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
    //     ?>

              <!-- Hi' <?php //echo $userRow['userEmail']; ?> -->
            
    <!-- //        <a href="logout.php?logout">Sign Out</a> -->
  
        
    <?php
    $condition= "";
    queryAll($condition);

    $result = $conn->query($statement);
    // Check data are and throw an error if there would be a mistake
    if (!$result) {
                $outputDisplay .= "<p>MySQL No: " . $conn->errno . "</p>";
                $outputDisplay .= "<p>MySQL Error: " . $conn->error . "</p>";
                $outputDisplay .= "<p>SQL Statement: " . $statement . "</p>";
                $outputDisplay .= "<p>MySQL Affected Rows: " . $conn->affected_rows . "</p>";
                echo "fail";
    } 
    $rows = $result->fetch_all(MYSQLI_ASSOC);
            
            if(!$rows){
                echo "fail";
            }else{
                //echo "$rows  Array work";
            }
                

 
        
	
?>
<link rel="stylesheet" href="/css/style.css">
<div id="wrapper">
    <div class="container">
        
             <div class="card-deck">

            <?php
                foreach($rows as $row){?>
                        <div class="col-md-4">
                        <div class="card mt-5">
                            <div class="card-content">
                                
                                    <img class="card-img-top" src="<?= $row['media_items_img'] ?>" alt="<?= $row['media_title'] ?> Image">
                            
                                <div class="card-body">
                                    
                                        <h3 class="card-title"><?= $row['media_title'] ?></h3>
                                        <p class="rating">
                                            <?php   $stars = checkRating($row['rating']);
                                                    echo $stars
                                            ?>
                                        </p>
                                        <p class="media_type <?= $row['media_type_name']; ?>"><?= $row['media_type_name']; ?></p>
                                    
                                        <?php 
                                                if($row['regisseur_firstname']){
                                                    $statement = "<p class='text-secondary font-weight-bold'>Regisseur: </p>";
                                                    $statement .= "<p class='border d-inline'>". $row['regisseur_firstname']." ".$row['regisseur_lastname']."</p>";
                                                    echo $statement;
                                                }elseif($row['author_firstname'] ){
                                                    $statement = "<p class='text-secondary font-weight-bold'>Author: </p>";
                                                    $statement .= "<p class=''>". $row['author_firstname']." ".$row['author_lastname']."</p>";
                                                    echo $statement;
                                                }
                                            ?></p>
                                   
                                        <p><?php 
                                                $description = substr($row["media_descri"],0, 100);
                                                $description .= " ...";
                                                echo $description;
                                            ?></p>
                                       
                                            <p class="text-secondary font-weight-bold">Available: 
                                                <span class="available <?=$row['available']; ?>">
                                                <?php
                                                    
                                                    if($row['available'] == 'true'){
                                                        echo "<i class='far fa-check-circle'></i>";
                                                    } else {
                                                        echo "<i class='fas fa-times-circle'></i>"; 
                                                    }
                                                ?>
                                            </span>
                                            </p>
                                            
                                        
                                    
                                    
                                    
                                </div>
                                <div class="item-bottom text-center mb-5">
                                    <button  class="align-self-center btn btn-outline-info" type="button" > <a href="details.php?id=<?=$row['media_id']?>">details</a> </button>

                                </div>
                            </div>
      
                    </div>
               </div>
            <?php 

                }
                
                ?>
                </div>
        
    </div>
</div>
<?php ob_end_flush(); ?>
    

    
