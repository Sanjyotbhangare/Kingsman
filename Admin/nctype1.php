<?php
include"../db_conn.php";
// echo $_POST['mobno'];

if(isset($_POST['ctype'])){

function validate($data){
   $data=trim($data);
   $data=stripslashes($data);
   $data=htmlspecialchars($data);
   return $data;
}

$ctype=validate($_POST['ctype']);

if(empty($ctype)){
    echo"<script>
    alert('Clothe Name is required');
    window.location.href='admain.php';
    </script>";

}else  {
   $s="select * from ctype where ctnm='$ctype'";
   $result=pg_query($conn,$s);
   $r=pg_fetch_array($result,$row=null);
   if($r <> NULL){
    echo"<script>
    alert('Clothe type is already exist');
    window.location.href='admain.php';
    </script>";
   }
    
     $a="select ctyid from ctype";
     $ab=pg_query($conn,$a);
      $r=pg_num_rows($ab);
      $bid=21+$r;  
   

     $sql="insert into ctype(ctyid,ctnm,tsale) values($bid,'$ctype',0)";
     if(pg_query($conn,$sql)){
        echo"<script>
    alert('Clothe type Added Successfully');
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
