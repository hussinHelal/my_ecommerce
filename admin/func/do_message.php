<?php

include("connect.php");

$p = $_POST["el"];

$update = "UPDATE complains SET status='1' WHERE id='$p'";
$conn -> query($update);


echo 1;