<?php

    require_once '../classes/Item.php';
    include 'header.php';

    $item = new Item;

?>

<div class="container">
    <table class="table table-hover" style="margin-top: 200px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Category</th>
                <th>Seller</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Details</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            <?php

                $get_items = $item->selectAll();
                // print_r($get_users); ROWの中身をみる

                if($get_items){
                    foreach($get_items as $key => $row){
                        $id = $row['item_id'];
                        echo "<tr>";
                            echo "<td>" . $row['item_id'] . "</td>";
                            echo "<td>" . $row['item_name'] . "</td>";
                            echo "<td>" . $row['category_name'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['item_price'] . "</td>";
                            echo "<td>" . $row['item_quantity'] . "</td>";

                            echo "<td><a href='item_view.php?item_id=$id' class='btn btn-warning btn-sm'>View</a></td>";
                            echo "<td>
                                <a href='item_edit.php?item_id=$id' class='btn btn-info btn-sm'>Edit</a>";
            ?>
                                <a href='item_action.php?action=delete&item_id=<?php echo $id;?>' class='btn btn-danger btn-sm' onclick='return confirm("Are you sure you want to delete?");'>Delete</a>
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