<?php 
session_start();
include("../admin/func/connect.php");

if (!isset($_SESSION["login_id"])) {
    header("location: ../login.php");
    exit();
}

$id = intval($_GET["cart_id"]);
$delete = $conn->prepare("DELETE FROM cart WHERE id=?");
$delete->bind_param("i", $id);
$delete->execute();

header("location: ../cart.php");
exit();