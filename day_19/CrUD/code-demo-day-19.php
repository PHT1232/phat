<meta charset="UTF-8">
<?php
const DB_HOST = 'localhost'; //127.0.0.1
const DB_USERNAME = 'root'; //đây là tài khoản mặc định mà khi cài XAMPP đã tạo sẵn
const DB_PASSWORD = ''; //đây là password mặc định mà khi cài XANPP đã tạo sẵn
const DB_NAME = 'db_19'; //đây là password mặc định mà khi cài XANPP đã tạo sẵn
const DB_PORT = 3306; //cổng kết nối vào DB

//Thực hiện kết nối tới CSDL Mysql sử dụng PHP
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

if (!$connection){
    die("kết nối thất bại. Chi tiết lỗi: " . mysqli_connect_error());
}

echo "kết nối tới CSDL" . DB_NAME . "thành công";
$sql_insert = "INSERT INTO students9(`name`, `age`) VALUES('Phat',19), ('abc',123)";

//Thực thi truy vấn vừa tạo
//với truy vấn insert, update, delete thì hàm mysqli_query sẽ trả về
//giá trị boolean
//với truy vấn select => hàm sẽ trả về 1 đối tượng, ko phải kiểu boolean
$is_insert = mysqli_query($connection, $sql_insert);
echo "<br>";
if ($is_insert){
    echo "insert thành công";
}
else{
    echo "insert thất bại";
}

echo "<br>";
//chức năng update
//update tên = New Name cho các bản ghi mà có id < 5
$sql_update = "UPDATE students SET `name` = 'New Name' WHERE id < 5";
$is_update = mysqli_query($connection, $sql_update);
if($is_update){
    echo "Update thành công";
} else {
    echo "update thất bại";
}

echo "<br>";
//chức năng xóa
//xóa các bản ghi mà có id > 8
$sql_delete = "DELETE FROM students WHERE id > 8";
$is_delete = mysqli_query($connection, $sql_delete);
if($is_delete) {
    echo "xóa các bản ghi có id > 8 thành công =))";
} else {
    echo "xóa các bản ghi có id > 8 thất bại =*(";
}
//chức năng liệt kê
//lấy ra thông tin tất cả dữ liệu trong bảng students
$sql_select = "SELECT * FROM students";
$results = mysqli_query($connection, $sql_select);
//echo "<pre>";
//print_r($results);
//echo "<pre>";
//kiểm tra xem có dữ liệu trả về không
if (mysqli_num_rows($results) > 0){
    //lấy ra kiểu dữ liệu mong muốn
    $students = mysqli_fetch_all($results, MYSQLI_ASSOC);
    foreach ($students as $student){
        echo "Tên: {$student['name']}";
        echo "<br>";
        echo "Tuổi: {$student['age']}";
        echo "<br>";
//        $created_at = $student['created_at'];
        $created_at = date('d-m-Y H:i:s', strtotime($student['created_at']));
        echo "Ngày tạo: {$created_at}";
        echo "<br>";
    }
}
?>