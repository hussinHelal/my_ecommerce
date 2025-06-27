<?php 

 include("connect.php");
 $id=$_POST["id"];
 $delete="DELETE FROM admins WHERE id='$id'";
 $conn -> query($delete);

 