<?php
//tính tổng 3 số truyền vào
//các bạn mới, nghĩ gì viết nấy
$number1 = 1;
$number2 = 2;
$number3 = 3;
$sum = $number1 + $number2 + $number3;
echo "Sum = $sum";

//2 - lập trình có cấu trúc
function sum($number1, $number2 , $number3){
    $sum = $number1 + $number2 + $number3;

    return $sum;
}

echo sum(3,4,5);

//quản lý sách
function connectDb() {}
function disconnectDb() {}
function addBook() {
    connectDb();
    //code thêm sách
    disconnectDb();
}
function editBook() {}


?>

<form method="get" action="">

</form>
