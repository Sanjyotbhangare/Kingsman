<?php
session_start();
?>


<html lang="en">
<head>
  <title>Icecube</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/side.css">
  <!-- <link rel="stylesheet" href="css/main.css"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
/* 
.logo{
    width:100px;
    cursor:pointer;
    /* margin-left: 2%; */
/* }
.rotate{
    animation: rotation 8s infinite linear;
 }

@keyframes rotation{
 from{
     transform: rotate(0deg);
 }
 to{
     transform: rotate(359deg);
 }
}



.navbar{
    /* margin-top: 2000%; */
    /* padding-top: 1%;
    position: relative;
    width:95%;
    height: 15%;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
} */ 


.navbar img{
  /* height: 250%; */
  margin-top: 2%;
  /* width: 10%; */
}

body{
  background-color: rgb(61, 51, 51);
}

.ca{
    margin-left: 15%;
    width:85%;
    align-items: right;
    background-color: rgb(61, 51, 51);
  }

  </style>

<body>


<?php
$count=0;
if(isset($_SESSION['cart']))
{
  $count=count($_SESSION['cart']);
}
?>


  <div class="page">
<div class="navbar">
            <img src="images/logo.png" class="logo rotate">
            <div class="bu">
            <button type="button" class="btn btn-outline-success"><a href="./cart.php">MY Cart (<?php echo $count; ?>)</a></button>
            <button type="button" class="btn btn-outline-danger"><a href="./Logout.php" >Logout</a></button>
          </div>
</div>
  <?php include("filter.php"); ?>

    <div class="sidenav">     

    <form action="main.php" method="GET">
  <select name="Flavour">
    <option value="none" selected disabled hidden>Flavour</option>

  <?php
  $num=pg_num_rows($flavour);
if($num>0){  
    while($product=pg_fetch_array($flavour)){
     ?>
    
    <option><?php echo $product['fname'];?></option>

  <?php
    }
  }
  ?>
  </select>
  <br><br>
  <select name="Product">
  <option value="none" selected disabled hidden>Product</option>

<?php
$num=pg_num_rows($prod);
if($num>0){  
  while($product=pg_fetch_array($prod)){
   ?>
  <option><?php echo $product['ptype']; ?></option>

<?php
  }
}
?>
</select>
<br><br>

<select name="Size">
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
<?php
include("db_conn.php");
if(isset($_GET['Flavour']) || isset($_GET['Product']) || isset($_GET['Size'])){ 
        if(isset($_GET['Flavour'])){
          $aa=$_GET['Flavour'];
          $a="select fname from flavour where fname='$aa'";
         }else{
          $a='select fname from flavour';
        }
        
        if(isset($_GET['Product'])){
          $bb=$_GET['Product'];
          $b="select ptype from product where ptype='$bb'";
        }else{
          $b='select ptype from product';
        }
        if(isset($_GET['Size'])){
          $ff=$_GET['Size'];
          $f="select size from product where size='$ff'";
        }else{
          $f='select size from product';
        }
     
      
         $query="select * from vproduct 
         where fname in ($a) and ptype in ($b) and size in ($f)";       
         $sql=pg_query($conn,$query);
        }else{
           $query="select * from vproduct order by fpid";
              $sql=pg_query($conn,$query);  
         } 
      
      
      ?>

<div class="ca">
<div class="page">
<div class="container">
   <div class="row-auto my-lg-auto">
    <div class="col-12 mx-auto">
      <div class='row gy-2'>




  

 <?php
//  include(".php");
    $num=pg_num_rows($sql);
   //  header("Location:main.php");

   
      if($num>0){

         while($product=pg_fetch_array($sql)){
            ?>

               <div class='col-md-4 col-12 mx-auto'>
            <form action="mycart.php" method="POST">
               <div class='card mb-4 mt-5 col-12 mx-auto' >
               <div class='card'>    
                  <img class="card-img-top col-12 mx-12" src="./images/<?php echo $product['image']; ?>" alt="product image " />
                  <div class="card-body">
                        <h5 class="card-title fo"><?php  echo $product['fname']."\t".$product['ptype']; ?> </h5>
                      <p class="card-text"><h9><?php  echo $product['size']; ?></h9>
                      <br><h8> &#8377; <?php  echo $product['rate']; ?></h8></p>
                      <button class="button btn btn-primary" name="add_to_cart"> Add to Cart  </button>
                      <input type="hidden" name="fpid" value=<?php echo $product['fpid'];?> >
                 </div>
            </div>
            </div>
            </form>
            </div> 

        <?php
        
         }
      }else{
        echo "No Product Found ";
      }
    
?>
 </div>
    </div>
   </div>
</div>
</div>











</div>
  </div>
  




</body>
</html>


