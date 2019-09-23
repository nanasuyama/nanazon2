<?php
// session_start();
// include_once '../classes/User.php';
// $user = new User;
// $user->login_required_admin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/70bb355d1c.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <title>Landing Page</title>
    <style>
    
    @import url('https://fonts.googleapis.com/css?family=Nanum+Myeongjo|Taviraj&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Scheherazade&display=swap');
    * {

        margin: 0;
        padding: 0;
        outline: 0;
        border: 0;
        box-sizing: border-box;
	}
	
	/* html {
		margin-top: -16.5%;
	} */

    a,h1,h2,h3,h4,input,span,p,div {
        font-family: 'Taviraj', serif;
    }

    /* header/navbar */


    li {
        list-style: none;
    }

    a {
        text-decoration: none;
        color: #000;
        display: inline-block;
        position: relative;
    }

    a, [type=submit] {
        cursor: pointer;
    }

    [type=submit]:hover {
        opacity: 0.8;
    }

    .navDropDown {
        visibility: hidden;
    }

    .navbar {
        position: fixed;
        background: #AECBD8;
        width: 100%;
        height: 80px;
        z-index: 10;
        box-shadow: 0 0 5px;
    }


    .logo {
        font-size: 35px;
        float: left;
        padding-top: 1%;
        padding-left: 13%;
    }

    .navlist {
        text-align: right;
    }

    .navMenu {
        padding: 2% 2% 0 2%;
    }

    .navMenu:before{
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 1px;
        background: #555;
        transform: scale(0, 2);
        transition: 0.5s;
    }

    .navMenu:hover:before {
        transform: scale(0.7);
    }

    .navIcon {
        color: rgb(7, 7, 7);
        font-size: 20px;
        margin-right: 2%;
        float: right;
        margin-bottom: 2%;
        padding-top: 1.7%;
    }

    .navIcon:hover {
        opacity: 0.8;
    }


    </style>

</head>
<body>
    <header>

        <nav class="navbar" id="nav">
        
            <div id="logo" style="margin-top: 10px; width: 30%;">
                <a class="logo">nanazon.<span style="font-size: 20px;">admin</span></a>
            </div>
            <div class="navlist" style="width: 100%;">
                
                <a class="navMenu" id="addUser" href="user_add.php">Add User</a>
                <a class="navMenu" id="addCategories" href="category_add.php">Add Category</a>
                <a class="navMenu" id="addItem" href="item_add.php">Add Item</a>
				<a class="navIcon" id="login" title="Log in"><i class="fas fa-user"></i></a>
                <a class="navIcon" id="signup" title="Sign in"><i class="fas fa-sign-in-alt"></i></a>

            </div>
        </nav>
   
    </header>