<?php
include"../db_conn.php";
// echo $_POST['mobno'];

if(isset($_POST['brand']) && isset($_POST['category']) && isset($_POST['ctype']) && isset($_POST['pattern']) && isset($_POST['fitting']) && isset($_POST['size']) && isset($_POST['rate']) && isset($_POST['stk']) ){

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
$rate=validate($_POST['rate']);
$stk=validate($_POST['stk']);


$file_name=$_FILES['img']['name'];
$file_type=$_FILES['img']['type'];
$file_size=$_FILES['img']['size'];
$file_temp_Loc=$_FILES['img']['tmp_name'];
$file_store="../images/".$file_name;

// if(move_uploaded_file($file_temp_Loc,$file_store){})

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
}else if(empty($rate)){
    echo"<script>
    alert('Rate is required');
    window.location.href='admain.php';
    </script>";
}else if(empty($stk)){
    echo"<script>
    alert('Stock is required');
    window.location.href='admain.php';
    </script>";
}
else{
   $s="select * from brand where bname='$brand'";
   $result=pg_query($conn,$s);
   $r=pg_num_rows($result);
   $product=pg_fetch_array($result);
   $bid=$product['bid'];
   if($r===0){
    echo"<script>
    alert('Brand is not exist');
    window.location.href='admain.php';
    </script>";
   }

   $s="select * from category where catgnm='$category'";
   $result=pg_query($conn,$s);
   $r=pg_num_rows($result);
   $product=pg_fetch_array($result);
   $catgid=$product['catgid'];
   if($r ===0){
    echo"<script>
    alert('Category is not exist');
    window.location.href='admain.php';
    </script>";
   }

   $s="select * from ctype where ctnm='$ctype'";
   $result=pg_query($conn,$s);
   $r=pg_num_rows($result);
   $product=pg_fetch_array($result);
   $ctyid=$product['ctyid'];
   if($r ===0){
    echo"<script>
    alert('Clothe type is not exist');
    window.location.href='admain.php';
    </script>";
   }

   $s="select * from pattern where pnm='$pattern'";
   $result=pg_query($conn,$s);
   $r=pg_num_rows($result);
   $product=pg_fetch_array($result);
   $ptid=$product['ptid'];
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

   $s="select * from fitting where fnm='$fitting' and size=$size";
   $result=pg_query($conn,$s);
   $r=pg_num_rows($result);
   $product=pg_fetch_array($result);
   $fid=$product['fid'];
   if($r ===0){
    echo"<script>
    alert('Size and fitting is not available');
    window.location.href='admain.php';
    </script>";
   }

   if($rate  <400){
    echo"<script>
    alert('Rate must be greater than 400');
    window.location.href='admain.php';
    </script>";
   }

   if($stk <1){
    echo"<script>
    alert('Stock should be not null');
    window.location.href='admain.php';
    </script>";
   }
    
    $a="select * from product";
    $b=pg_query($conn,$a);
    $pid=600+pg_num_rows($b);

    if(move_uploaded_file($file_temp_Loc,$file_store)){
         echo "Done";
        }
    
    $sql="insert into product(pid,bid,catgid,ctyid,ptid,fid,rate,cstk,minstk,maxstk,image) values($pid,$bid,$catgid,$ctyid,$ptid,$fid,$rate,$stk,6,$stk,'$file_name')";
    if(pg_query($conn,$sql)){
       echo"<script>
   alert('Product Added Successfully');
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
    alert('Invalid Operation');
    window.location.href='admain.php';
    </script>";
}


?>