<html lang="en">
<head>
  <title>Menswear</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/side.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="page">
<div class="navbar">
            <img src="images/logo.png" class="logo rotate">
            <div class="bu">
            <button type="submit" style="float: right"><a href="./cart.php" class="cart">Logout</a></button>
            <button type="button"><a href="./cart.php">Cart</a></button>
    </div>
</div>
  <?php include("filter.php"); ?>

    <div class="sidenav">     

    <form action="card.php" method="GET">
  <select name="brand">
    <option value="none" selected disabled hidden>Brand</option>

  <?php
  $num=pg_num_rows($brand);
if($num>0){  
    while($product=pg_fetch_array($brand)){
     ?>
    
    <option><?php echo $product['bname']; ?></option>

  <?php
    }
  }
  ?>
  </select>
  <br><br>
  <select name="category">
  <option value="none" selected disabled hidden>Category</option>

<?php
$num=pg_num_rows($category);
if($num>0){  
  while($product=pg_fetch_array($category)){
   ?>
  
  <option><?php echo $product['catgnm']; ?></option>

<?php
  }
}
?>
</select>
<br><br>

<select name="ctype">
<option value="none" selected disabled hidden>Clothe</option>
<?php
$num=pg_num_rows($ctype);
if($num>0){  
  while($product=pg_fetch_array($ctype)){
   ?>
  
  <option><?php echo $product['ctnm']; ?></option>

<?php
  }
}
?>
</select>
<br><br>
<select name="pattern">
<option value="none" selected disabled hidden>Pattern</option>
<?php
$num=pg_num_rows($pattern);
if($num>0){  
  while($product=pg_fetch_array($pattern)){
   ?>
  
  <option><?php echo $product['pnm']; ?></option>

<?php
  }
}
?>
</select>
<br><br>

<select name="fitting">
<option value="none" selected disabled hidden>Fitting</option>
<?php
$num=pg_num_rows($fitting);
if($num>0){  
  while($product=pg_fetch_array($fitting)){
   ?>
  
  <option><?php echo $product['fnm']; ?></option>

<?php
  }
}
?>
</select>
<br><br>
<select name="size">
<option value="none" selected disabled hidden>Size</option>
<?php
$num=pg_num_rows($size);
if($num>0){  
  while($product=pg_fetch_array($size)){
   ?>
  
  <option><?php echo $product['size']; ?></option>

<?php
  }
}
?>
</select>
<br><br>
  <button type="submit" class="bu">Apply</button>
</form>




    </div>
    <iframe class="main" height="85%" width="85.01%" allowtransparency="true" src="new.php" name="iframe_a"></iframe>
    <!-- <iframe href="new.php" height="50%" width="70%"></iframe> -->
  </div>
</body>
</html>