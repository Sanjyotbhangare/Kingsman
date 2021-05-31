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
include("db_conn.php");
//  include("card.php");


// if(isset($_GET['brand']) && isset($_GET['category']) && isset($_GET['ctype']) && isset($_GET['pattern']) && isset($_GET['fitting']) && isset($_GET['size'])){

// function validate($data){
//     $data=trim($data);
//     $data=stripslashes($data);
//     $data=htmlspecialchars($data);
//     return $data; 
//  }

// $a=isset($_GET['brand']);
// $b=isset($_GET['category']);
// $c=isset($_GET['ctype']);
// $d=isset($_GET['pattern']);
// $e=isset($_GET['fitting']);
// $f=isset($_GET['size']);


// if(empty(validate($a))){
//   $qb="select bname from brand";
//   $sqb=pg_query($conn,$qb);
//   $sq=pg_fetch_array($sqb);
//   $ar=implode(",", $sq);
// }else{
//   $ar=$a; 
// }

// if(empty(validate($b))){
//    $qc="select catgnm from category";
//    $sqc=pg_query($conn,$qc);
//    $sq1=pg_fetch_array($sqc);
//    $ar1=implode(",", $sq1);
//  }else{
//    $ar1=$b; 
//  }

//  if(empty(validate($c))){
//    $qd="select ctnm from ctype";
//    $sqd=pg_query($conn,$qd);
//    $sq2=pg_fetch_array($sqd);
//    $ar2=implode(",", $sq2);
//  }else{
//    $ar2=$c; 
//  }

//  if(empty(validate($d))){
//    $qe="select pnm from pattern";
//    $sqe=pg_query($conn,$qe);
//    $sq3=pg_fetch_array($sqe);
//    $ar3=implode(",", $sq3);
//  }else{
//    $ar3=$d; 
//  }

//  if(empty(validate($e))){
//    $qf="select distinct fnm from fitting";
//    $sqf=pg_query($conn,$qf);
//    $sq4=pg_fetch_array($sqf
// );
//    $ar4=implode(",", $sq4);
//  }else{
//    $ar4=$e; 
//  }

//  if(empty(validate($f))){
//    $qg="select distinct size from fitting";
//    $sqg=pg_query($conn,$qg);
//    $sq5=pg_fetch_array($sqg);
//    $ar5=implode(",", $sq5);
//  }else{
//    $ar5=$f; 
//  }



// // if(!empty($a) || !empty($b) || !empty($c) || !empty($d) || !empty($e) || !empty($f)){
//   $query="select pid,bname,catgnm,ctnm,pnm,fnm,size,rate,cstk,image from vproduct 
//   where bname in('$ar') and catgnm in('$ar1') and ctnm in('$ar2') and pnm in('$ar3') and fnm in('$ar4') and size in($ar5)";
//  $sql=pg_query($conn,$query);
//  header("Location :main.php");
// }else

      //  $query="select pid,bname,catgnm,ctnm,pnm,fnm,size,rate,cstk,image from vproduct order by pid";
      //  $sql=pg_query($conn,$query);
      //  header("Location :main.php");
   
   
   
   
   
   
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
               <form>
               <div class='card mb-4 mt-5 col-12 mx-auto' >
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
      }else{
        echo "No Product Found ";
      }
    
?>
 </div>
    </div>
   </div>
</div>
</div>
</body>
</html>
<?php echo header("Location: main.php");
exit(); ?>
