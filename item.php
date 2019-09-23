<?php

    include 'header.php';

    require_once '../classes/Item.php';
	
	$item = new Item;
	$item_id = $_GET['id'];
	$get_item = $item->selectOne($item_id);
    $list_image = $item->selectAllImage($item_id);
    $len = count($list_image);

?>

<br><br><br><br>

    <section width="100">
        <div class="container-left">
            <div class="imgContainer">
            <?php
                $a = $list_image[0]["image_path"].$list_image[0]["image_name"];
                echo "<img src='" .$a. "' id='placeholder' class='mainImage'><br>";
            ?>
            <div id="smImage">
            <?php
                // print_r($list_image);
                for($i = 0; $i < $len; $i++){
                    $a = $list_image[$i]["image_path"].$list_image[$i]["image_name"];
                    echo "<img id='item" .$i. "' class='smallImage' src='" .$a. "' onclick=\"changeImage('$a')\">"; 
                }
            ?>
              </div>
        
              <script>
                    function changeImage(a) {
                        document.getElementById('placeholder').src = a;
                    }
                </script>
                
            </div>
        </div>

        <div class="container-right">
            <div class="addCart">
                <h2 id="itemName"><?php echo $get_item['item_name'];?></h2>
                <form action="cart_action.php" method="post">
                    <p id="desc"><?php echo $get_item['item_desc'];?></p>
                    <p id="price"> $ <?php echo $get_item['item_price'];?>.00 - </p>


                    <div class="qtySelector">

                        <span>Quantity:</span>
                        <input type="number" id="qty" name="item_quantity" min="1" value="1"
								max="<?php echo $get_item['item_quantity'];?>">
                        
                    </div>
                    <input type="hidden" name="item_id" placeholder="aaaaaaaaa" value="<?php echo $get_item['item_id']; ?>">
                    <input type="hidden" name="item_price"  placeholder="aaaaaaaaa" value="<?php echo $get_item['item_price']; ?>">
                    <input type="submit" name="addToCart" value="Add To Cart" id="add">

                </form>
            </div>
        </div>
    </section>
<?php

    include 'footer.php';

?>