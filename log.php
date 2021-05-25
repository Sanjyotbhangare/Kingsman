<?php
include"db_conn.php";


if(isset($_POST['mob']) && isset($_POST['pas'])){

function validate($data){
   $data=trim($data);
   $data=stripslashes($data);
   $data=htmlspecialchars($data);
   return $data; 
}

$mob=validate($_POST['mob']);
$pas=validate($_POST['pas']);

if(empty($mob)){
    header("Location: login.php?error=Mobile Number is required");
    exit();

}else if(empty($pas)){
    header("Location: login.php?error=Password is required");
    exit();

}else{

   $sql="select mobno,password from cust where mobno='$mob' and password='$pas' ";
   $result=pg_query($conn,$sql);
   $r=pg_fetch_array($result,$row=null);
   print_r($r);

   if($r==NULL){
    header("Location: login.php?error=Invalid Mobile Number or Password");
    exit();
   }else{
    header("Location: main.php");
    exit();
   }


}
    
}else{
    header("Location: login.php?error");
    exit();
}


?>