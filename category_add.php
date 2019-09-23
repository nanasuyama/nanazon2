<?php

    include 'header.php';

?>

<div class="container"><br>
    <div style=" margin-top: 10%; margin-left: 30%;">
        <div class="" style="">
            <form action="category_action.php?action=add" method="post">

                <div style="">
                    <label for="category" style="font-size: 22px">Categories</label><br>
                    <input type="text" name="category_name" style="width: 50%; height: 30px; border: 1px solid black;">
                </div>

                <input type="submit" value="Save" name="add" style="border: 1px solid black; background: skyblue; width: 50%; height: 30px; margin-top: 5%;">

            </form>
        </div>
    </div>
</div>
</body>
</html>