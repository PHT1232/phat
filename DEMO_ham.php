<?php
//Demo 1 số hàm thao tác với chuỗi
echo "<br>";
$string = "abc dèf";
//chuyển thành chữ hoa
echo strtoupper($string);
//chuyển ký tự đầu tiên thành chữ
echo "<br>";
$string = "hello abc";
echo ucfirst($string);
//chuyển ký tự đầu tiên của mỗi từ thành chữ hoa
echo "<br>";
$string = "my name is manh";
echo ucwords($string);

//xóa các khoảng trắn ở đàu và cuối chuỗi
echo "<br>";
$string = "       abc def           ";
echo trim($string);

//tìm kiếm và thay thế
echo "<br>";
$string = "abc def";
echo str_replace("abc", "Manh", $string);

//tìm kiếm và thay thế theo chuỗi regex
//thay thế tất cả các ký tự nào là số bằng 1 dấu
echo "<br>";
$string = "11aa 123456 343 12121";
echo preg_replace('/[0-9]/', '-', $string);

echo "<br>";
//cắt chuỗi
$string = "hello world";
echo substr($string, 0, 3);

echo "<br>";
//Hàm thao tác với thời gian - ngày tháng
$datetime = "2019-05-30 15:00:00";
//format lại thành kiểu 30-05-2019 15:00:00
echo date('d-m-Y H:i:s', strtotime($datetime));

//Lây ra thời gian hiện tại\
echo "<br>";
echo time();
echo "<br>";
//set lại múi giờ là giờ VN
date_default_timezone_set('Asia/Ho_Chi_Minh');
echo date('d/m/Y H:i:s', time());

//Thao tác với số
$price = 12500000;
echo "<br>";
//format thành 12.500.000
echo number_format($price, 0 ,  '.','.');

?>

