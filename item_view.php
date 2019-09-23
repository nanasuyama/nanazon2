<?php

    require_once '../classes/Item.php';
    include 'header.php';

    $item = new Item;
    $item_id = $_GET['item_id'];
    $get_item = $item->selectOne($item_id);

    $list_image = $item->selectAllImage($item_id);

?>

<div class="container" style="margin-top:200px;">
    <div class="row">
        <div class="col-md-4">


            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <?php 
                    $i = 0;
                    foreach($list_image as $key => $values){
                        if($i == 0){
                            echo '<div class="carousel-item active">';
                        }
                        else {
                            echo '<div class="carousel-item">';
                        }
                        echo "<img src = '../".$values['image_path'].$values['image_name']."' class='d-block w-100' />";
                        echo '</div>';
                        $i++;
                    }
                ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
                
            
        </div>

        <div class="col-md-8 text-left">
            <span class="text-dark font-weight-bold">Item Name : </span>
            <p class="lead text-dark float-right"> <?php echo $get_item['item_name'];?></p><hr>

            <span class="text-dark font-weight-bold">Category : </span>
            
                <?php

                    require_once '../classes/Category.php';

                    $category = new Category;
                    $get_category = $category->selectAll();

                    foreach($get_category as $key => $row){
                        $category_id = $row['category_id'];
                        $category_name = $row['category_name'];
                        
                ?>
                
                <p class="lead text-dark float-right">
                    <?php if($get_item['category_id'] == $category_id) echo $category_name;?>
                
                <?php
                }
                ?>
            </p><hr>

            <span class="text-dark font-weight-bold">Seller : </span>

                <?php

                    require_once '../classes/User.php';

                    $user = new User;
                    $get_user = $user->selectAll();

                    foreach($get_user as $key => $row){
                        $user_id = $row['user_id'];
                        $username = $row['username'];
                ?>
                
                <p class="lead text-dark float-right">
                <?php if($get_item['user_id'] == $user_id) echo $username;?>
                
                <?php
                }
                ?>
            </p><hr>
            
            <span class="text-dark font-weight-bold">Price : </span>
                <p class="lead text-dark float-right"><?php echo $get_item['item_price'];?></p><hr>

            <span class="text-dark font-weight-bold">Quantity : </span>
                <p class="lead text-dark float-right"><?php echo $get_item['item_quantity'];?></p><hr>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-dark font-weight-bold">Description :</h3>
                </div>
                <div class="card-body">
                <?php echo $get_item['item_desc'];?>
                </div>
            </div> 
        </div>
        
        
    </div>
</div>
</body>
</html>