<?php

    include 'header.php';
?>

<div class="container" style="width: 100%;">
    <div style="margin-left: 30%;">
        <div class="">
           
            <form action="item_action.php" method="post" enctype="multipart/form-data">
                
            <div class="form-group" style="font-size: 22px; padding-top: 10%;">

                <label for="item_name">Item Name</label><br>
                <input type="text" name="item_name" style="border: 1px solid black; width: 50%; height: 30px;" >
            </div>

            <div class="form-group">
                <label for="category_name"  style="font-size: 22px;">Category Name</label><br>
                <select name="category_name"  style="border: 1px solid black; width: 50%; height: 30px;">
                    <option value="category_name" style="font-size: 22px;">Choose Category</option>
                    <?php

                        require_once '../classes/Category.php';
                        $category = new Category;
                        $list = $category->selectAll();

                        foreach($list as $key => $values){
                            echo "<option value='".$values['category_id']."'>".$values['category_name']."</option>";
                        }

                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="item_desc" style="font-size: 22px;">Description</label><br>
                <textarea name="item_desc" rows="8" style="border: 1px solid black; width: 50%;"></textarea>
            </div>

            <div class="form-group">
                <label for="item_price" style="font-size: 22px;">Price (USD)</label><br>
                <input type="number" name="item_price" style="border: 1px solid black; width: 50%; height: 30px;" placeholder="$">
            </div>

            <div class="form-group">
                <label for="item_quantity" style="font-size: 22px;">Quantity</label><br>
                <input type="number" name="item_quantity"  style="border: 1px solid black; width: 50%; height: 30px;" class="form-control">
            </div>

            <label for=""  style="font-size: 22px;">File Upload</label>
            <div class="form-group"  style="border: 1px solid black; width: 50%;">
                <label for="image"></label>
                <input type="file" name="image1" id="">
                <input type="file" name="image2" id="">
                <input type="file" name="image3" id="">
                <input type="file" name="image4" id="">
                <input type="file" name="image5" id="">
            </div>

            
            <input type="submit" value="Save" name="add" style="border: 1px solid black; background: skyblue; width: 50%; height: 30px; margin-top: 2%;">

            </form>
        </div>
    </div>
</div>

<!-- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat, sapiente debitis. Est provident, repellendus eligendi corporis ab enim nobis libero magnam maxime eum esse optio. Iure optio dolorem non corporis? -->