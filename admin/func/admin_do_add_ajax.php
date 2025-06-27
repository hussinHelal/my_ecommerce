<?php

include("connect.php");
$g = $_POST["gend"];
$p = $_POST["privil"];
// $i = $_POST["id"];
$u = $_POST["user"];

if($_POST){

$insert = "INSERT INTO admins( name, gender, privilage) VALUES ('$u','$g','$p')";
$conn -> query($insert);

}

echo <<<c
        <pre>
        name: $u
        gender: $g
        privliage: $p
        </pre>
        c;