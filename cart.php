<?php
include("admin/func/connect.php");
session_start();
if (!isset($_SESSION["login_id"])) {
    header("location: login.php");
    exit();
}
$user_id = $_SESSION["login_id"];

// 1. Clean up duplicates for this user
$sql = "SELECT pro_id, COUNT(*) as cnt FROM cart WHERE user_id=$user_id GROUP BY pro_id HAVING cnt > 1";
$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
    $pro_id = $row['pro_id'];
    $all = $conn->query("SELECT id, quantity FROM cart WHERE user_id=$user_id AND pro_id=$pro_id ORDER BY id ASC");
    $total_quantity = 0;
    $first_id = null;
    $ids_to_delete = [];
    while ($cart = $all->fetch_assoc()) {
        if ($first_id === null) {
            $first_id = $cart['id'];
            $total_quantity += $cart['quantity'];
        } else {
            $total_quantity += $cart['quantity'];
            $ids_to_delete[] = $cart['id'];
        }
    }
    $conn->query("UPDATE cart SET quantity=$total_quantity WHERE id=$first_id");
    if (!empty($ids_to_delete)) {
        $ids = implode(',', $ids_to_delete);
        $conn->query("DELETE FROM cart WHERE id IN ($ids)");
    }
}

// 2. Fetch all cart items for this user (now unique per product)
$cart_sel = "SELECT c.id, c.pro_id, c.quantity, p.name, p.price, p.image FROM cart c JOIN products p ON c.pro_id = p.id WHERE c.user_id=$user_id";
$cart_res = $conn->query($cart_sel);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="css/style.default.css">
</head>
<body>
<div class="container">
    <h2>Your Cart</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Control</th>
        </tr>
        <?php while($row = $cart_res->fetch_assoc()): ?>
        <tr>
            <td>
                <img src="admin/img/<?=htmlspecialchars($row['image'])?>" width="50" />
                <?=htmlspecialchars($row['name'])?>
            </td>
            <td>&dollar;<?=htmlspecialchars($row['price'])?></td>
            <td>
                <div class="quantity">
                    <a href="function/update_cart.php?cart_id=<?=$row['id']?>&action=dec">-</a>
                    <input type="text" value="<?=htmlspecialchars($row['quantity'])?>" readonly style="width:30px;text-align:center;" />
                    <a href="function/update_cart.php?cart_id=<?=$row['id']?>&action=inc">+</a>
                </div>
            </td>
            <td><a href="function/del_from_cart.php?cart_id=<?=$row['id']?>">Remove</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="shop.php">Continue Shopping</a>
</div>
</body>
</html>