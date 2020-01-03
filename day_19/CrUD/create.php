<!--Hiển thị một form cho pháp thêm sinh viên mới-->
<?php
//nhúng file config để cho phép kết nối tới CSDL
require_once 'config.php';
//xử lý form và lưu dữ liệu
$error = '';
$result = '';
if (isset($_POST['submit'])){
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    $name = $_POST['name'];
    $age = $_POST['age'];
    //nếu mà để trống name hoặc age thì báo lỗi
    if (empty($name) || empty($age)){
        $error = "Không được để trống";
    } elseif($age <= 0){
        $error = "Bạn không tồn tại";
    } else {
        //thực hiện lưu dữ liệu vào bảng students
        //tạo câu truy vấn insert
        $aql_insert = "INSERT INTO students(`name`, `age`) VALUES('$name', '$age')";
        //thực thi truy vấn
        $is_insert = mysqli_query($connection, $aql_insert);
        mysqli_close($connection);
        if ($is_insert) {
            //nếu insert thành, chuyển hướng tối
            //trang liệt kê sinh viên
            $_SESSION['success'] = "thêm mới thành công";
//            header("location: index.php");
//            exit();
        }
        else{
            $_SESSION['error'] = "insert thất bại";
        }
        header("Location: index.php");
        exit();
    }
}
?>
<h3 style="color:red"><?php echo $error ?></h3>
<meta charset="UTF-8"/>
<form action="" method="post">
    Nhập tên:
    <input type="text" name="name" value="" />
    <br/>
    Nhập tuổi:
    <input type="number" name="age" value="" />
    <br/>
    <button type="submit" name="submit">Thêm mới</button>
</form>