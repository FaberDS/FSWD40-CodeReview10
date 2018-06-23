<?php
    function queryAll($condition){
        global $statement;
        $statement = "SELECT    `media_items`.`media_title`, 
                                `media_items`.`media_id`,
                                `media_items`.`media_descri`, 
                                `media_items`.`available`, 
                                `media_items`.`media_items_img`,
                                `media_items`.`lang`,
                                `media_items`.`rating`,
                                `media_items`.`available`,
                                `publishers`.`publisher_name`,
                                `publishers`.`publisher_size`,
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
                                ON `media_items`.`fk_regisseur_id` = `regisseurs`.`regisseur_id`
                                $condition";
        return $statement;
    }
    
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
    function getPublisher(){
        global $publisher_result;
        $publisher_result = "SELECT `publishers`.`publisher_id`
                                    `publishers`.`publisher_name`
                                    ";
            $result = $conn->query($$publisher_result);
            // Check data are and throw an error if there would be a mistake
            if (!$result) {
                        $outputDisplay .= "<p>MySQL No: " . $conn->errno . "</p>";
                        $outputDisplay .= "<p>MySQL Error: " . $conn->error . "</p>";
                        $outputDisplay .= "<p>SQL Statement: " . $statement . "</p>";
                        $outputDisplay .= "<p>MySQL Affected Rows: " . $conn->affected_rows . "</p>";
                        echo "fail";
            } 
            $publisher_name = $result->fetch_all(MYSQLI_ASSOC);
                    
            if(!$publisher_name){
                echo "fail";
            }else{
                echo "$rows  Array work";
            }
        

    }
    function querySelectedMedia($condition){
        global $statement;
        $statement = "SELECT    `media_items`.`media_title`, 
                                `media_items`.`media_id`,
                                `media_items`.`media_items_img`,
                                `media_items`.`available`,
                                `media_items`.`lang`,
                                `publishers`.`publisher_name`,
                                `publishers`.`publisher_size`

                                FROM `media_items`
                                RIGHT JOIN `publishers`
                                ON `media_items`.`fk_media_publisher` = `publishers`.`publisher_id`
                                $condition";
        return $statement;
    }
?>          