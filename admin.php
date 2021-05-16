<html>
    <head>
        <meta charset="utf-8">
        <title>Menswear</title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <style>
        h1{
            display: flex;
            /* text-size-adjust: 50%; */
            font-size: 10px; 
        }

    </style>
    <body>
    <div class="navbar">
            <img src="images/logo.png" class="rotate">
    </div>
    <form action="./admin.php" method="GET">
        <div class="login-box">
            <h1>Admin Login</h1>
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="ID" name="" value="">
            </div>

            <div class="textbox">
            <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password" name="" value="">
            </div>

            <input class="btn" type="button" data-toggle="modal" data-target="#myModal" name="" value="Sign In">
 
        </div>
    </form>

    



    </body>
</html>