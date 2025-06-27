<?php
session_start();
include("../admin/func/connect.php");

if (!isset($_SESSION["login_id"])) {
    header("location: ../login.php");
    exit();
}

$usr_id = $_SESSION["login_id"];
$product = intval($_GET["pro"]);

// Check if this product is already in the user's cart
$cart_sel = "SELECT * FROM cart WHERE user_id=? AND pro_id=?";
$stmt = $conn->prepare($cart_sel);
$stmt->bind_param("ii", $usr_id, $product);
$stmt->execute();
$cart_res = $stmt->get_result();

if($cart_res->num_rows == 0){
    $insert = $conn->prepare("INSERT INTO cart(user_id, pro_id, quantity) VALUES (?, ?, 1)");
    $insert->bind_param("ii", $usr_id, $product);
    $insert->execute();
} else {
    $cart_row = $cart_res->fetch_assoc();
    $cart_id = $cart_row["id"];
    $cart_quan = $cart_row["quantity"] + 1;
    $update = $conn->prepare("UPDATE cart SET quantity=? WHERE id=?");
    $update->bind_param("ii", $cart_quan, $cart_id);
    $update->execute();
}

header("location: ../cart.php");
exit();