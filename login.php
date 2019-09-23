<?php
   include 'header.php';

?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">

    <style>
        
    </style>
</head>
<body>
<br><br><br><br><br><br>

    <section class="loginSection">
        <div class="formdiv">
            <h1 class="loginTitle">Log In</h1>
            <form id="formLogin" action="../user_action.php" method="post">
                <input type="email" name="email" id="email" placeholder="Email">
                <br>
                <input type="password" name="password" id="loginPass" placeholder="Password">
                <br>
                <input type="submit" name="login" id="loginBtn" value="Log In">
            </form>
        </div>
    </section><br><br>

    </body>
</html>

<?php

    include 'footer.php';

?>


