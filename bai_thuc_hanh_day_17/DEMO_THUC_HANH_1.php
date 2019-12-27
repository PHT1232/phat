<meta charset="UTF-8">
<?php
session_start();

if (isset($_SESSION['username'])) {
    $_SESSION['success'] = "Bạn đã đăng nhập rồi, không thể truy cập lại form login";
    header("location: login_success.php");
    exit();
}
    $error = '';
    $result = '';
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        //validate với trường hợp username hoặc password ko đc
//        để trống
        if (empty($username) || empty($password)) {
            $error = "Username hoặc password không được để trống";
        } elseif ($username != 'nvmanh' && $password != 123456) {
            $error = "Sai username hoặc password";
        } else {
            //trường hợp này là trường hợp đăng nhập thành công
            //chuyển hướng người dùng sang trang login_success.php
            //kèm theo thông báo đăng nhập thành công tại màn hình đó
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Đăng nhập thành công";
            //dùng hàm header để chuyển hướng
            header("Location: login_success.php");
            exit();
        }
    }
?>
<h3 style="color: red">
    <?php echo $error ?>

    <?php
    if (isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
</h3>
<h3 style="color: green">
    <?php
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?>

</h3>
<form action="" method="post">
    Username:<br/>
    <input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>"/>
    <br/>
    Password:<br/>
    <input type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"/>
    <br/>
    <input type="submit" value="Login" name="submit"/>
</form>