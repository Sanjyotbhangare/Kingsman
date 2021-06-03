<?php
include"../db_conn.php";
// echo $_POST['mobno'];

if(isset($_POST['mob']) && isset($_POST['name']) && isset($_POST['pas']) ){

function validate($data){
   $data=trim($data);
   $data=stripslashes($data);
   $data=htmlspecialchars($data);
   return $data;
}

$mobno=validate($_POST['mob']);
$name=validate($_POST['name']);
$pas=validate($_POST['pas']);

if(empty($mobno)){
    echo"<script>
    alert('Mobile number is required');
    window.location.href='admain.php';
    </script>";

}else if(empty($name)){
    echo"<script>
    alert('Name is required');
    window.location.href='admain.php';
    </script>";

}else if(empty($pas)){
    echo"<script>
    alert('Password is required');
    window.location.href='admain.php';
    </script>";

}else{
   $m=(int)$mobno;
   $s="select * from cust where mobno=$m";
   $result=pg_query($conn,$s);
   $r=pg_fetch_array($result,$row=null);
   if($r === NULL){
    echo"<script>
    alert('Mobile number is not exist');
    window.location.href='admain.php';
    </script>";
   }
   
   
   $sql="delete from cust where mobno=$m";
     if(pg_query($conn,$sql)){
        echo"<script>
    alert('Deleted successfully');
    window.location.href='admain.php';
    </script>";       
     }else{
        echo"<script>
    alert('invalid Details');
    window.location.href='admain.php';
    </script>";
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
    echo"<script>
    alert('invalid deletion');
    window.location.href='admain.php';
    </script>";
}


?>