<?php 
session_start();
include("db_conn.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{
  if(isset($_POST['pay']))
  {
    $ono=1020;
     $a="select ono from ord";
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
   $mob=$_SESSION['mobno'];
   
   if(isset($_POST['address'])){
       $add=$_POST['address'];
   }
   
   $order="insert into ord(ono,odate,mobno,address,tcost) values($ono,'$odate',$mob,'$add',0)";
   if(pg_query($conn,$order)){
    foreach($_SESSION['cart'] as $key => $value)
    {
        $pid=$value['pid'];
        $qty=$value['Quantity'];
        $a="select rate from product where pid=$pid";
        $ab=pg_query($conn,$a);
        $product=pg_fetch_array($ab);
        $rate=$product['rate'];

        $q="insert into orddetails(ono,pid,qty,rate) values($ono,$pid,$qty,$rate)";
        $s=pg_query($conn,$q);
    }    
     
   }
   
   echo "<script>
      alert('Successfully Order is Placed');
      window.location.href='face.php';
      </script>";
  session_unset();
  session_destroy();
 
  }
}
?>