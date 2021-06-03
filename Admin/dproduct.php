<html>
    <head>
        <meta charset="utf-8">
        <title>Menswear</title>
        <link rel="stylesheet" href="../css/login.css">
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
            <img src="../images/logo.png" class="rotate">
            
    </div>
    
    <form action="dproduct1.php" method="POST">
        <div class="login-box">
            <h1>ProductInfo</h1>
            <?php if (isset($_GET['error'])){ ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
             <?php } ?>
            <div class="textbox">
                
                <input type="text" placeholder="Brand Name" name="brand">
            </div>

            <div class="textbox">
                
                <input type="text" placeholder="Category Name" name="category">
            </div>

            <div class="textbox">
                
                <input type="text" placeholder="Clothe Name" name="ctype">
            </div>

            <div class="textbox">
                
                <input type="text" placeholder="Pattern Name" name="pattern">
            </div>

            <div class="textbox">
                
                <input type="text" placeholder="Fitting Name" name="fitting">
            </div>

            <div class="textbox">
                
                <input type="text" placeholder="Size" name="size">
            </div>

            
            <input class="btn" type="submit" name="" value="Remove">
 
        </div>
    </form>
    






    </body>
</html>