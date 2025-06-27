

<form action="func/do_add.php" method="POST" enctype="multipart/form-data" class="col-lg-9">
        <label for="name">product_name</label>
        <input type="text" name="name"  class="form-control"><br><br>
        <label for="image">product_image</label>
        <input type="file" name="images[]" multiple class="form-control"><br><br>
        <label for="count">product_stock</label>
        <input type="number" name="count" class="form-control"><br><br>
        <label for="price">product_price</label>
        <input type="number" name="price" class="form-control"><br><br>
        <label for="brand">product_brand</label>
        <select name="brand" class="form-control">
            <?php 
              
               $select_brand="SELECT * FROM brand";
               $result_brand=$conn->query($select_brand);
            while($row_brand=$result_brand->fetch_assoc())
            {
                ?>
                    <option value="<?=$row_brand["id"]?>"><?=$row_brand["name"]?></option>
                <?php
            }
            ?>
        </select><br><br>
        <label for="category">product_category</label>
        <select name="category" class="form-control">
        <?php 
               $select_category="SELECT * From category";
               $result_category=$conn->query($select_category);
            while($row_category=$result_category->fetch_assoc())
            {
                ?>
                    <option value="<?=$row_category["id"]?>"><?=$row_category["name"]?></option>
                <?php
            }
            ?>
        </select><br><br>
        <textarea name="dsc" cols="30" rows="10" class="form-control"></textarea><br><br>
       <input type="submit" value="Add product" class="form-control btn-success">


</form>