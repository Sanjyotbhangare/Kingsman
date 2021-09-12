<?php
include("db_conn.php");

$qflavour="select fname from flavour order by fid";
$flavour=pg_query($conn,$qflavour);

$qproduct="select distinct ptype from product";
$prod=pg_query($conn,$qproduct);

$qsize="select distinct size from product";
$size=pg_query($conn,$qsize);

?>