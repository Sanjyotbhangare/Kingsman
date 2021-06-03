<?php
include"../db_conn.php";
// echo $_POST['mobno'];

if(isset($_POST['brand']) && isset($_POST['category']) && isset($_POST['ctype']) && isset($_POST['pattern']) && isset($_POST['fitting']) && isset($_POST['size'])){

function validate($data){
   $data=trim($data);
   $data=stripslashes($data);
   $data=htmlspecialchars($data);
   return $data;
}

$brand=validate($_POST['brand']);
$category=validate($_POST['category']);
$ctype=validate($_POST['ctype']);
$pattern=validate($_POST['pattern']);
$fitting=validate($_POST['fitting']);
$size=validate($_POST['size']);

if(empty($brand)){
    echo"<script>
    alert('Brand is required');
    window.location.href='admain.php';
    </script>";

}else if(empty($category)){
    echo"<script>
    alert('Category is required');
    window.location.href='admain.php';
    </script>";

}else if(empty($ctype)){
    echo"<script>
    alert('Clothe type is required');
    window.location.href='admain.php';
    </script>";

}else if(empty($pattern)){
    echo"<script>
    alert('Pattern is required');
    window.location.href='admain.php';
    </script>";

}else if(empty($fitting)){
    echo"<script>
    alert('Fitting is required');
    window.location.href='admain.php';
    </script>";
}else if(empty($size)){
    echo"<script>
    alert('Size is required');
    window.location.href='admain.php';
    </script>";
}
else{
   $s="select * from brand where bname='$brand'";
   $result=pg_query($conn,$s);
   $r=pg_num_rows($result);
   if($r===0){
    echo"<script>
    alert('Brand is not exist');
    window.location.href='admain.php';
    </script>";
   }

   $s="select * from category where catgnm='$category'";
   $result=pg_query($conn,$s);
   $r=pg_num_rows($result);
   if($r ===0){
    echo"<script>
    alert('Category is not exist');
    window.location.href='admain.php';
    </script>";
   }

   $s="select * from ctype where ctnm='$ctype'";
   $result=pg_query($conn,$s);
   $r=pg_num_rows($result);
   if($r ===0){
    echo"<script>
    alert('Clothe type is not exist');
    window.location.href='admain.php';
    </script>";
   }

   $s="select * from pattern where pnm='$pattern'";
   $result=pg_query($conn,$s);
   $r=pg_num_rows($result);
   if($r ===0){
    echo"<script>
    alert('Pattern is not exist');
    window.location.href='admain.php';
    </script>";
   }

   $s="select * from fitting where fnm='$fitting'";
   $result=pg_query($conn,$s);
   $r=pg_num_rows($result);
   if($r === 0){
    echo"<script>
    alert('Fitting is not exist');
    window.location.href='admain.php';
    </script>";
   }

   $s="select * from fitting where size='$size'";
   $result=pg_query($conn,$s);
   $r=pg_num_rows($result);
   if($r ===0){
    echo"<script>
    alert('Size is not exist');
    window.location.href='admain.php';
    </script>";
   }
    
    $q="select * from vproduct where bname='$brand' and catgnm='$category' and ctnm='$ctype' and pnm='$pattern' and fnm='$fitting' and size='$size'";
    $r=pg_query($conn,$q);
    $num=pg_num_rows($r);
    if($num>0){
        while($product=pg_fetch_array($r)){
         $d=$product['pid'];
         $sql="delete from product where pid=$d";
         $rt=pg_query($conn,$sql);
        } 
        echo"<script>
        alert('Deleted Successfully');
        window.location.href='admain.php';
        </script>";     
     }else{
        echo"<script>
    alert('Invalid Operation');
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
    alert('Invalid Operation');
    window.location.href='admain.php';
    </script>";
}


?>