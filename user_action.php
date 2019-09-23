<?php

require_once "classes/User.php";

$user = new User;

if(isset($_POST['add'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $user->save($email, $password, $firstname, $lastname);
}
elseif (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user->login($email, $password);
}
elseif($_GET['action'] == 'delete') {
    $user_id = $_GET['user_id'];

    $result = $user->delete($user_id);
    if($result) {
        echo "<script>window.location.replace('cart.php');</script>";
    }

// elseif ($_GET['action'] == 'update') {
//         $user_id = $_POST['user_id'];
//         $username = $_POST['username'];
//         $email = $_POST['email'];
//         $firstname = $_POST['firstname'];
//         $lastname = $_POST['lastname'];

//         $result = $user->update($user_id, $username, $email, $firstname, $lastname);

//         if($result) {
//             echo "<script>window.location.replace('user_list.php');</script>";
//         }
//     }
}






?>