<meta charset="UTF-8">
<?php
//Xử lí dữ liệu trên form
//luôn phải lưu ý, là chỉ khi có hành động submit form
//thì các biến $_POST/$_GET mới có giá trị
//sử dụng hàm isset() để check xem 1 biến đã từng tồn tại
//trước đó hay chưa

$error = ''; //Biến lưu trữ thg tin
$result = ''; //Biến lưu trữ thg tin
//nếu có hành động submit form thì mới xử lý form
if(isset($_POST['submit'])){
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    //lấy ra các thông tin từ form
    $username = $_POST['username'];
    $password = $_POST['password'];
    //xử lý validate form
    //yêu cầu validate:
    //1 - trường username và password bắt buộc phải nhập
    //2 - password phải có độ dài tối thiểu 3 ký tự trở lên
    if(empty($username) || empty($password)){
        $error = "Username hoặc password ko đc để trống";
    }
    elseif (strlen($password) < 3){
        $error = "Password ko được nhỏ hơn 3 ký tự";
    }
    else{
        //nếu username = admin và password =
        //admin khi báo Đăng nhập thành công
//        Ngược lại báo sai mật khẩu hoặc tài khoản
        if($username == 'admin' && $password == 'admin'){
            $result = 'Đăng nhập thành công';
        }
        else{
            $error = 'Sai tài khoản hoặc mật khẩu';
        }
    }
}
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="post">
    Username:
<!--    khi submit form, cần xử lí để đổ lại dữ liệu cho -->
<!--    các input mà user đã nhập đúng khi xảy ra lỗi validate-->
    <input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>"/>
    <br/>
    Password:
    <input type="password" name="password"/>
    <br/>
    <input type="submit" value="login" name="submit" onsubmit="return false" />
</form>
