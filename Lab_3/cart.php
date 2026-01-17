<?php
session_start();

// Danh sách sản phẩm (hardcode)
$products = [
    1 => "Bàn phím cơ",
    2 => "Chuột gaming",
    3 => "Tai nghe"
];

// Khởi tạo giỏ hàng
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Thêm sản phẩm
if (isset($_GET['add'])) {
    $id = $_GET['add'];
    $_SESSION['cart'][] = $id;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
</head>
<body>

<h2>Sản phẩm</h2>
<?php foreach ($products as $id => $name): ?>
    <p>
        <?= $name ?>
        <a href="cart.php?add=<?= $id ?>">Thêm vào giỏ</a>
    </p>
<?php endforeach; ?>

<hr>

<h3>Giỏ hàng của bạn</h3>
<?php
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $pid) {
        echo "- " . $products[$pid] . "<br>";
    }
} else {
    echo "Giỏ hàng trống";
}
?>

</body>
</html>
