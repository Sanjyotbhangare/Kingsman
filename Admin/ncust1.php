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

}else if(empty($cpas)){
    echo"<script>
    alert('Confirm Password is required');
    window.location.href='admain.php';
    </script>";

}else if($pas <> $cpas){
    echo"<script>
    alert('Password and Confirm Password must be same');
    window.location.href='admain.php';
    </script>";
}else{
   $m=(int)$mobno;
   $s="select * from cust where mobno=$m";
   $result=pg_query($conn,$s);
   $r=pg_fetch_array($result,$row=null);
   if($r <> NULL){
    echo"<script>
    alert('Mobile number is already exist');
    window.location.href='admain.php';
    </script>";
   }
   if(strlen($m) <> 10){
    echo"<script>
    alert('Mobile number is invalid');
    window.location.href='admain.php';
    </script>"; 
   }
   if(strlen($name) > 51){
    echo"<script>
    alert('Name is too long');
    window.location.href='admain.php';
    </script>"; 
   }
   if(strlen($pas) < 6){
    echo"<script>
    alert('Password is too short');
    window.location.href='admain.php';
    </script>";
   }
   if(strlen($pas) > 16){
    echo"<script>
    alert('password is too long');
    window.location.href='admain.php';
    </script>";
     
   }
    
     $sql="insert into cust(mobno,cname,password) values($m,'$name','$pas')";
     if(pg_query($conn,$sql)){
        echo"<script>
    alert('Customer registered successfully');
    window.location.href='admain.php';
    </script>";       
     }else{
        echo"<script>
    alert('invalid registration');
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
    alert('invalid registration');
    window.location.href='admain.php';
    </script>";
}


?>