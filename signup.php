<?php
   include 'header.php';
?>
<html>
    <head>
    <link rel="stylesheet" href="../css/signup.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<br><br><br><br>
    <section class="signupSection">
        <div class="formDiv" >
            <h1 class="signupTitle">Sign Up</h1>
            <form id="formSignup" action="../user_action.php" method="post">
                <input type="email" name="email" id="email" placeholder="Email"><br>
                <input type="text" name="firstname" id="firstName" placeholder="First name"><br>
                <input type="text" name="lastname" id="lastName" placeholder="Last name"><br>
                <input type="password" name="password" id="pass" placeholder="Password"><br>
                <input type="submit" name="add" id="signupBtn" value="Register">
            </form>
        </div>
        

    </section><br><br>

</body>
</html>

 <?php
 
    include 'footer.php';
 ?>