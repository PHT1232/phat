<meta charset="UTF-8"/>
<?php
//kết nối cơ sở dữ liệu sủ dụng cơ chế PDO - PHP DATA OBJECT
//bước 1 : khởi tạo kết nối $connection

//khai báo chuỗi kết nối theo cú của PDO
const DB_DSN = 'mysql:host=localhost;dbname=student_oop;charset=utf8'; //Data source name

const DB_USERNAME = 'root';
const DB_PASSWORD = '';

try {
  $connection = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
} catch(PDOException $e) {
    echo "Kết nối thất bại: " . $e->getMessage();
    die;
}

echo "kết nối thành công";

//1 - truy vấn insert
//chuẩn bị truy vấn
$obj_insert = $connection->prepare("INSERT INTO students(`name`, `age`) VALUES (:name, :age)");
//truyền dữ liệu thật cho các param vừa gắn - bind ở câu truy vấn trên
$arr_student = [
  ':name' => 'Mạnh',
  ':age' => 30
];

//thực thi truy vấn
$is_insert = $obj_insert->execute($arr_student);

if ($is_insert) {
    echo "<br>";
    echo "insert thành công";
} else {
    echo "<br>";
    echo "insert thất bại";
}


//1 - truy vấn update
//chuẩn bị kết nối
$obj_update = $connection
    ->prepare("UPDATE students SET `name` = :name WHERE id = :id");

//gán dữ liệu cho các param ở câu truy vấn trên
$arr_update = [
    ':name' => 'new name',
    ':id' => 1
];

//thực thi truy vấn
$is_update = $obj_update->execute($arr_update);
if ($is_update) {
    echo "<br>";
    echo "update bản ghi 1 thành công";
} else {
    echo "<br>";
    echo "Update bản ghi 1 thất bại";
}



//3 - truy vấn xóa
//chuẩn bị câu truy vấn
$obj_delete = $connection->prepare("DELETE FROM students WHERE id = :id");
//gắn giá trị cho pẩm
$arr_delete = [
    ':id' => 1
];
//thực thi truy vấn
$is_delete = $obj_delete->execute($arr_delete);
if($is_delete){
    echo "Xóa bản ghi 1 thành công";
} else {
    echo "Xóa bản ghi 1 thất bại";
}


//4 - Truy vấn Select
//chuẩn bị câu truy vấn
$obj_select = $connection->prepare("SELECT * FROM students WHERE id > :id");
//gắn giá trị cho các định danh trong câu truy vấn
$arr_select = [
    ':id' => 2
];

//thực thi truy vấn
//với truy vấn select thì phương thức execute sẽ trả về 1 đối tượng
//chứ ko phải là kiểu dữ liệu boolean như insert, update, delete
$obj_select->execute($arr_select);
$students = $obj_select->fetchAll(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($students);
echo '</pre>';


