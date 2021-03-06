<meta charset="UTF-8">
<?php
session_start();
//detail.php
//Hiển thị thông tin chi tiết của 1 sinh viên
//check validate với trường hợp không tồn tại tham số id
if (!isset($_GET['id'])) {
    $_SESSION['error'] = 'tham số id không tồn tại';
    //chuyển hướng về trang index
    header("location: Index.php");
    exit();
    //validate trường hợp id không phải số
} elseif (!is_numeric($_GET['id'])) {
    $_SESSION ['error'] = 'ID,phải là số';
    //chuyển hướng về trang liệt kê
    header("location: Index.php");
    exit();
}
$id = $_GET['id'];
//truy vấn cơ sở dữ liệu
require_once 'config.php';
//lấy ra đối tượng sinh viên theo id vừa bắt đc từ trình duyệt
//tạo câu truy vấn
$sql_select = "SELECT * FROM students WHERE id = $id";
$results = mysqli_query($connection, $sql_select);
$students = [];
if (mysqli_num_rows($results) > 0) {
    $students = mysqli_fetch_all($results, MYSQLI_ASSOC);
//        echo "<pre>";
//    print_r($students);
//        echo "</pre>";
    //do truy vấn với điều kiện theo id rồi nên bao giờ cũng
    //trả về 1 phần tử duy nhất
    $students = $students[0];
}
?>
<h3>Thông tin chi tiết</h3>
<?php if (empty($students)): ?>
    <h3>Sinh viên không tồn tại :))</h3>
<?php else: ?>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <td>
                <?php echo $students['id']; ?>
            </td>
        </tr>
        <tr>
            <th>Name</th>
            <td>
                <?php echo $students['name']; ?>
            </td>
        </tr>
        <tr>
            <th>Age</th>
            <td>
                <?php echo $students['age']; ?>
            </td>
        </tr>
        <tr>
            <th>Created at</th>
            <td>
                <?php echo date('d-m-Y H:i:s', strtotime($students['created_at'])) ?>
            </td>
        </tr>
    </table>
<?php endif; ?>
<a href="index.php" style="color: red">Về trang thông kê ?</a>
