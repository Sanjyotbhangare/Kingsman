<html lang="en">
<head>
  <title>Menswear</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="page">
<div class="container">
   <div class="row-auto my-lg-auto">
    <div class="col-12 mx-auto">
      <div class='row gy-2'>


   <?php 
   // include"db_conn.php";
   include("card.php");

 

    $num=pg_num_rows($sql);

    if($num>0){  
        while($product=pg_fetch_array($sql)){
         ?>

            <div class='col-md-4 col-12 mx-auto'>
            <form>
            <div class="card mb-4 mt-5 col-12 mx-auto" >
            <div class='card'>    
                 <img class="card-img-top col-12 mx-12" src="./images/<?php echo $product['image']; ?>" alt="product image " />
                 <div class="card-body">
                      <h5 class="card-title fo"><?php  echo $product['bname']."\t".$product['catgnm']."\t".$product['pnm']."\t".$product['ctnm']; ?> </h5>
                      <p class="card-text"><h9><?php  echo $product['fnm']."\t".$product['size']; ?></h9>
                      <br><h8> &#8377; <?php  echo $product['rate']; ?></h8></p>
                      <a class="button btn btn-primary"> Add to Cart  </a>
                 </div>
            </div>
            </div>
            </form>
            </div> 

        <?php
        }
    }


?>
 </div>
    </div>
   </div>
</div>
</div>
</body>
</html>