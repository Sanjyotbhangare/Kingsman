<?php
 session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Icecube</title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <style>
        p{
            color: red;
            display: flex;
            width: 90%;
            margin-left: 10%;
            /* text-size-adjust: 50%; */
            font-size: 15px; 
        }
        h1{
            margin-right: 40%;
        }

    </style>
    <body>
    <div class="navbar">
            <img src="images/logo.png" class="rotate">
    </div>
    
    <form action="log.php" method="post">
        <div class="login-box">
            <h1>Login</h1>
            <?php if (isset($_GET['error'])){ ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
             <?php } ?>
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" autocomplete="off" placeholder="Mobile No" name="mob">
    
            </div>

            <div class="textbox">
            <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password" name="pas">
            </div>
             Don't Remember ?  <a href="forget.php"> Forget Password</a>
             <br>
             New Customer   <a href="registration.php"> Registration </a> 

            <input class="btn" type="submit" name="" value="Sign In">
 
        </div>
    </form>
    <?php
       $_SESSION['mobno']='mob';
    ?>
    

    </body>
</html>