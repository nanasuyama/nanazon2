<?php
    session_start();
    $user_id = $_SESSION['user_id'];

    require_once '../classes/Item.php';

    $item = new Item;

    if(isset($_POST["add"])) {
        $item_name = $_POST['item_name'];
        $category_id = $_POST['category_name'];
        $item_desc = $_POST['item_desc'];
        $item_price = $_POST['item_price'];
        $item_quantity = $_POST['item_quantity'];

        $target_dir = '../uploads/item_images/';

        $image1_name = basename($_FILES['image1']['name']);
        $image1 = $target_dir . $image1_name;
        $tmp_image1 = $_FILES['image1']['tmp_name'];

        $image2_name = basename($_FILES['image2']['name']);
        $image2 = $target_dir . $image2_name;
        $tmp_image2 = $_FILES['image2']['tmp_name'];

        $image3_name = basename($_FILES['image3']['name']);
        $image3 = $target_dir . $image3_name;
        $tmp_image3 = $_FILES['image3']['tmp_name'];
        
        $image4_name = basename($_FILES['image4']['name']);
        $image4 = $target_dir . $image4_name;
        $tmp_image4 = $_FILES['image4']['tmp_name'];

        $image5_name = basename($_FILES['image5']['name']);
        $image5 = $target_dir . $image5_name;
        $tmp_image5 = $_FILES['image5']['tmp_name'];

        $result = $item->save($item_name, $category_id, $user_id, $item_desc, $item_price, $item_quantity, 
                                $image1, $tmp_image1, $image2, $tmp_image2, $image3, $tmp_image3, $image4, $tmp_image4, $image5, $tmp_image5,
                            $image1_name, $image2_name, $image3_name, $image4_name, $image5_name);
    }
    // elseif($_GET['action'] == 'update') {
    //     $id = $_POST['item_id'];
    //     $item_name = $_POST['item_name'];
    //     $category_id = $_POST['category_id'];
    //     $item_desc = $_POST['item_desc'];
    //     $item_price = $_POST['item_price'];
    //     $item_quantity = $_POST['item_quantity'];
        
    //     $result = $item->update($id,$item_name,$category_id,$item_desc,$item_price,$item_quantity);

    // }
    // elseif($_GET['action'] == 'delete') {
    //     $id = $_GET['item_id'];
    //     $result = $item->delete($id);
    // }



?>