<meta charset="UTF-8">
<?php
session_start(); //hàm này phải khai báo ở đầu file
//bắt buộc phải khởi tạo session thì mới có thể sủ dụng
//được biến $_SESSION
//SESSION
//PHP tạo ra biến toàn cục có tên là $_SESSION


//thêm dữ liệu cho session, chính là thao tác
//thêm dữ liệu với mảng
$_SESSION['age'] = 15;
$_SESSION['name'] = 'Mạnh';
$_SESSION['arr'] = [1, 2, 3];

//Lấy dứ liệu của $_SESSION
$name = $_SESSION['name']; //Mạnh
$age = $_SESSION['age']; //15
$arr = $_SESSION['arr']; //[1,2,3]

//xóa dữ liệu của session
//unset($_SESSION['name']); //xóa phần tử có key là name của mảng $_SESSION
//xóa hết toàn bộ session đang có trên hệ thống
//session

echo "<pre>";
print_r($_SESSION);
echo "</pre>";