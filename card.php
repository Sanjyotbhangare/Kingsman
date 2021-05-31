<?php
include("db_conn.php");

if(isset($_GET['brand']) && isset($_GET['category']) && isset($_GET['ctype']) && isset($_GET['pattern']) && isset($_GET['fitting']) && isset($_GET['size'])){ 
  if(isset($_GET['brand'])){
    $aa=$_GET['brand'];
    $a="select bname from brand where bname='$aa'";
   }else{
    $a='select bname from brand';
  }
  
  if(isset($_GET['category'])){
    $bb=$_GET['category'];
    $b="select catgnm from category where catgnm='$bb'";
  }else{
    $b='select catgnm from category';
  }
  if(isset($_GET['ctype'])){
    $cc=$_GET['ctype'];
    $c="select ctnm from ctype where ctnm='$cc'";
  }else{
    $c='select ctnm from ctype';
  }
  if(isset($_GET['pattern'])){
    $dd=$_GET['pattern'];
    $d='select pnm from pattern where pnm="$dd"';
  }else{
    $d='select pnm from pattern';
  }
  if(isset($_GET['fitting'])){
    $ee=$_GET['fitting'];
    $e="select fnm from fitting where fnm='$ee'";
  }else{
    $e='select fnm from fitting';
  }
  if(isset($_GET['size'])){
    $ff=$_GET['size'];
    $f="select size from fitting where size=$ff";
  }else{
    $f='select size from fitting';
  }
//  echo "$a '<br>'";
//  echo "$b.$c'<br>'";
//  echo "$d.$e.'<br>'.$f";

   $query="select pid,bname,catgnm,ctnm,pnm,fnm,size,rate,cstk,image from vproduct 
   where bname in ($a) and catgnm in ($b) and ctnm in ($c) and pnm in ($d) and fnm in ($e) and size in ($f)";       
   $sql=pg_query($conn,$query);
  //  header("Location:main.php");
   }
  else{
    $query="select pid,bname,catgnm,ctnm,pnm,fnm,size,rate,cstk,image from vproduct order by pid";
       $sql=pg_query($conn,$query);
      //  header("Location: main.php");
  } 

?>