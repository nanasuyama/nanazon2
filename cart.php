<?php

    include 'header.php';



?>
<br><br><br><br><br>

    <section>
        <div class="cartItem">
            <h1 class="shoppingCart">Shopping Cart</h1>
            <table class="table">
                <thead>
                    <tr id="tr">
                        <th style="width: 20%;">  </th>
                        <th style="width: 25%;">  </th>
                        <th style="width: 20%;">  </th>
                        <th style="width: 15%;">  </th>
                        <th style="width: 20%;">  </th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="">

                    <?php

                        if(!isset($_SESSION['user_id'])){
                           echo "<script>window.location='login.php';</script>";
                        }
                        else{

                            require_once '../classes/Cart.php';
                            $cart = new Cart;
                            $user_id = $_SESSION['user_id'];
                            $list_item = $cart->selectCartItems($user_id);
    
                            require_once '../classes/Item.php';
                            $item = new Item;
                            if($list_item){
                            foreach($list_item as $key => $row){
                                $cart_id=$row['cart_id'];
                                $ci_id = $row['ci_id'];
                                $item_id=$row['item_id'];
                                $list_image = $item->selectAllImage($item_id);
                         

                        }

                    ?>

                        <td> <img src="<?php echo $list_image[0]['image_path'] . $list_image[0]['image_name'];?>" class="cartItemImage" alt=""> </td>
                        <td><?php echo $row['item_name'];?>t</td>
                        <td> $ <?php echo $row['ci_price'];?>.00 -</td>
                        <td> 
                            <p class="lead">Qty : <?php echo $row['ci_quantity'];?></p>
                            
                        </td>
                        <td><a id="delete" href='add_cart_action.php?action=remove_from_cart&ci_id=<?php echo $ci_id;?>' onclick='return confirm("Are you sure you want to delete?");'>Delete</a></td>

                    </tr>
                    <?php
                            }
                        }
                    ?>


                            

                   
                    
                </tbody>
            </table>
            
        </div>


        <div class="payment">
            <h1 class="paymentMethod">Payment Method</h1>
            <div class="details">

            <?php
            
                if($list_item){
                    $sum = $cart->selectSum($cart_id);
                    $address = $cart->selectAddress($userid);
                
                    
            ?>

                <h2 class="pmDetails">Address</h2>
                <p id="paymentP"><?php echo $address['ua_address']. ", ".$address['ua_city']. ", ".$address['ua_province']. ", " .$address['ua_country'];?></p><br>
    
                <h2 class="pmDetails">Subtotal</h2>
                <p id="paymentP">$<?php echo $sum['total_price'];?>.00 - </p><br>
    
                <h2 class="pmDetails">Shipping Fee</h2>
                <p id="paymentP"> Free </p><br>
    
                <h2 class="pmDetails"> Total </h2>
                <p id="paymentP">$<?php echo $sum['total_price'];?>.00 - </p><br>
    
                <h2 class="pmDetails">Pay by...</h2><br>
                <form action="" method="">
                    <?php
                        $cart = new Cart;

                        $get_payment_method = $cart->selectAllPaymentMethod();

                        if($get_payment_method){
                            foreach($get_payment_method as $key => $row){
                                $id = $row['payment_id'];?>

                    <div class="form-check">
                        <input class="radio" type="radio" name="payment_id" id="exampleRadios1"
                        value="<?php echo $row['payment_id'];?>">
                        <span id="pm" for="exampleRadios1">
                            <?php echo $row['payment_name'];?>
                            </span>
                    </div>  
                    <?php
                            }
                        }
                    ?>
                    <input type="submit" id="purchase" value="Purchase" name="purchase"><br><br>

                    <a id="shopMore" href="index.html">Shop More</a>
                    
                    </form>
                    <?php
                        if(isset($_POST['checkout'])){
                            $cart_id = $_GET['cart_id'];
                            $ua_id = $_GET['ua_id'];
                            $payment_id = $_POST['payment_id'];

                            $cart->checkout($cart_id,$ua_id,$payment_id);
                        }
                    ?>
                    
                   
                    <!-- <a id="purchase" href="checkout.php?cart_id=<?php echo $cart_id; ?>&ua_id=<?php echo $address['ua_id']; ?>">Purchase</a> -->
                </form>
    
                <!-- <input type="submit" value="Purchase" name="purchase" id="purchase"><br><br> -->
            <?php
            }
            ?>
                 <!-- <a id="shopMore" href="index.html">Shop More</a> -->
                

            </div>



        </div>

    </section>


<?php 
	include 'footer.php';
?>