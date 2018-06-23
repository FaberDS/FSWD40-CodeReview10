<link rel="stylesheet" href="css/style_details.css">

<?php 
    include("header.php");
    include("footer.php");
    include("db.php");
    include("classes.php");

	ob_start();
	session_start();
    if($_GET['pub_id']){
        // echo "publisher";
        $pub_id = $_GET['pub_id'];
        $condition = "WHERE `publishers`.`publisher_id` = $pub_id";
        querySelectedMedia($condition);
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
                // echo "$rows  Array work";
            }

    }else{
        if($_GET['id']) {
       $media_id = $_GET['id'];
        //    echo $media_id;
        }
        $condition= "WHERE `media_items`.`media_id`= $media_id";
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
        // $rows = $result->fetch_all(MYSQLI_ASSOC);
           $rows = $result->fetch_all(MYSQLI_ASSOC);
            
            if(!$rows){
                echo "fail";
            }else{
                //echo "$rows  Array work";
            }
    }
    

   
	?>
    <link rel="stylesheet" href="/css/style.css">
        <div class="container">

        <div class="row">
                <?php
                
                    foreach($rows as $row){
                        if($row['media_title'] == NULL){
                            ?>

                                <div class="card mx-auto mt-5 border border-danger">
                                    <div class="card-content">
                                        <div class="card-body ">
                                            <h3 class="card-title">No Entries for this Publisher</h3>
                                            <p class="card-text"> For this publisher we have at the moment no entries. If there is a huge request, we will add him to our collection</p>
                                        </div>
                                    </div>
                                </div>
                            <?php

                        }else{
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10 mx-auto mt-5 ">
                        
                                <div class="card mt-5 ">
                                <div class="card-content">
                                        <img class="card-img-top" src="<?= $row['media_items_img'] ?>" alt="<?= $row['media_title'] ?> Image">
                                
                                        <div class="card-body">
                                            <h3><?= $row['media_title'] ?></h3>
                                            <p class="rating">
                                                    <?php   $stars = checkRating($row['rating']);
                                                            echo $stars;
                                                    ?>
                                                </p>
                                            <h3 class="card-title"><?= $row['media_type_name'] ?></h3>
                                            <p>Id: <?= $row['media_id'] ?></p>
                                            <p>Language: <?= $row['lang'] ?></p>
                                            <p>Publisher: <?= $row['publisher_name'] ?></p>
                                            <p>
                                                <?php 
                                                        if($row['regisseur_firstname']){
                                                            $statement = "<p class='text-secondary font-weight-bold'>Regisseur: </p>";
                                                            $statement .= "<p class=''>". $row['regisseur_firstname']." ".$row['regisseur_lastname']."</p>";
                                                            echo $statement;
                                                        }elseif($row['author_firstname'] ){
                                                            $statement = "<p class='text-secondary font-weight-bold'>Author: </p>";
                                                            $statement .= "<p class=''>". $row['author_firstname']." ".$row['author_lastname']."</p>";
                                                            echo $statement;
                                                        }
                                                    ?>
                                            </p>
                                            <p class='text-secondary font-weight-bold'>Publisher-Size: <?= $row['publisher_size'] ?></p>
                                            <p class='text-secondary font-weight-bold'>Available: 
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
                                            
                                            <p>
                                                <?php 
                                                        
                                                        echo $row["media_descri"];
                                                    ?>
                                            </p>
                                            
                                            <p><?= $row['media_type_name'] ?></p>
                                            <?php
                                                if($pub_id ){
                                                    ?>
                                                        <div class="item-bottom text-center ">
                                                            <button  class="align-self-center btn btn-outline-info" type="button" > <a href="details.php?id=<?=$row['media_id']?>">details</a> </button>
                                                        </div>
                                                    <?php
                                                }
                                                ?>
                                        </div>
                                        </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

            <?php 

                 }
                
                ?>
        </div>
        </div>