<?php
session_start();
include '../classes/User.php';
$user = new User;
$result = $user->logout();

?>