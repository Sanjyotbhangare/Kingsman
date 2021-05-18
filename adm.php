<?php
include"db_conn.php";

if(isset($_POST['id']) && isset($_POST['pas'])){

function validate($data){
   $data=trim($data);
   $data=stripslashes($data);
   $data=htmlspecialchars($data);
   return $data; 
}

$id=validate($_POST['id']);
$pas=validate($_POST['pas']);

if(empty($id)){
    header("Location: admin.php?error=ID Number is required");
    exit();

}else if(empty($pas)){
    header("Location: admin.php?error=Password is required");
    exit();

}else{

   $sql="select id,password from admin where id='$id' and password='$pas' ";
   $result=pg_query($conn,$sql);
    $r=pg_fetch_array($result,$row=null);
    print_r($r);

   if($r==null){
    header("Location: admin.php?error=Invalid ID Number or Password");
    exit();
   }else{
       echo "Hello";
   }


}
    
}else{
    header("Location: admin.php?error=Failed");
    exit();
}


?>