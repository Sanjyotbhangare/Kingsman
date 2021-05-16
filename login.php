<html>
    <head>
        <meta charset="utf-8">
        <title>Menswear</title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
    <div class="navbar">
            <img src="images/logo.png" class="rotate">
    </div>
    <form action="login.php" method="POST">
        <div class="login-box">
            <h1>Login</h1>
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="number" placeholder="Mobile No" name="mob">
            </div>

            <div class="textbox">
            <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password" name="pas">
            </div>

            <input class="btn" type="submit" name="" value="Sign In">
 
        </div>
    </form>

    <?php
$host="localhost";
$user="postgres";
$pass="sanjyot";
$db="menswear";

$m=isset($_GET["mob"]);
$mob=(is_int($m)==1);
echo $mob;
// $mob=9657302862;
$pas='sanjyot';

// echo"<br> $mob $password";
$conn=pg_connect("host=$host dbname=$db user=$user password=$pass");
if(!$conn){
    echo " 121313An error occured .\n";
    exit;
}

$result=pg_query($conn,("select mobno from cust where mobno='' and password='$pas'") );
if($result==NULL){
   echo "<br> An error occured .\n";
   exit;
}

$r=pg_fetch_assoc($result);
if($r==0){
   echo ('<br>Customer Not Exist');
}else{
    echo ("<br>Successful Login");
}

pg_close($conn);
?>


    </body>
</html>