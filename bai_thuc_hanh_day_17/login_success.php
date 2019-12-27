<meta charset="UTF-8">
<?php
session_start();
//nếu chưa đăng nhập mà truy cập vào file này
//thì phải chuyển hướng về trang login
if (!isset($_SESSION['username'])){
    $_SESSION['error'] = "cần đăng nhập trang";
    header("Location: DEMO_THUC_HANH_1.php");
    exit();
}
?>
<h1>
    <?php
    echo isset($_SESSION['success']) ? $_SESSION['success'] : '';
//    echo $_SESSION['success'];
    unset($_SESSION['success']);
    ?>
</h1>
<h1 style="color: green">
    Chao mung ban, <?php echo $_SESSION['username']?>
    <a href="logout.php">Dang xuat</a>
</h1>
