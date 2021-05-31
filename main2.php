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
<!-- <style>
        body{
            background-color: black;
        }

    </style> -->
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

    <form action="new.php" method="GET">
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
  <button type="submit" class="bu" id="btn">Apply</button>
</form>
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


    </div>
   <script>
     function reload(){
       document.getElementById('iframe_a').src += '';
     }
     btn.onclick = reload;

   </script>


    <iframe class="main" height="85%" width="85.01%" src=new.php name="iframe_a"></iframe>
  </div>
</body>
</html>