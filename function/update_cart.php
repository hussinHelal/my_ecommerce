<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("../admin/func/connect.php");

if (!isset($_SESSION["login_id"])) {
    header("location: ../login.php");
    exit();
}

$cart_id = intval($_GET["cart_id"]);
$action = $_GET["action"];

$cart_sel = $conn->prepare("SELECT quantity FROM cart WHERE id=?");
$cart_sel->bind_param("i", $cart_id);
$cart_sel->execute();
$cart_res = $cart_sel->get_result();
if ($cart_res->num_rows == 0) {
    header("location: ../cart.php");
    exit();
}
$cart_row = $cart_res->fetch_assoc();
$quantity = $cart_row["quantity"];

if ($action === "inc") {
    $quantity++;
    $update = $conn->prepare("UPDATE cart SET quantity=? WHERE id=?");
    $update->bind_param("ii", $quantity, $cart_id);
    $update->execute();
} elseif ($action === "dec") {
    $quantity--;
    if ($quantity <= 0) {
        $delete = $conn->prepare("DELETE FROM cart WHERE id=?");
        $delete->bind_param("i", $cart_id);
        $delete->execute();
    } else {
        $update = $conn->prepare("UPDATE cart SET quantity=? WHERE id=?");
        $update->bind_param("ii", $quantity, $cart_id);
        $update->execute();
    }
}

header("location: ../cart.php");
exit();
?> 