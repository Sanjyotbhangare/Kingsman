<?php
session_start();
?>


<html lang="en">
<head>
  <title>Menswear</title>
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
  <select name="brand">
    <option value="none" selected disabled hidden>Brand</option>

  <?php
  $num=pg_num_rows($brand);
if($num>0){  
    while($product=pg_fetch_array($brand)){
     ?>
    
    <option><?php echo $product['bname'];?></option>

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
<?php
include("db_conn.php");
if(isset($_GET['brand']) || isset($_GET['category']) || isset($_GET['ctype']) || isset($_GET['pattern']) || isset($_GET['fitting']) || isset($_GET['size'])){ 
        if(isset($_GET['brand'])){
          $aa=$_GET['brand'];
          $a="select bname from brand where bname='$aa'";
         }else{
          $a='select bname from brand';
        }
        
        if(isset($_GET['category'])){
          $bb=$_GET['category'];
          $b="select catgnm from category where catgnm='$bb'";
        }else{
          $b='select catgnm from category';
        }
        if(isset($_GET['ctype'])){
          $cc=$_GET['ctype'];
          $c="select ctnm from ctype where ctnm='$cc'";
        }else{
          $c='select ctnm from ctype';
        }
        if(isset($_GET['pattern'])){
          $dd=$_GET['pattern'];
          $d="select pnm from pattern where pnm='$dd'";
        }else{
          $d='select pnm from pattern';
        }
        if(isset($_GET['fitting'])){
          $ee=$_GET['fitting'];
          $e="select fnm from fitting where fnm='$ee'";
        }else{
          $e='select fnm from fitting';
        }
        if(isset($_GET['size'])){
          $ff=$_GET['size'];
          $f="select size from fitting where size=$ff";
        }else{
          $f='select size from fitting';
        }
     
      
         $query="select pid,bname,catgnm,ctnm,pnm,fnm,size,rate,cstk,image from vproduct 
         where bname in ($a) and catgnm in ($b) and ctnm in ($c) and pnm in ($d) and fnm in ($e) and size in ($f)";       
         $sql=pg_query($conn,$query);
        }else{
           $query="select pid,bname,catgnm,ctnm,pnm,fnm,size,rate,cstk,image from vproduct order by pid";
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
include("db_conn.php");

   
   
   
   
      if(isset($_GET['brand']) || isset($_GET['category']) || isset($_GET['ctype']) || isset($_GET['pattern']) || isset($_GET['fitting']) || isset($_GET['size'])){ 
        if(isset($_GET['brand'])){
          $aa=$_GET['brand'];
          $a="select bname from brand where bname='$aa'";
         }else{
          $a='select bname from brand';
        }
        
        if(isset($_GET['category'])){
          $bb=$_GET['category'];
          $b="select catgnm from category where catgnm='$bb'";
        }else{
          $b='select catgnm from category';
        }
        if(isset($_GET['ctype'])){
          $cc=$_GET['ctype'];
          $c="select ctnm from ctype where ctnm='$cc'";
        }else{
          $c='select ctnm from ctype';
        }
        if(isset($_GET['pattern'])){
          $dd=$_GET['pattern'];
          $d="select pnm from pattern where pnm='$dd'";
        }else{
          $d='select pnm from pattern';
        }
        if(isset($_GET['fitting'])){
          $ee=$_GET['fitting'];
          $e="select fnm from fitting where fnm='$ee'";
        }else{
          $e='select fnm from fitting';
        }
        if(isset($_GET['size'])){
          $ff=$_GET['size'];
          $f="select size from fitting where size=$ff";
        }else{
          $f='select size from fitting';
        }
     
      
         $query="select pid,bname,catgnm,ctnm,pnm,fnm,size,rate,cstk,image from vproduct 
         where bname in ($a) and catgnm in ($b) and ctnm in ($c) and pnm in ($d) and fnm in ($e) and size in ($f)";       
         $sql=pg_query($conn,$query);
        //  header("Location:main.php");
        }else{
           $query="select pid,bname,catgnm,ctnm,pnm,fnm,size,rate,cstk,image from vproduct order by pid";
              $sql=pg_query($conn,$query);
              // header("Location:main.php");  
         } 
    
      ?>

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
                        <h5 class="card-title fo"><?php  echo $product['bname']."\t".$product['catgnm']."\t".$product['pnm']."\t".$product['ctnm']; ?> </h5>
                      <p class="card-text"><h9><?php  echo $product['fnm']."\t".$product['size']; ?></h9>
                      <br><h8> &#8377; <?php  echo $product['rate']; ?></h8></p>
                      <button class="button btn btn-primary" name="add_to_cart"> Add to Cart  </button>
                      <input type="hidden" name="pid" value=<?php echo $product['pid'];?> >
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


