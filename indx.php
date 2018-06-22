<link rel="stylesheet" href="/css/style.css">
<?php 
    include("header.php");
    include("footer.php");
    include("db.php");

    $statement = "SELECT * FROM media_items";
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
        
		
?>

<div id="wrapper">
    <div class="container">
        <div class="row">
            <?php
                
                foreach($rows as $row){?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        
                        <div class="item">
                            <div class="item-img-container">
                                <img src="<?= $row['media_items_img'] ?>" alt="<?= $row['media_title'] ?> Image">
                            </div>
                            <div class="item-header">
                                <div class="item-header-headline-container">
                                    <p class="item-headline"><?= $row['media_title'] ?></p>
                                    <p class="item-headline-two"><?= $row['brand'] ?></p>
                                </div>
                                
                                <div class="item-header-subtitle">
                                    <p><?= $row['type'] ?></p>
                                    <p><i class="fas fa-snowflake"></i><?= $row['airCon'] ?></p>
                                    <p><i class="fas fa-cogs"></i><?= $row['transmittion'] ?></p>
                                    
                                    <p><i class="fas fa-user"></i><?= $row['seats'] ?></p>
                                    <p><i class="fas fa-suitcase"></i><?= $row['bags'] ?></p>
                                </div>
                            </div>


                            <div class="item-price-container">
                                <div class="item-price-container-inside">
                                    <p class="item-price"><?= $row['price'] ?>,00 €</p>
                                    
                                        <button  class="open" type="submit" name="bookid" value="<?=$row['vehicles_id']?>"> <a href="book.php?id=<?=$row['vehicles_id']?>">book</a> </button>
                                    
                                    
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
    

    
