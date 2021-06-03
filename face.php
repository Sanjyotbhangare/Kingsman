<?php 
session_start();
session_destroy();
session_start();
?>

<html>
<head>
    <title>Menswear</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="hero">
        <div class="navbar">
            <img src="images/logo.png" class="logo rotate">
            <div class="bu">
            <button type="button"><a href="login.php">Sign In</a></button>
            <button type="button"><a href="registration.php">Sign Up</a></button>
            <button type="button"><a href="admin.php">Administrator</a></button>
        </div>
        </div>
        <div class="content">
            Welcome to our
            <h1>Impressive <br> Collection For Men</h1>
            <div class="bu">
            <button type="button"><a href="main.php">Let's Go </a></button>
        </div>
        </div>
    </div>

</body>
</html>