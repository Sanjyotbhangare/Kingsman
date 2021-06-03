<?php
session_start();
?>

<html lang="en">
<head>
<head>
  <title>Menswear</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://ude.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<style>
body{
  background-color: rgb(61, 51, 51);
}
 
</style>
<body>
    <div class="hero">
        <div class="navbar">
            <img src="../images/logo.png" class="logo rotate">
            <div class="bu">
            <button type="submit" style="float: right"><a href="../Logout.php" class="cart">Logout</a></button>
            <button type="submit" style="float: right"><a href="./admain.php">HOME</a></button>
        </div>
        </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded text-color white">
                <h2>Orders</h2>
            </div>
            <div class="col-lg-12">
                <div class="border bg-light rounded p-4">
             <table class="table">
                <thead class="text-center">
                    <th scope="col">Order No.</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Mobile No.</th>
                    <th scope="col">Total Cost</th>
                    <th scope="col">Address</th>
                    <th scope="col"></th>
                </thead>
                <tbody class="text-center">
                <?php
                include("../db_conn.php");

                    $sql="select * from ord";
                    $query=pg_query($conn,$sql);
                    while($product=pg_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $product['ono']; ?></td>
                        <td><?php echo $product['odate']; ?></td>
                        <td><?php echo $product['mobno']; ?></td>
                        <td><?php echo $product['tcost']; ?></td>
                        <td><?php echo $product['address']; ?></td>
                        <td>

                            <form action="ddord.php" method="POST">
                            <button class='btn btn-outline-success' name="details">Details</button>
                            <input type='hidden' name='ono' value='<?php echo $product['ono']; ?>'>
                            </form>                       
                        </td>

                        
                    </tr>
                    <?php
                    }
                ?>
                </tbody>
            </table>
            </div>
        </div>





        </div>
    </div>
 
     

</div>





</body>
</html>