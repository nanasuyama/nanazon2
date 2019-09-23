<?php
    require_once '../classes/Category.php';
    include 'header.php';

    $category = new Category;
    $id = $_GET['category_id'];
    $get_category = $category->selectOne($id);

?>

<div class="container" style="margin-top: 300px;"><br>
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="category_action.php?action=update" method="post">
                <input type="hidden" name="category_id" value="<?php echo $_GET['category_id'];?>">
                <div class="form-group">
                    <label for="category_name">Edit Category Name</label><br>
                    <input type="text" name="category_name" class="form-control" value="<?php echo $get_category['category_name'];?>">
                </div>

                <input type="submit" value="Save" name="add" class="btn btn-primary float-right">

            </form>
        </div>
    </div>
</div>

</body>
</html>