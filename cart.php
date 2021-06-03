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
    <link rel="stylesheet" href="css/style.css">
</head>
<style>

  
 
</style>
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
                <div class="border bg-light rounded p-4">
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
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                </thead>
                <tbody class="text-center">
                <?php
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
                        <td><?php echo $product['rate'];?><input type="hidden" class='iprice' value='<?php echo $product['rate'];?>'></td>
                        <td>
                          <form action="mycart.php" method="POST">
                
                          <input type='number'class='text-center iquantity' name="mod_quantity" onchange="this.form.submit();" value="<?php echo $value['Quantity'];  ?>" min='1' max='10'>
                          <input type='hidden' name='pid' value='<?php echo $product['pid']; ?>'>
                          </form>
                         </td>
                        <td class='itotal'></td>
                        <td>

                            <form action="mycart.php" method="POST">
                            <button class='btn btn-outline-danger' name="remove">Remove</button>
                            <input type='hidden' name='pid' value='<?php echo $product['pid']; ?>'>
                            </form>                       
                        </td>

                        
                    </tr>
                    <?php
                    }
                  }
                }
                ?>
                </tbody>
            </table>
            </div>
        </div>

            <div class="col-lg-3">
            <div class="border bg-light rounded p-4">
                <h4>Grand Total :</h4>
                <h5 class="text-right" id="gtotal"></h5>
                <br>
                <?php 
                 if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
                 {
                ?>
                <form action="purchase.php" method="POST">
                    <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" required>
                    </div>


                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-chevk-label" for="flexRadioDefault2">
                        Cash On Delivery
                    </label>
                </div>
        
                    <button type="submit" class="btn btn-primary btn-block" name="pay">Make Purchase</button>
                </form>
                <?php 
                 }
                 ?>
            </div>
            </div>





        </div>
    </div>
 
     

</div>

<script>
  var gt=0;
  var iprice=document.getElementsByClassName('iprice');
  var iquantity=document.getElementsByClassName('iquantity');
  var itotal=document.getElementsByClassName('itotal');
  var gtotal=document.getElementById('gtotal');

  function subtotal()
  {
      gt=0;
      for(i=0;i<iprice.length;i++)
      {
        itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
        gt=gt+((iprice[i].value)*(iquantity[i].value));  
    }
   gtotal.innerText=gt;
  }

  subtotal();

</script>



</body>
</html>