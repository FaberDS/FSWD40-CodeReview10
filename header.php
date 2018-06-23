<?php
    require_once 'db.php';
    ob_start();
	session_start();
 $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
    $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
        ?>

           <!-- Hi' <?php echo $userRow['userEmail']; ?>
            
           <a href="logout.php?logout">Sign Out</a>
  
         -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The Shelf</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- fontawesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/style_index.css"> -->

</head>

<body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><i class="fas fa-atlas"></i> The Shelf</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php 
                    if ( isset($_SESSION['user'])!="" ) {
                           ?>
                                <li class="nav-item"><a href="items.php" class="nav-link">Show All</a></li>
                            <?php
                        }
                ?>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Publisher
                    <?php 
                     $publisher_result = "SELECT `publishers`.`publisher_id`,
                                    `publishers`.`publisher_name` FROM `publishers`
                                    ";
                    $result = $conn->query($publisher_result);
                    // Check data are and throw an error if there would be a mistake
                    if (!$result) {
                                $outputDisplay .= "<p>MySQL No: " . $conn->errno . "</p>";
                                $outputDisplay .= "<p>MySQL Error: " . $conn->error . "</p>";
                                $outputDisplay .= "<p>SQL Statement: " . $publisher_result . "</p>";
                                $outputDisplay .= "<p>MySQL Affected Rows: " . $conn->affected_rows . "</p>";
                                echo "fail";
                    } 
                    $publisher_names = $result->fetch_all(MYSQLI_ASSOC);
                            
                    if(!$publisher_names){
                        echo "fail";
                    }else{
                       // echo "$rows  Array work";
                    }
                ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php 
                        foreach($publisher_names as $pub_nam){
                            echo "<a class='dropdown-item' href='details.php?pub_id=".$pub_nam['publisher_id']."'>".$pub_nam['publisher_name']."</a>";
                        };
                    ?>
                
                </div>
            </li>
            
            
            <p class="navbar-text my-2 my-lg-0"> 
                <?php 
                    if ( isset($_SESSION['user'])!="" ) {
                           echo "Hi' ".$userRow['userEmail'];
                        }
                ?>
            </p>
            <li class="nav-item">
                
                <a class="nav-link " href="logout.php?logout">
                    <?php 
                        if ( isset($_SESSION['user'])!="" ) {
                            echo "<i class='fas fa-sign-out-alt'></i> Sign Out";
                        }
                    ?>
                </a>
            </li>
            
            <!-- <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li> -->
            </ul>

        </div>
    </nav>
