<?php
include"../db_conn.php";
// echo $_POST['mobno'];

if(isset($_POST['brand']) && isset($_POST['estyear'])){

function validate($data){
   $data=trim($data);
   $data=stripslashes($data);
   $data=htmlspecialchars($data);
   return $data;
}

$brand=validate($_POST['brand']);
$year=validate($_POST['estyear']);

if(empty($brand)){
    echo"<script>
    alert('Brand Name is required');
    window.location.href='admain.php';
    </script>";

}else if(empty($year)){
    echo"<script>
    alert('Establishment Year is required');
    window.location.href='admain.php';
    </script>";

}else if(strlen($year)<>4){
    echo"<script>
    alert('Establishment Year is invalid');
    window.location.href='admain.php';
    </script>";

}else {
   $s="select * from brand where bname='$brand'";
   $result=pg_query($conn,$s);
   $r=pg_fetch_array($result,$row=null);
   if($r <> NULL){
    echo"<script>
    alert('Brand is already exist');
    window.location.href='admain.php';
    </script>";
   }
    
     $a="select bid from brand";
     $ab=pg_query($conn,$a);
      $r=pg_num_rows($ab);
      $bid=1+$r;  
   

     $sql="insert into brand(bid,bname,estyear,tsale) values($bid,'$brand',$year,0)";
     if(pg_query($conn,$sql)){
        echo"<script>
    alert('Brand Added Successfully');
    window.location.href='admain.php';
    </script>";       
     }else{
        echo"<script>
    alert('Invalid inserted details');

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
    window.location.href='admain.php';
    </script>";
}


?>
