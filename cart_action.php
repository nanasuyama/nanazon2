<?php
    session_start();
    $user_id = $_SESSION['user_id'];

    require_once "../classes/Cart.php";
    $cart = new Cart;

    if(isset($_POST["addToCart"])){
        $item_id = $_POST['item_id'];
        $item_quantity = $_POST['item_quantity'];
        $item_price = $_POST['item_price'];
        
        $result = $cart->saveCart($item_id, $user_id, $item_quantity, $item_price);

    }
    // elseif(isset($_POST["checkout"]){
    //     $cart_id = $_GET['cart_id'];

    //     $result = $cart->selectSum($cart_id);
    // }
    // elseif(isset($_POST["remove_from_cart"]) {
    //     $ci_id = $_GET['ci_id'];
        
    //     $result = $cart->remove_from_cart($ci_id);
    // }
    

?>
