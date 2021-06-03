<?php
include"../db_conn.php";
// echo $_POST['mobno'];

if(isset($_POST['fitting']) && isset($_POST['size'])){

function validate($data){
   $data=trim($data);
   $data=stripslashes($data);
   $data=htmlspecialchars($data);
   return $data;
}

$fitting=validate($_POST['fitting']);
$size=validate($_POST['size']);

if(empty($fitting)){
    echo"<script>
    alert('Fitting is required');
    window.location.href='admain.php';
    </script>";

}else if(empty($size)){
    echo"<script>
    alert('Size is required');
    window.location.href='admain.php';
    </script>";

}else if($size<26 || $size>44 ){
    echo"<script>
    alert('Size is invalid');
    window.location.href='admain.php';
    </script>";

}else {    
     $a="select fid from fitting";
     $ab=pg_query($conn,$a);
      $r=pg_num_rows($ab);
      $bid=101+$r;  
   

     $sql="insert into fitting(fid,fnm,size,tsale) values($bid,'$fitting',$size,0)";
     if(pg_query($conn,$sql)){
        echo"<script>
    alert('Fitting Added Successfully');
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
