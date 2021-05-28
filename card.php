<?php
include("db_conn.php");


if(isset($_GET['brand']) && isset($_GET['category']) && isset($_GET['ctype']) && isset($_GET['pattern']) && isset($_GET['fitting']) && isset($_GET['size'])){

echo $b.$c.$d.$e.$f.$g;
function validate($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data; 
 }
$a=validate($_GET['brand']);
$b=validate($_GET['category']);
$c=validate($_GET['ctype']);
$d=validate($_GET['pattern']);
$e=validate($_GET['fitting']);
$f=validate($_GET['size']);

if(empty($a)){
   $query="select pid,bname,catgnm,ctnm,pnm,fnm,size,rate,cstk,image from vproduct 
   where bname='s' or bname='' or bname and catgnm='$b' and ctnm='$c' and pnm='$d'";
}if(empty($b)){
    $a="select catgnm from category"; 
 }else if(empty($c)){
    $a="select ctnm from ctype"; 
 }else if(empty($d)){
    $a="select pnm from pattern"; 
 }else if(empty($e)){
    $a="select fitting from fitting"; 
 }else if(empty($f)){
    $a="select size from fitting"; 
 }

 $query="select pid,bname,catgnm,ctnm,pnm,fnm,size,rate,cstk,image from vproduct 
 where bname='$a' and catgnm='$b' and ctnm='$c' and pnm='$d'";
 $sql=pg_query($conn,$query);




}else{
    $query="select pid,bname,catgnm,ctnm,pnm,fnm,size,rate,cstk,image from vproduct order by pid";
    $sql=pg_query($conn,$query);
}
?>