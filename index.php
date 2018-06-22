<link rel="stylesheet" href="/css/style.css">
<?php 
    include("header.php");
    include("footer.php");
    include("db.php");

    $statement = "SELECT    `media_items`.`media_title`, 
                            `media_items`.`media_descri`, 
                            `media_items`.`available`, 
                            `media_items`.`media_items_img`,
                            `media_items`.`lang`,
                            `media_items`.`rating`,
                            `media_items`.`available`,
                            `publishers`.`publisher_name`,
                            `authors`.`author_firstname`,
                            `authors`.`author_lastname`,
                            `media_types`.`media_type_name`,
                            `regisseurs`.`regisseur_firstname`,
                            `regisseurs`.`regisseur_lastname`

                            FROM `media_items`
                            LEFT JOIN `publishers`
                            ON `media_items`.`fk_media_publisher`= `publishers`.`publisher_id`
                            LEFT JOIN `authors`
                            ON `media_items`.`fk_author_id`= `authors`.`author_id`
                            LEFT JOIN `media_types`
                            ON `media_items`.`fk_media_type` = `media_types`.`media_type_id`
                            LEFT JOIN `regisseurs`
                            ON `media_items`.`fk_regisseur_id` = `regisseurs`.`regisseur_id`";

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
                
    //Check rating and return the right stars ----------------------------------------------------------------------------------------
    
    function checkRating($rating) 
    {
        global $star;
        switch ($rating) {
            case 1:
                $star = "&#x2605 &#x2606 &#x2606 &#x2606 &#x2606";
                return $star;
                break;
            case 2:
                $star = "&#x2605 &#x2605 &#x2606 &#x2606 &#x2606";
                return $star;
                break;
            case 3:
                $star = "&#x2605 &#x2605 &#x2605 &#x2606 &#x2606";
                return $star;
                break;
           case 4:
                $star = "&#x2605 &#x2605 &#x2605 &#x2605 &#x2606";
                return $star;
                break;
            case 5:
                $star = "&#x2605 &#x2605 &#x2605 &#x2605 &#x2605";
                return $star;
                break;
            default:
                $star = "&#x2606 &#x2606 &#x2606 &#x2606 &#x2606";
                return $star;
        };

    }
 
        
	
?>

<div id="wrapper">
    <div class="container">
        <div class="row">
            <?php
                
                foreach($rows as $row){?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                        
                        <div class="item ">
                            <div class="item-img-container">
                                <img src="<?= $row['media_items_img'] ?>" alt="<?= $row['media_title'] ?> Image">
                            </div>
                            <div class="item-content">
                                <div class="item-headline-container">
                                    <p class="item-headline"><?= $row['media_title'] ?></p>
                                    <p class="rating">
                                        <?php   $stars = checkRating($row['rating']);
                                                echo $stars
                                        ?>
                                    </p>
                                    <p class="media_type <?= $row['media_type_name']; ?>"><?= $row['media_type_name']; ?></p>
                                </div>
                                
                                <div class="item-detail">
                                    <?php 
                                            if($row['regisseur_firstname']){
                                                $statement = "<p class='border item-subtitle details d-inline'>Regisseur: </p>";
                                                $statement .= "<p class='border d-inline'>". $row['regisseur_firstname']." ".$row['regisseur_lastname']."</p>";
                                                echo $statement;
                                            }elseif($row['author_firstname'] ){
                                                $statement = "<p class='item-subtitle details'>Author: </p>";
                                                $statement .= "<p class=''>". $row['author_firstname']." ".$row['author_lastname']."</p>";
                                                echo $statement;
                                            }
                                        ?></p>
                                </div>
                                <div class="item-detail-bottom">
                                    <p><?php 
                                            $description = substr($row["media_descri"],0, 100);
                                            $description .= " ...";
                                            echo $description;
                                        ?></p>
                                    <div class="item-detail-center">
                                        <p class="item-subtitle details">Available: </p>
                                        <p class="available <?=$row['available']; ?>">
                                        <?php
                                            
                                            if($row['available'] == 'true'){
                                                echo "<i class='far fa-check-circle'></i>";
                                            } else {
                                                echo "<i class='fas fa-times-circle'></i>"; 
                                            }
                                        ?>
                                    </p>
                                    </div>
                                   
                                </div>
                                
                            </div>
                            <div class="item-bottom text-center ">
                                <button class="align-self-center"><a href="#">see more details</a></button>
                            </div>


                            
                                    
                                    
                                    
                                    
                                    
                          
                    </div>
                </div>
            <?php 
                }
                ?>
        </div>
    </div>
</div>
    

    
