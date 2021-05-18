<html>
    <head>
        <meta charset="utf-8">
        <title>Menswear</title>
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
        

    </style>
    <body>
    <div class="navbar">
            <img src="images/logo.png" class="rotate">
    </div>
    
    <form action="reg.php" method="post">
        <div class="login-box">
            <h1>Registration</h1>
            <?php if (isset($_GET['error'])){ ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
             <?php } ?>
            <div class="textbox">
                <i class="fa fa-mobile" aria-hidden="true"></i>
                <input type="text" placeholder="Mobile No" name="mob">
            </div>

            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Name" name="name">
            </div>

            <div class="textbox">
            <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password" name="pas">
            </div>

            <div class="textbox">
            <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Confirm Password" name="cpas">
            </div>

            <input class="btn" type="submit" name="" value="Register">
 
        </div>
    </form>
    

    </body>
</html>