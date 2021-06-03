<?php
include"../db_conn.php";
// echo $_POST['mobno'];

if(isset($_POST['catg'])){

function validate($data){
   $data=trim($data);
   $data=stripslashes($data);
   $data=htmlspecialchars($data);
   return $data;
}

$catg=validate($_POST['catg']);

if(empty($catg)){
    echo"<script>
    alert('Category Name is required');
    window.location.href='admain.php';
    </script>";

}else  {
   $s="select * from category where catgnm='$catg'";
   $result=pg_query($conn,$s);
   $r=pg_fetch_array($result,$row=null);
   if($r <> NULL){
    echo"<script>
    alert('Category is already exist');
    window.location.href='admain.php';
    </script>";
   }
    
     $a="select catgid from category";
     $ab=pg_query($conn,$a);
      $r=pg_num_rows($ab);
      $bid=11+$r;  
   

     $sql="insert into category(catgid,catgnm,tsale) values($bid,'$catg',0)";
     if(pg_query($conn,$sql)){
        echo"<script>
    alert('Category Added Successfully');
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
