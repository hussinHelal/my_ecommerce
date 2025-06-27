<?php

include("../admin/func/connect.php");




if (!empty($_POST["username"]) && !empty($_POST["mail"]) && !empty($_POST["phone"]) && !empty($_POST["msg"])) {
$name = $_POST["username"];
$email = $_POST["mail"];
$phone = $_POST["phone"];
$message = $_POST["msg"];


$insert="INSERT INTO `complains`(name, email, phone, message) VALUES ('$name','$email','$phone','$message')";
$result=$conn->query($insert);

echo <<<v
<p class="alert alert-success"> Message Has Been Sent </p>
v;
} else {
     echo <<<c
     <p class="alert alert-danger"> Something Went Wrong </p>
     c;

}

     