<?php
include"db_conn.php";
// echo $_POST['mobno'];

if(isset($_POST['mob']) && isset($_POST['name']) && isset($_POST['pas']) && isset($_POST['cpas'])){

function validate($data){
   $data=trim($data);
   $data=stripslashes($data);
   $data=htmlspecialchars($data);
   return $data;
}

$mobno=validate($_POST['mob']);
$name=validate($_POST['name']);
$pas=validate($_POST['pas']);
$cpas=validate($_POST['cpas']);

if(empty($mobno)){
    header("Location: registration.php?error=Mobile Number is required");
    exit();

}else if(empty($name)){
    header("Location: registration.php?error=Name is required");
    exit();

}else if(empty($pas)){
    header("Location: registration.php?error=Password is required");
    exit();

}else if(empty($cpas)){
    header("Location: registration.php?error=Confirm Password is required");
    exit();

}else if($pas <> $cpas){
    header("Location: registration.php?error=Password and Confirm Password Must Same");
    exit();
}else{
   $m=(int)$mobno;
   $s="select * from cust where mobno=$m";
   $result=pg_query($conn,$s);
   $r=pg_fetch_array($result,$row=null);
   if($r <> NULL){
    header("Location: registration.php?error=Mobile Number is already exist");
    exit();
   }
   if(strlen($m) <> 10){
    header("Location: registration.php?error=Mobile Number is Invalid");
    exit(); 
   }
   if(strlen($name) > 51){
    header("Location: registration.php?error=Name is too long");
    exit(); 
   }
   if(strlen($pas) < 6){
    header("Location: registration.php?error=Password is too small");
    exit(); 
   }
   if(strlen($pas) > 16){
    header("Location: registration.php?error=Password is too large");
    exit(); 
   }
    
     $sql="insert into cust(mobno,cname,password) values($m,'$name','$pas')";
     if(pg_query($conn,$sql)){
         echo "Hello";        
     }else{
        header("Location: registration.php?error=Invalid ID");
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