<?php
$host="localhost";
$user="postgres";
$pass="jay123";
$db="icecream";

$conn=pg_connect("host=$host dbname=$db user=$user password=$pass");
if(!$conn){
    echo " Connection Failed ";
    exit();
}

?>