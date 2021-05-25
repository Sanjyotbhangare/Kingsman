<html lang="en">
<head>
  <title>Menswear</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body class="container">



   <div class="row">
   <?php 
   include"db_conn.php";

   $query="select pid,bname,catgnm,ctnm,pnm,fnm,size,rate,cstk,image from vproduct order by pid";
    $sql=pg_query($conn,$query);

    $num=pg_num_rows($sql);

    if($num>0){
        while($product=pg_fetch_array($sql)){
         ?>

        <div class="col-lg-3 col-md-3 col-sm-12">
            <form>
            <div class="card">
              <h6 class="card-title"> <?php  echo $product['bname']."\t".$product['catgnm']."\t".$product['pnm']."\t".$product['ctnm']; ?>  </h6>
            
                <div class="card-body">
                <img src="./images/<?php echo $product['image']; ?>" alt="image" class="img-fluid">
                <br>
                <h9><?php  echo $product['fnm']."\t".$product['size']; ?></h9>
                <br><h8> &#8377; <?php  echo $product['rate']; ?></h8>
                
                </div>

            </div>
            
            </form>
        
        
        </div>   



        <?php
        }
    }


?>

</div>
</body>
</html>