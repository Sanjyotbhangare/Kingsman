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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="hero">
        <div class="navbar">
            <img src="images/logo.png" class="logo rotate">
            <div class="bu">
            <button type="submit" style="float: right"><a href="./Logout.php" class="cart">Logout</a></button>
            <button type="submit" style="float: right"><a href="./main.php">HOME</a></button>
        </div>
        </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded text-color white">
                <h2>MY CART</h2>
            </div>
            <div class="col-lg-9">
             <table class="table">
                <thead class="text-center">
                    <th scope="col">Product Id</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Category</th>
                    <th scope="col">Clothe</th>
                    <th scope="col">Pattern</th>
                    <th scope="col">Fitting</th>
                    <th scope="col">Size</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col"></th>
                </thead>
                <tbody class="text-center">
                <?php
                $total=0;
                include("db_conn.php");
                if(isset($_SESSION['cart']))
                {   
                  foreach($_SESSION['cart'] as $key => $value)
                  {
                     $a=$value['pid'];
                    $sql="select * from vproduct where pid=$a";
                    $query=pg_query($conn,$sql);
                    while($product=pg_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $product['pid']; ?></td>
                        <td><?php echo $product['bname']; ?></td>
                        <td><?php echo $product['catgnm']; ?></td>
                        <td><?php echo $product['ctnm']; ?></td>
                        <td><?php echo $product['pnm']; ?></td>
                        <td><?php echo $product['fnm']; ?></td>
                        <td><?php echo $product['size']; ?></td>
                        <td>&#8377;<?php echo $product['rate'];?></td>
                        <td><input type='number'class='text-center' value='1' min='1' max='10'></td>
                        <td>
                            <form action="mycart.php" method="POST">
                            <button class='btn btn-sm btn-outline-danger' name="remove">REMOVE</button>
                            <input type='hidden' name='pid' value='<?php echo $product['pid']; ?>'>
                            </form>                       
                        </td>

                        <?php $total=$total+$product['rate']; ?>
                    </tr>
                    <?php
                    }
                  }
                }
                ?>
                </tbody>
            </table>
            </div>


            <div class="col-lg-3">
            <div class="border bg-light rounded p-4">
                <h4>Total :</h4>
                <h5 class="text-right"><?php echo $total ?></h5>
                <br>
                <form>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-chevk-label" for="flexRadioDefault2">
                        Cash On Delivery
                    </label>
                </div>
        
                    <button class="btn btn-primary btn-block">Make Purchase</button>
                </form>
            </div>
            </div>





        </div>
    </div>
 
     

</div>
</body>
</html>