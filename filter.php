<?php
include("db_conn.php");

$qbrand="select bname from brand order by bid";
$brand=pg_query($conn,$qbrand);

$qcategory="select catgnm from category order by catgid";
$category=pg_query($conn,$qcategory);

$qctype="select ctnm from ctype order by ctid";
$ctype=pg_query($conn,$qctype);

$qpattern="select pnm from pattern order by ptid";
$pattern=pg_query($conn,$qpattern);

$qfitting="select distinct fnm from fitting";
$fitting=pg_query($conn,$qfitting);

$qsize="select distinct size from fitting order by size";
$size=pg_query($conn,$qsize);





?>