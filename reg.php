<?php
include"db_conn.php";
// echo $_POST['mobno'];

if(isset($_POST['mobno']) && isset($_POST['name']) && isset($_POST['pas']) && isset($_POST['cpas'])){

function validate($data){
   $data=trim($data);
   $data=stripslashes($data);
   $data=htmlspecialchars($data);
   return $data;
}

$mobno=validate($_POST['mobno']);
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

}else if($pos!=$cpos){
    header("Location: registration.php?error=Password and Confirm Password Must Same");
    exit();
}else{

   $sql="insert into cust(mobno,cname,password) values($mob,$name,$pos)";
   $result=pg_query($conn,$sql);
   $r=pg_fetch_array($result,$row=null);
   print_r($r);

   if($r==NULL){
    header("Location: registration.php?error=Invalid ID Number or Password");
    exit();
   }else{
       echo "Hello";
   }


}
    
}else{
    header("Location: registration.php?error");
    exit();
}


?>