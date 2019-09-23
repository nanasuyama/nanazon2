<?php

    include 'header.php';

?>

<div class="container" style="width: 100%;"><br>
    <div style="margin-left: 30%;">
        <div>
            <form action="user_action.php?action=add" method="post">

                <div style="font-size: 20px; padding-top: 10%;">
                    <label for="username">Username</label><br>
                    <input type="text" name="username" style="border: 1px solid black; width: 50%; height: 30px;">
                </div>
                    
                <div style="font-size: 20px;">
                    <label for="email">Email</label><br>
                    <input type="email" name="email" style="border: 1px solid black; width: 50%; height: 30px;">
                </div>

                <div style="font-size: 20px;">
                    <label for="firstname">Firstname</label><br>
                    <input type="text" name="firstname" style="border: 1px solid black; width: 50%; height: 30px;">
                </div>

                <div style="font-size: 20px;">
                    <label for="lastname">Lastname</label><br>
                    <input type="text" name="lastname" style="border: 1px solid black; width: 50%; height: 30px;">
                </div>

                <div style="font-size: 20px;">
                    <label for="dob">Date of Birth</label><br>
                    <input type="date" name="dob" style="border: 1px solid black; width: 50%; height: 30px;">
                </div>

                <div style="font-size: 20px;">
                    <label for="password">Password</label><br>
                    <input type="password" name="password" style="border: 1px solid black; width: 50%; height: 30px;">
                </div>

                <div style="font-size: 20px;">
                    <label for="status">Status</label><br>
                        <select name="status" style="border: 1px solid black; width: 50%; height: 30px;">
                            <option value="A">Admin</option>
                            <option value="U">User</option>
                        </select>
                </div>

                <input type="submit" value="Save" name="add" style="border: 1px solid black; background: skyblue; width: 50%; height: 30px; margin-top: 2%;">

            </form>
        </div>
    </div>
</div>


</body>

</html>