<?php
include ("func/connect.php"); 

    $select="SELECT * FROM products";
    $result=$conn->query($select);

    // <?php 
    // $images = explode(",",$row["image"]);
    // foreach($images as $image){
    //     echo "<img src=\"img/$image\" > ";
    // }
    // 
    ?>


<style> 
table {
        border-collapse: collapse;
        width: 100%;
    }
    td {
        border: 1px solid #ccc;
        padding: 5px;
        text-align: center;
    }
    .image-container {
        display: flex;
        justify-content: center;
    }
     img {
        width: 100px;
        height: 80px;
        margin: 3px;
    }
</style>

<table class="table table-hover table-striped table-bordered  col-lg-10">
    <thead class="table-dark text-light">

        <tr>
                <th>id</th>
                <th>name</th>
                <th>img</th>
                <th>count</th>
                <th>price</th>
                <th>brand</th>
                <th>category</th>
                <th>controls</th>
        </tr>
    </thead>
    <tbody>
        <?php 
                while($row=$result->fetch_assoc())
                {
                    
                    ?>
                 
                    <tr class="tr_<?=$row["id"]?>">

                            <td id="id_<?=$row["id"]?>"><?= $row["id"]?></td>
                            <td id="name_<?=$row["id"]?>"><?= $row["name"]?></td>
                            <!-- <img src="img/<?=$row["image"] ?>" style="width:50px"> -->
                            <!-- <div class="image-container"> -->
                            <!-- <td><img src="img/ -->
                            <td id="img_<?=$row["id"]?>">   <img src="img/<?php
                             $images = explode(",",$row["image"]);
                             echo $images[0];
                            ?>" >  </td> 
                        <!-- </div>  -->
                            <td id="count_<?=$row["id"]?>"><?= $row["count"]?></td>
                            <td id="price_<?=$row["id"]?>"><?= $row["price"]?></td>
                           
                            <td id="brand_<?=$row["id"]?>">
                                <?php 
                                          $id_br= $row["brand"];
                                          $select_br="SELECT * FROM brand where id='$id_br'";
                                          $result_br=$conn->query($select_br);
                                          $row_br=$result_br->fetch_assoc();
                                          echo $row_br["name"];

                                ?>
                            </td id="cat_<?=$row["id"]?>">
                                <td><?php
                               $id_cat= $row["category"];
                               $select_cat="SELECT * FROM category where id='$id_cat'";
                               $result_cat=$conn->query($select_cat);
                               $row_cat=$result_cat->fetch_assoc();
                               echo $row_cat["name"];
                                ?></td>


                            <td class="text-center">
                                <!-- <a href="?action=edit&id=//<?=$row["id"]?>"><button class="btn btn-warning">Edit</button></a> -->
                                <!-- modal start -->
                                 <!-- Button trigger modal -->
                                 <button type="button" class="btn btn-success editmodalbtn1"  style="border:none; border-radius: 20px;" data-bs-toggle="modal" data-bs-target="#<?=$row["id"]?>">  Edit </button>
                                    
                                  <!-- <?php
                                    // $e_id = $row["id"];
                                    // $e_select="SELECT * FROM products WHERE id ='$e_id'";
                                    // $e_result=$conn->query($e_select);
                                    // $e_row=$e_result->fetch_assoc();
                                  ?> -->
                                    <!-- Modal -->
                                             <div class="modal fade" id="<?=$row["id"]?>" tabindex="-1" aria-labelledby="editmodallabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editmodallabel">edit</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">             
                                                <!-- form start -->
                                                <form  method="POST" enctype="multipart/form-data" >

                                                <input type="number" name="edit_id" value="<?=$row["id"]?>" id="edit_id_<?=$row["id"]?>" disabled> <br> <br>

                                                <label for="edit_name">product_name</label>
                                                <input type="text" name="edit_name"  id="edit_name_<?=$row["id"]?>" class="form-control" value="<?= $row["name"]?>"><br><br>

                                                <label for="edit_images">product_image</label>
                                                <input type="file" name="edit_images[]" id="edit_images_<?=$row["id"]?>" multiple class="form-control">
                                                <img src="img/<?php $images1 = explode(",",$row["image"]); echo $images1[0];?> " style="width:50px;height:40px;"><br><br>
                                                

                                                <label for="edit_count">product_stock</label>
                                                <input type="number" name="edit_count" id="edit_count_<?=$row["id"]?>" class="form-control" value="<?= $row["count"]?>"><br><br>

                                                <label for="edit_price">product_price</label>
                                                <input type="number" name="edit_price" id="edit_price_<?=$row["id"]?>" class="form-control" value="<?= $row["price"]?>"><br><br>

                                                <label for="edit_brand">product_brand</label>
                                                <select name="edit_brand" id="edit_brand_<?=$row["id"]?>" class="form-control">
                                                    <?php 
                                                    $select_brand4="SELECT * FROM brand ";
                                                    $result_brand4=$conn->query($select_brand4);
                                                    while($row_brand4=$result_brand4->fetch_assoc())
                                                    {
                                                    ?>
                                                            <option value="<?=$row_brand4["id"]?>" <?php  if($row_brand4["id"] == $row["brand"]) { echo "selected"; } ?> > <?=$row_brand4["name"]?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select><br><br>
                                                
                                                
                                                
                                                <label for="edit_category">product_category</label>
                                                <select name="edit_category" id="edit_category_<?=$row["id"]?>" class="form-control">
                                                    <?php 

                                                    $select_category2="SELECT * FROM category";
                                                    $result_category2=$conn->query($select_category2);
                                                    while($row_category2=$result_category2->fetch_assoc())
                                                    {
                                                    ?>
                                                    
                                                      <option value="<?=$row_category2["id"]?>" <?php if($row_category2["id"]==$row["category"]) { echo "selected";} ?> > <?= $row_category2["name"]?> </option>
                                                        
                                                    <?php
                                                    }
                                                    ?>
                                                </select><br><br>

                                                <textarea name="edit_dsc" id="edit_dsc_<?=$row["id"]?>" cols="30" rows="10" class="form-control"><?= $row["description"]?></textarea><br><br>
                                                <input type="submit" value="Edit" class="form-control btn-success editbtn1">


                                                </form>
                                                <!-- form end -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger close1"  style="border:none; border-radius: 20px;" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div> 
 <!-- modal end -->
                                <!-- <a href="func/delete.php?id=<?=$row["id"]?>"><button class="btn btn-danger" style="border:none; border-radius: 20px;">Delete</button></a> -->
                                <button class="btn btn-danger delbtn" style="border:none; border-radius: 20px;" data-id="<?=$row["id"]?>">Delete</button>
                            </td>
                </tr>
                <?php
                // print_r($row);
                }
        ?>
       
    </tbody>
</table>
<!-- <?php
// echo "<pre>";
//     print_r($row);
//     echo "</pre>"; ?> -->
<div class="text-center">
 <!-- <a href="?action=add"><button class="btn btn-success">Add product</button></a> -->
       <!-- modal start -->
                                 <!-- Button trigger modal -->
                                 <button type="button" class="btn btn-success addmodalbtn"  style="border:none; border-radius: 20px;" data-bs-toggle="modal" data-bs-target="#addmodal1">
                                    Add
                                    </button>

                                    <!-- Modal -->
                                            <div class="modal fade" id="addmodal1" tabindex="-1" aria-labelledby="addmodallabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="addmodallabel">add</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">             
                                                <!-- form start -->
                                                <form method="POST" enctype="multipart/form-data">
                                                        <label for="pro_name2">product_name</label>
                                                        <input type="text" name="pro_name2"  class="form-control" id="pro_name2" ><br><br>
                                                        <label for="pro_images2">product_image</label>
                                                        <input type="file" name="pro_images2[]" id="pro_images2" multiple class="form-control"><br><br>   
                                                        <label for="pro_stock2">product_stock</label>
                                                        <input type="number" name="pro_stock2" class="form-control" id="pro_stock2" ><br><br>
                                                        <label for="pro_price2">product_price</label>
                                                        <input type="number" name="pro_price2" class="form-control" id="pro_price2" ><br><br>
                                                        <label for="pro_brand2">product_brand</label>
                                                        <select name="pro_brand2" class="form-control" id="pro_brand2">
                                                            <?php 
                                                            
                                                            $select_brand2="SELECT * FROM brand";
                                                            $result_brand2=$conn->query($select_brand2);
                                                            while($row_brand2=$result_brand2->fetch_assoc())
                                                            {
                                                                ?>
                                                                    <option value="<?=$row_brand2["id"]?>"><?=$row_brand2["name"]?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select><br><br>
                                                        <label for="pro_cat2">product_category</label>
                                                        <select name="pro_cat2" class="form-control" id="pro_cat2">
                                                        <?php 
                                                            $select_category2="SELECT * From category";
                                                            $result_category2=$conn->query($select_category2);
                                                            while($row_category2=$result_category2->fetch_assoc())
                                                            {
                                                                ?>
                                                                    <option value="<?=$row_category2["id"]?>"><?=$row_category2["name"]?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select><br><br>
                                                        <textarea name="pro_dsc2" cols="30" rows="10" class="form-control" id="pro_dsc2" ></textarea><br><br>
                                                    <input type="submit" value="add" class="form-control btn-success addbtn1">

                                                </form>
                                                <!-- form end -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="close2" style="border:none; border-radius: 20px;" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
 <!-- modal end -->
</div>
<br><br><br><br>
