<?php

include("func/connect.php");

$id=$_GET["id"];
$sel = "SELECT * FROM admins WHERE id='$id'";
$result = mysqli_query($conn, $sel);
$row = $result->fetch_assoc();
$ad_priv = $row["privilage"]; 
$ad_gen = $row["gender"]; 
?>

<form action="func/admin_do_edit.php?id=<?=$id?>" method="POST" class="col-lg-9">

    <label for="name">name</label>
    <input type="text" name="name" class="form-control" value="<?=$row["name"]?>"><br>
    <label for="privilage">privilage</label>
    <select name="privilage" class="form-control">
        <?php
             $priv_select = "SELECT * FROM privilages ";
             $priv_result = $conn -> query($priv_select);
             while($priv_row=$priv_result->fetch_assoc()){
                ?>
                <option value="<?=$priv_row["id"]?>"><?=$priv_row["name"]?></option>
                <?php
             }
        ?> </select><br>
     <label for="gender">gender</label>
     <select name="gender" class="form-control">
        <?php
              $gen_select="SELECT * FROM gender ";
              $gen_result=$conn->query($gen_select);

              while($gen_row=$gen_result->fetch_assoc()){
                ?>
                <option value="<?=$gen_row["id"]?>"><?=$gen_row["name"]?></option>
                <?php
              }
              ?>
     </select><br><br>
     <input type="submit" value="edit" class="form-control btn-success">
</form>
<br><br>