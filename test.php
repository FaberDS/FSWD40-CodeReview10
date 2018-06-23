if($rows['media_type_name'] !== ""){
                    var_dump($rows['media_type_name']);
                    ?>
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h3 class="card-title">No Entries for this Publisher</h3>
                                        <p class="card-text"> For this publisher we have at the moment no entries. If there is a huge request, we will add him to our collection</p>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }else{