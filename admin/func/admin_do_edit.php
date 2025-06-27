<?php

// error_reporting(0); // Turn off error reporting
// ini_set('display_errors', 0);
include("connect.php");
// $id=$_GET["id"];
$id=$_POST["id"];
$name=$_POST["user"];
$gender=$_POST["gend"];
$privilage=$_POST["privil"];

$update="UPDATE `admins` SET  `name`='$name',`gender`='$gender',`privilage`='$privilage' WHERE `id`='$id'";
$conn->query("$update");

$gend_id=$gender;
$gend_sel="SELECT * FROM gender WHERE id='$gend_id'";
$gend_res=$conn->query($gend_sel);
$gend_row=$gend_res->fetch_assoc();

$priv_id=$privilage;
$priv_sel="SELECT * FROM privilages WHERE id='$priv_id'";
$priv_res=$conn->query($priv_sel);
$priv_row=$priv_res->fetch_assoc();

// foreach($_POST as $key => $value){
// echo <<<a
     
//         $key -> $value
     
//      a;
// }
// header('Content-Type: application/json');

$gend_name = $gend_row["name"];
$priv_name = $priv_row["name"];
$res = array($gend_name,$priv_name);

print_r($res);
// echo $priv_name;
// header("location: ../admins.php"); 