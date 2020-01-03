<?php
//chứa các thong tin kết nối tới CSDL
const DB_HOST = "localhost";
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'db_19';
const DB_POST = 3306;

//gọi hàm kết nối
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_POST);
if (!$connection) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}

mysqli_query($connection, "SET NAMES 'utf8'");
echo "<h2>kết nối thành công</h2>";