<?php 
session_start();
include("db_conn.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{
  if(isset($_POST['pay']))
  {
    $ono=1000;
     $a="select ono from porder";
     $ab=pg_query($conn,$a);
      $r=pg_num_rows($ab);
      $ono=$ono+$r;
//    while($r <> NULL){
//     $ono=$ono+1 ;
//     $a="select ono from ord";
//     $ab=pg_query($conn,$a);
//     $r=pg_fetch_array($ab,$row=null);
//    }

   $odate=date('d.m.y');
  
   
  //  if(isset($_POST['address'])){
  //      $add=$_POST['address'];
  //  }
  //  $order="insert into porder(ono,odate,address) values($ono,'$odate','$add')";
  //  if(pg_query($conn,$order)){
  //   foreach($_SESSION['cart'] as $key => $value)
  //   {
  //       $pid=$value['fpid'];
  //       $qty=$value['Quantity'];
  //       $a="select rate from vproduct where fpid=$fpid";
  //       $ab=pg_query($conn,$a);
  //       $product=pg_fetch_array($ab);
  //       $rate=$product['rate'];
  //       $tot=$qty*$rate;
  //       $q="insert into orderd(ono,fpid,rate,qty,tcost) values($ono,$fpid,$rate,$qty,$tot)";
  //       $s=pg_query($conn,$q);
  //   }    
     
  //  }
   
   echo "<script>
      alert('Successfully Order is Placed');
      window.location.href='face.php';
      </script>";
  session_unset();
  session_destroy();
 
  }
}
?>