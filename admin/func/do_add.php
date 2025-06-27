<?php 

include ("connect.php");
// if($conn){
//     echo "connected<br><br>";
// }

$name=$_POST["name"];
$count=$_POST["count"];
$price=$_POST["price"];
$brand=$_POST["brand"];
$category=$_POST["category"];
$dsc=$_POST["dsc"];

// $image_name=$_FILES["image"]["name"];
// $image_tmp=$_FILES["image"]["tmp_name"];
// $image_size=$_FILES["image"]["size"];


// $exp = explode(".", $image_name);
// $ext = strtolower(end($exp));
// $allow_ext = array("jpg", "jpeg", "png", "gif");

// echo "<pre>";
//     print_r($_POST);
//     print_r($_FILES);
// echo "</pre";

// if(!in_array($ext, $allow_ext))
// {
//     echo "error type file";
//     exit();
// }

// $new_name=time().rand(1,1111111).$image_name;
// move_uploaded_file($image_tmp,"../img/$new_name");

// if($image_size>5000000)
// {
//     echo "large file";
//     exit();
// }
$file_num = count($_FILES['images']['name']);
$max_file_num = 5;
if($file_num <= $max_file_num){
for($i = 0; $i < $file_num; $i++){
 $img_name = $_FILES["images"]["name"][$i];
 $img_tmp = $_FILES["images"]["tmp_name"][$i];
 $img_size = $_FILES["images"]["size"][$i];
 $img_type = $_FILES["images"]["type"][$i];

 $exp = explode(".", $img_name);
 $ext= end($exp);
 $allow_ext = ["jpg","jpeg","png"];
 if(!in_array($ext, $allow_ext)){
   echo "error file type";
   exit();
 }
 $new_name = time().rand(1,111111).$img_name;
 move_uploaded_file($img_tmp,"../img/$new_name");

 if($img_size > 4000000){
  echo "image too large";
  exit();
 }
 $new_names[] = $new_name;
 $new_names_db = implode(",", $new_names);
}
} else {
$count_error = "Only 5 Images Allowed";
echo $count_error;
}
 

// $insert="INSERT INTO products(name, price, image, count, category, brand, description) VALUES ($name,$price,$new_name,$count,$category,$brand,$dsc)";
$insert1="INSERT INTO products( name, image, count, price, brand, category, description) VALUES ('$name','$new_names_db',$count,$price,$brand,$category,'$dsc')";
$res = $conn->query("$insert1");

// header("location:../products.php");
$new_id = $conn -> insert_id;
$new_stuff = "SELECT * FROM products WHERE id='$new_id'";
$new_res = $conn->query("$new_stuff");
$new_row= $new_res -> fetch_assoc();

$print_id = $new_row["id"];
$print_name = $new_row["name"];
$print_count = $new_row["count"];
$print_price = $new_row["price"];
$print_brand = $new_row["brand"];
$print_category = $new_row["category"];
$print_image = $new_row["image"];

echo <<<v
      <tr>
      <td>$print_id</td>
      <td>$print_name</td>
      <td>$print_image</td>
      <td>$print_count</td>
      <td>$print_price</td>
      <td>$print_brand</td>
      <td>$print_category</td>
      <td>
      <button type="button" class="btn btn-success" id="editmodalbtn" style="border:none; border-radius: 20px;" data-bs-toggle="modal" > Edit </button>
      <a><button class="btn btn-danger" style="border:none; border-radius: 20px;">Delete</button></a>
      </td>
      </tr>
      v;