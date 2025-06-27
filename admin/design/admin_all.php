<?php

 $select = "SELECT * FROM admins";
 $result = $conn -> query($select);

 $id = $_SESSION["admin"]["id"];
 $priv_select1 = "SELECT * FROM permissions where id=$id";
 $priv_query1 = mysqli_query($conn, $priv_select1);
 $priv_row1 = mysqli_fetch_assoc($priv_query1);
 
 ?>

<table class="table table-hover table-striped table-bordered col-lg-9">
    <thead class="table-dark text-light">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>gender</th>
            <th>privilages</th>
            <th>Controls</th>
        </tr>
    </thead>
    <tbody>
        <?php
                while($row=$result->fetch_assoc())
                {
                    $id_gen=$row["gender"];
                    $gen_select="SELECT * FROM gender WHERE id='$id_gen'";
                    $gen_result=$conn-> query($gen_select);
                    $gen_row = $gen_result->fetch_assoc();
                    
                    $id_priv=$row["privilage"];
                    $priv_select="SELECT * FROM privilages WHERE id='$id_priv'";
                    $priv_result=$conn-> query($priv_select);
                    $priv_row = $priv_result->fetch_assoc()
                    
                    ?>

                    <tr class="tr_<?=$row["id"]?>">
                        
                    <td id="id_td_<?= $row["id"] ?>"> <?= $row["id"] ?> </td>
                    <td id="name_td_<?= $row["id"] ?>"><?= $row["name"] ?> </td>
                    <td id="gend_td_<?= $row["id"] ?>">
                    <?php 
                     echo $gen_row["name"];
                     
                    ?> </td>

                    <td id="priv_td_<?= $row["id"] ?>">
                    <?php 

                    echo $priv_row["name"];
                    
                     ?> </td> 


            <td class="text-center">
             <!-- <a href="?admin=edit_admin&id=<?=$row["id"]?>">--> <?php  
               if($priv_row1["id"] == '1'){
                // echo '<button class="btn btn-warning">Edit</button>';
                ?>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning" style="border:none; border-radius: 20px;" data-bs-toggle="modal" data-bs-target="#<?=$row["id"]?>">
                        edit
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="<?=$row["id"]?>" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editmodal">edit</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                
                            <form>

                            <label for="name">name</label>
                            <input type="text" name="name" id="name1_<?=$row["id"]?>" class="form-control" value="<?=$row["name"]?>"><br>
                            <label for="privilage">privilage</label>
                            <select name="privilage" class="form-control" id="priv1_<?=$row["id"]?>">
                                <?php
                                    $priv_select3 = "SELECT * FROM privilages";
                                    $priv_result3 = $conn -> query($priv_select3);
                                    while($priv_row3=$priv_result3->fetch_assoc()){
                                        ?>
                                        <option value="<?=$priv_row3["id"]?>" <?php if($priv_row["id"] == $priv_row3["id"]){echo "selected";}  ?> ><?=$priv_row3["name"]?></option>
                                    <?php
                                    }
                                ?> </select><br>
                            <label for="gender">gender</label>
                            <select name="gender" class="form-control" id="gend1_<?=$row["id"]?>">
                                <?php
                                    $gen_select3="SELECT * FROM gender";
                                    $gen_result3=$conn->query($gen_select3);

                                    while($gen_row3=$gen_result3->fetch_assoc()){
                                        ?>
                                        <option value="<?=$gen_row3["id"]?>" <?php if($gen_row["id"] == $gen_row3["id"]){echo "selected";}  ?> ><?=$gen_row3["name"]?></option>
                                        <?php
                                    }
                                    ?>
                            </select><br><br>
                            <input type="text" value="<?=$row["id"]?>" id="i_<?=$row["id"]?>" style="display:none">
                            <input type="submit" value="edit" style="border:none; border-radius: 20px;" class="form-control btn-success editbtn1">
                            <!-- <button type="submit"  style="border:none; border-radius: 20px;" class="form-control btn-success " id="editbtn1">edit</button> -->
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger editclose" style="border:none; border-radius: 20px;" id="close" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>


                <?php
               }
             ?>
             <!-- </a> -->
             <!-- <a href="func/admin_delete.php?id=<?=$row["id"]?>"> -->
             <?php 
               if($priv_row1["id"] == '1'){
                ?>
                <button class="btn btn-danger deletebtn" data-id="<?=$row["id"]?>" style="border:none; border-radius: 20px;">Delete</button>
                
              <?php
               }
               ?>
            <!-- </a> -->
            <?php
                }
                ?>
                </td>
                </tr> 
    </tbody>
</table>

<div class="text-center">
    <!-- < href="?admin=add_admin"> -->
    <?php 
               if($priv_row1["id"] == '1'){
                // echo '<button class="btn btn-success">Add</button>';
                ?>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success" style="border:none; border-radius: 20px;" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                    add
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                        <form>

                                    <label for="name">name</label>
                                    <input type="text" name="name" id="name" class="form-control" ><br>
                                    <label for="privilage">privilage</label>
                                    <select name="privilage" class="form-control" id="priv">
                                        <?php
                                            $priv_select4 = "SELECT * FROM privilages ";
                                            $priv_result4 = $conn -> query($priv_select4);
                                            while($priv_row4=$priv_result4->fetch_assoc()){
                                                ?>
                                                <option value="<?=$priv_row4["id"]?>"><?=$priv_row4["name"]?></option>
                                            <?php
                                            }
                                        ?> </select><br>
                                    <label for="gender">gender</label>
                                    <select name="gender" class="form-control" id="gend">
                                        <?php
                                            $gen_select4="SELECT * FROM gender ";
                                            $gen_result4=$conn->query($gen_select4);

                                            while($gen_row4=$gen_result4->fetch_assoc()){
                                                ?>
                                                <option value="<?=$gen_row4["id"]?>"><?=$gen_row4["name"]?></option>
                                            <?php
                                            }
                                            ?>
                                    </select><br><br>
                                    <input type="submit" value="add" style="border:none; border-radius: 20px;" class="form-control btn-success addbtn">
                                    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="close1" style="border:none; border-radius: 20px;" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

                <?php
               }
               ?>
    
</div>
<br><br>