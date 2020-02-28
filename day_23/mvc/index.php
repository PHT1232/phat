<meta charset="UTF-8"/>
<?php
//phải có 1 tham số tên là controllers và 1 tham số tên là action
//index.php?controller=book&action=create
//echo "File index gốc của ứng dụng";
//echo "<br>";
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'book';
print_r($controller);
$action = isset($_GET['action']) ? $_GET['action'] : 'create';
print_r($action);

//BookController.php
$controller = ucfirst($controller);

$controller .= "Controllers";

$path_controller = "controllers/" . $controller . ".php";

//kiểm tra nếu file controllers ko tồn tại, nghĩa là người dùng
//đã gọi sai tên controller
if (!file_exists($path_controller)) {
    die("Trang bạn tìm không tồn tại");
}
require_once "$path_controller";
$object = new $controller();
if(!method_exists($object, $action)) {
    echo "<br>";
    die("không tồn tại phương thức $action trong controller $controller");
}
$object->$action();