<meta charset="UTF-8">
<!--Hiển thị một form cho pháp thêm sinh viên mới-->
<?php
session_start();
if (!isset($_GET['id'])) {
    $_SESSION['error'] = 'tham số id không tồn tại';
    header("location: Index.php");
    exit();
} elseif (!is_numeric($_GET['id'])) {
    $_SESSION ['error'] = 'ID,phải là số';
    header("location: Index.php");
    exit();
}
$id = $_GET['id'];
require_once 'config.php';
$sql_select = "SELECT * FROM students WHERE id = $id";
$results = mysqli_query($connection, $sql_select);
$students = [];
if (mysqli_num_rows($results) > 0) {
    $students = mysqli_fetch_all($results, MYSQLI_ASSOC);
    $students = $students[0];
}
$error = '';
$result = '';
if (isset($_POST['submit'])) {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    $name = $_POST['name'];
    $age = $_POST['age'];
    if (empty($name) || empty($age)) {
        $error = "Không được để trống";
    } elseif ($age <= 0) {
        $error = "Bạn không tồn tại";
    } else {
        $sql_update = "UPDATE students SET `name` = '$name', `age` = $age WHERE id = $id";
        $is_update = mysqli_query($connection, $sql_update);
        mysqli_close($connection);
        if ($is_update) {
            $_SESSION['success'] = "update bản ghi $id thành công";

        } else {
            $_SESSION['error'] = "update bản ghi $id thất bại";
        }
        header("Location: index.php");
        exit();
    }
}
?>
<h3 style="color:red"><?php echo $error ?></h3>
<h3>Cập nhập</h3>
<meta charset="UTF-8"/>
<form action="" method="post">
    Nhập tên:
    <input type="text" name="name" value="<?php echo $students['name'] ?>"/>
    <br/>
    Nhập tuổi:
    <input type="number" name="age" value="<?php echo $students['age'] ?>"/>
    <br/>
    <button type="submit" name="submit">Thêm mới</button>
</form>