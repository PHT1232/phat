<?php
session_start();
//session_destroy();
$_SESSION['success'] = "Đăng xuất thành công";
//chuyển hướng về form login
unset($_SESSION['username']);
header("location: DEMO_THUC_HANH_1.php");
exit();
?>