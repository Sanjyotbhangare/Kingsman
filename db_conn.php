<?php
$host="localhost";
$user="postgres";
$pass="sanjyot";
$db="menswear";

$conn=pg_connect("host=$host dbname=$db user=$user password=$pass");
if(!$conn){
    echo " Connection Failed ";
    exit();
}

?>