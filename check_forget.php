<?php
include"db_conn.php";


if(isset($_POST['mob']) && isset($_POST['pas'])  && isset($_POST['cpas'])){

function validate($data){
   $data=trim($data);
   $data=stripslashes($data);
   $data=htmlspecialchars($data);
   return $data; 
}

$mob=validate($_POST['mob']);
$pas=validate($_POST['pas']);
$cpas=validate($_POST['cpas']);

if(empty($mob)){
    header("Location: forget.php?error=Mobile Number is required");
    exit();

}else if(empty($pas)){
    header("Location: forget.php?error=New Password is required");
    exit();

}else if(empty($cpas)){
    header("Location: forget.php?error=Confirm Password is required");
    exit();

}else if($pas <> $cpas){
    header("Location: forget.php?error=Password and Confirm Password Must Same");
    exit();
}else{
   $m=(int)$mob;
   $s="select * from cust where mobno=$m";
   $result=pg_query($conn,$s);
   $r=pg_fetch_array($result,$row=null);
   if($r == NULL){
    header("Location: forget.php?error=Mobile Number is not exist");
    exit();
   }
   if(strlen($pas) < 6){
    header("Location: forget.php?error=New Password is too small");
    exit(); 
   }
   if(strlen($pas) > 16){
    header("Location: forget.php?error=New Password is too large");
    exit(); 
   }
    
    //  $sql="insert into cust(mobno,cname,password) values($m,'$name','$pas')";
     $sql="update cust set password='$pas' where mobno='$m' ";
     if(pg_query($conn,$sql)){
        echo"<script>
        alert('Password Changed');
        window.location.href='login.php';
        </script>";        
     }else{
        header("Location: forget.php?error=Invalid ID");
        exit();
     }
//    $r=pg_fetch_array(boolval($result),$row=null);
//    if($r==FALSE){
//     header("Location: registration.php?error=Invalid ID Number or Password");
//     exit();
//    }else{
//        echo "Hello";
//    }

}
}else{
    header("Location: registration.php?error");
    exit();
}


?>