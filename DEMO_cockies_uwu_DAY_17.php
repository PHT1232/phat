<?php
//PHP tạo ra sẵn 1 biến mảng $_COOKIE
//khởi tạo cookie
setcookie('username', 'nvmanh', time() + 3600);

//lấy giá trị của cookie
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    echo $username;
}

//xóa cookie bằng vc set lại cookie đó, nhưng thời gian sống là số âm
setcookie('username', '', time() - 1);