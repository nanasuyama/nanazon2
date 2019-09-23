<?php

    require_once '../classes/User.php';
    include 'header.php';


    $user = new User;
    $id = $_GET['user_id'];
    $get_user = $user->selectOne($id);

?>

<div class="container" style="margin-top: 160px;"><br>
    <form action="user_action.php?action=update" method="post">
        <input type="hidden" name="user_id" value="<?php echo $_GET['user_id'];?>">
        <div class="form-group">
            <label for="username">Username</label><br>
            <input type="text" name="username" id="" class="form-control" value="<?php echo $get_user['username'];?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label><br>
            <input type="email" name="email" id="" class="form-control" value="<?php echo $get_user['email'];?>">
        </div>
        <div class="form-group">
            <label for="firstname">Firstname</label><br>
            <input type="text" name="firstname" id="" class="form-control" value="<?php echo $get_user['firstname'];?>">
        </div>
        <div class="form-group">
            <label for="lastname">Lastname</label><br>
            <input type="text" name="lastname" id="" class="form-control" value="<?php echo $get_user['lastname'];?>">
        </div>

        <button name="add" class="btn btn-primary float-right">Save</button>

    </form>
</div>
</body>
<html>

