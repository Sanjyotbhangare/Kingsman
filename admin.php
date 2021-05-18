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
    
    <form action="adm.php" method="post">
        <div class="login-box">
            <h1>AdminLogin</h1>
            <?php if (isset($_GET['error'])){ ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
             <?php } ?>
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="ID" name="id">
            </div>

            <div class="textbox">
            <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password" name="pas">
            </div>

            <input class="btn" type="submit" name="" value="Sign In">
 
        </div>
    </form>
    

    </body>
</html>