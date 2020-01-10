<?php
function isPrime($number) {
    if ($number < 2){
        return false;
    }

    $is_prime = true;

    for ($i = 2; $i <= sqrt($number); $i++){
        if ($number % $i == 0){
            $is_prime = false;
            break;
        }
    }

    return $is_prime;

}
//xử lý submit form tại đây
$error = '';
$result = '';
if (isset($_GET['submit'])) {
    $number = $_GET['number'];
    //check validate
    if (empty($number)) {
        $error = 'không nên để trống lỗi';
    } elseif (is_numeric($number) == false) {
        $error = 'Phải nhập số';
    } else {
        $result = "các số nguyên tố mà nhỏ hơn $number là: ";
        //xử lý logic bài toán
        for ($i = 0; $i <= $number; $i++){
            if (isPrime($i)){
                 $result .= "$i,";
            }
        }

        $result = substr($result, 0, -1);
    }
}
?>
<meta charset="UTF-8">
<h3><?php echo $error?></h3>
<h3>
    Tìm các số nguyên tố nhỏ hơn số được nhập vào
</h3>
<form action="" method="get">
    Nhập số cần kiểm tra?
    <input type="text" name="number" value=""/>
    <br>
    <input type="submit" value="kiểm tra" name="submit"/>
</form>
<h3 style="color: green">
    <?php echo $result?>
</h3>