<?php

    require_once '../classes/Item.php';
    include 'header.php';

    $item = new Item;
    $id = $_GET['item_id'];
    $get_item = $item->selectOne($id);


?>

<div class="container" style="margin-top: 200px;">
    <form action="item_action.php?action=update" method="post">
        <input type="hidden" name="item_id" value="<?php echo $_GET['item_id'];?>">

        <div class="form-group">
            <label for="item_name">Item Name</label>
            <input type="text" name="item_name" class="form-control" value="<?php echo $get_item['item_name'];?>">
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control">
                <?php

                    require_once '../classes/Category.php';

                    $category = new Category;
                    $get_categories = $category->selectAll();

                    foreach($get_categories as $key => $row){
                        $category_id = $row['category_id'];
                        $category_name = $row['category_name'];
                ?>
                <option value="<?php echo $category_id;?>"
                        <?php if($get_item['category_id'] == $category_id) echo "selected";?>>
                        <?php echo $category_name;?>
                </option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="item_desc">Description</label>
            <textarea name="item_desc" cols="30" rows="10" class="form-control"><?php echo $get_item['item_desc'];?></textarea>
        </div>

        <div class="form-group">
            <label for="item_price">Item Price</label>
            <input type="number" name="item_price" class="form-control" value="<?php echo $get_item['item_price'];?>">
        </div>

        <div class="form-group">
            <label for="item_quantity">Quantity</label>
            <input type="number" name="item_quantity" class="form-control" value="<?php echo $get_item['item_quantity'];?>">
        </div>

        <button name="add" class="btn btn-primary float-right">Save</button>
    </form>
    <br><br>
</div>
</body>
</html>