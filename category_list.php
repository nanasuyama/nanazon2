<?php

    require_once '../classes/Category.php';
    include 'header.php';

    $category = new Category;

?>
<div class="container">
    <table class="table table-hover" style="margin-top: 200px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            <?php

                $get_categories = $category->selectAll();

                if($get_categories){
                    foreach($get_categories as $key => $row){
                        $id = $row['category_id'];
                        echo "<tr>";
                            echo "<td>" . $row['category_id'] . "</td>";
                            echo "<td>" . $row['category_name'] . "</td>";
                            echo "<td>
                                <a href='category_edit.php?category_id=$id' class='btn btn-info btn-sm'>Edit</a>";
            ?>
                                <a href='category_action.php?action=delete&category_id=<?php echo $id;?>' class='btn btn-danger btn-sm' onclick='return confirm("Are you sure you want to delete?");'>Delete</a>
                                </td>
                            </tr>
            <?php
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>Nothing to show</td></tr>";
                }
                echo "</tbody>";
                echo "</table>";

            
        ?>
</div>

</body>

</html>