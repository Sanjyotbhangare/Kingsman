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
    
    <form action="check_forget.php" method="post">
        <div class="login-box">
            <h2>Forget Password</h2>
            <?php if (isset($_GET['error'])){ ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
             <?php } ?>
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" autocomplete="off" placeholder="Mobile No" name="mob">
    
            </div>

            <div class="textbox">
            <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="New Password" name="pas">
            </div>

            <div class="textbox">
            <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Confirm New Password" name="cpas">
            </div>

            <input class="btn" type="submit" name="" value="Sign In">
 
        </div>
    </form>
    <?php
       $_SESSION['mobno']='mob';
    ?>
    

    </body>
</html>