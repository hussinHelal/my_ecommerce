<?php

include("connect.php");

$name = $_POST["name"];
$privilage = $_POST["privilage"];
$gender = $_POST["gender"];

$insert = "INSERT INTO admins ( name, gender, privilage) VALUES ('$name','$gender','$privilage')";
$conn->query("$insert");

// echo "inserted";
$last = $conn-> insert_id;
echo $last;

$priv_select = "SELECT * FROM privilages WHERE id='$privilage' ";
$priv_result = $conn -> query($priv_select);
$priv_row=$priv_result->fetch_assoc();
$priv = $priv_row["name"];

$gend_select = "SELECT * FROM gender WHERE id='$gender' ";
$gend_result = $conn -> query($gend_select);
$gend_row = $gend_result->fetch_assoc();
$gend = $gend_row["name"];

echo <<<c
     <tr>
     <td> $last </td>
     <td> $name </td>
     <td> $gend </td>
     <td> $priv </td>
     <td class="text-center">  <button type="button" class="btn btn-warning" style="border:none; border-radius: 20px;" data-bs-toggle="modal" > edit </button> 
       <button type="button" class="btn btn-danger" style="border:none; border-radius: 20px;" data-bs-toggle="modal" > delete </button> </td>
     </tr>
     c;
// header("location:../admins.php");