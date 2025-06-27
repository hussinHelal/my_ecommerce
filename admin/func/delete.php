<?php

include("connect.php");

    $id=$_POST["id"];
    $delete="DELETE FROM products where id='$id' ";
    $conn->query($delete);
    // header("location:../products.php");
