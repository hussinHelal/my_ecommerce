<?php

include ("connect.php");
$g = $_POST["gend"];
$p = $_POST["privil"];
$i = $_POST["id"];
$u = $_POST["user"];


$update = "UPDATE admins SET `name`='$u', `gender`='$g', `privilage`='$p' WHERE id='$i'";
$result = $conn -> query($update);




echo <<<v
    name: $u
    gender: $g
    privliage: $p
    id: $i
    v;