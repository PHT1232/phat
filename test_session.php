<?php
session_start();

echo "<pre>";
print_r($_SESSION);
echo "</pre>";
//khi muốn thao tác với SSSSION tại nơi ko trực tiếp khai báo no
//khi cần sủ dụng hàm isset để chắc chắn session đso đã tồn tại rồi
if (isset($_SESSION['age'])) {
    echo "Age = : " . $_SESSION['age'];
}
