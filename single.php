<?php

    include 'header.php';

    require_once "../classes/Item.php";

    $item = new Item;
    $result = $item->selectAll();
  
    // printing the entire array
    
?>

<br><br><br>
    <section>
        
       <div class="bgImg">
           <p class="topsTop">TOPS</p>
       </div>

       <div class="topsItems">
            <div class="gridContainer">
                <?php   
                    $a = 1;

                    foreach($result as $row){
                        $id = $row["item_id"];
                    
                        $image = $item->selectMainImage($id);

                        $img = $image["image_path"] . $image["image_name"];
                        
                        echo "<div class='img" .$a. "'>
                                <a href='item.php?id=$id'>
                                    <img class='tshirt' src='" .$img. "'>
                                    <p class='itemNameInTops'>" . $row["item_name"]. "</p>
                                </a>
                            </div>
                            ";
                            $a++;
                    }
                ?>
                

                
                <!-- <div class="img2">
                    <a href="item.php">
                        <img class="tshirt" src="../images/tshirt2.jpg" alt="">
                        <p class="itemNameInTops">Tshirt</p>
                    </a>
                </div>
                <div class="img3">
                    <a href="item.php">
                        <img class="tshirt" src="../images/tshirt3.jpg" alt="">
                        <p class="itemNameInTops">Tshirt</p>
                    </a>
                </div>
                <div class="img4">
                    <a href="item.php">
                        <img class="tshirt" src="../images/tshirt4.jpg" alt="">
                        <p class="itemNameInTops">Tshirt</p>
                    </a>
                </div>
                <div class="img5">
                    <a href="item.php">
                        <img class="tshirt" src="../images/tshirt5.jpg" alt="">
                        <p class="itemNameInTops">Tshirt</p>
                    </a>
                </div>
                <div class="img6">
                    <a href="item.php">
                        <img class="tshirt" src="../images/tshirt6.jpg" alt="">
                        <p class="itemNameInTops">Tshirt</p>
                    </a>
                </div>
                <div class="img7">
                    <a href="item.php">
                        <img class="tshirt" src="../images/tshirt7.jpg" alt="">
                        <p class="itemNameInTops">Tshirt</p>
                    </a>
                </div>
                <div class="img8">
                    <a href="item.php">
                        <img class="tshirt" src="../images/tshirt8.jpg" alt="">
                        <p class="itemNameInTops">Tshirt</p>
                    </a>
                </div> -->
            </div>
       </div>
    </section>

 <?php

    include 'footer.php';

?>