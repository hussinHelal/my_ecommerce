
<?php 

include("connect.php");


$id=$_POST["id"];
$name=$_POST["name"];
$count=$_POST["count"];
$price=$_POST["price"];
$brand=$_POST["brand"];
$category=$_POST["category"];
$dsc=$_POST["dsc"];



// $image_name=$_FILES['image']['name'];
// $image_tmp=$_FILES['image']['tmp_name'];
// $image_size=$_FILES['image']['size'];
// $image_error=$_FILES['image']['error'];

// echo "<pre>";
//     print_r($_POST);
//     print_r($_FILES);
// echo "</pre";


// $exp=explode(".",$image_name);
// $ext=end($exp);
// $allow_ext=["jpg","jpeg","png","gif"];

// if(!in_array($ext,$allow_ext)){

//     echo "error type file";
//     exit();
// }

// if($image_size>4000000)
// {
//     echo "large file";
//     exit();
// }
// $new_name=time().rand(1,111111).$image_name;
// move_uploaded_file($image_tmp,"../img/$new_name");

if (isset($_FILES["images"]) ) {

$file_num = count($_FILES['images']['name']);

for($i = 0; $i < $file_num; $i++){

 $img_name = $_FILES["images"]["name"][$i];
 $img_tmp = $_FILES["images"]["tmp_name"][$i];
 $img_size = $_FILES["images"]["size"][$i];
 $img_type = $_FILES["images"]["type"][$i];

 $exp = explode(".", $img_name);
 $ext=  strtolower(end($exp));
 $allow_ext = ["jpg","jpeg","png"];
 
 if(!in_array($ext, $allow_ext)){
   echo "error file type";
   exit();
 }
 
 if($img_size > 8000000){
  echo "image too large";
  exit();
 }
 
 $new_name = time().rand(1,111111).$img_name;
//  move_uploaded_file($img_tmp,"../img/$new_name");
 if (!move_uploaded_file($img_tmp, "../img/$new_name") ) {
  echo "Failed to upload image";
  exit();
}

 $new_names[] = $new_name;
} 
if (!empty($new_names)) {
  $new_names_db = implode(",", $new_names); // Concatenate image names after the loop
  // Rest of your code to handle $new_names_db...
  // echo "Uploaded files: $new_names_db";
}
//  $new_names_db = implode(",", $new_names);

 

$update="UPDATE products SET name='$name',image='$new_names_db',count='$count',price='$price',brand='$brand',category='$category',description='$dsc' WHERE id='$id'";
$conn->query($update);

} else {
  $update1="UPDATE products SET name='$name', count='$count',price='$price',brand='$brand',category='$category',description='$dsc' WHERE id='$id'";
  $conn->query($update1);

}

// print_r($new_name);
// print_r($new_names);
// print_r($new_names_db);

// foreach($_POST as $k => $v){
// echo <<<a
//       $k => $v
//       a;
// }
// foreach($_FILES as $a => $b){
// echo <<<x
//       $a => $b
//       x;
// }

$out = array($id,$name,$count,$price,$brand,$category,$dsc);

print_r($out);
// header("location: ../products.php"); 
?>