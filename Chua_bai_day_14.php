<meta charset="UTF-8">
<?php
/**
 * @param $arrs array Mảng cần tính toán
 * @param $operator string các toán tử + - * /
 * @return string kết quả của bài toán
 */
function calculate($arrs, $operator) {
    $string = '';
        switch ($operator) {
            case '+' :
                $result = 0;
                $string = "Tổng các phần tử bằng =";
                foreach($arrs AS $key => $value) {
                $result += $value;
                $string .= "$value";
                if ($key == count($arrs) - 1) {
                    continue;
                }
                    $string .= " + ";
            }
                break;
            case '-' :
                $result = $arrs[0];
                $string = "Tổng các phần tử = ";
                foreach($arrs AS $key => $value) {
                    $string .= "$value + ";
                    if ($key == 0) {
                        continue;
                    }
                    $result -= $value;
                }
                break;
            case '*' :
                $result = 1;
                $string = "Tích các phần tử = ";
                foreach ($arrs AS $value){
                    $result *= $value;
                    $string .= " $value * ";
                }
                break;
            case '/' :
                $result = $arrs[0];
                $string = "Thương các phần tử = ";
                foreach ($arrs AS $key => $value){
                    $string .= " $value / ";
                    if ($key == 0){
                        continue;
                    }
                    if ($value == 0) {
                        continue;
                    }
                    $result /= $value;
                }
                break;
        }
    $string = substr($string, 0 , -2);
    $string .= " = $result";
    $string .= "<br>";
    return $string;
}

$arrs = [0,2, 5, 6, 9, 2, 5, 6, 12 ,5];
//GỌI HÀM NÈ
echo calculate($arrs, '+');
echo calculate($arrs, '-');
echo calculate($arrs, '*');
echo calculate($arrs, '/');

$arrs = [1,0, 5];
echo calculate($arrs, '/');
?>


<?php
//chữa bài 6
$keys = array(
    "field1"=>"first",
    "field2"=>"second",
    "field3"=>"third"
);
$values = array(
    "field1value"=>"dinosaur",
    "field2value"=>"pig",
    "field3value"=>"platypus"
);
$keysAndValues = array_combine($keys, $values);
echo "<pre>";
print_r($keysAndValues);
echo "</pre>"

//$keysAndValues = array
?>

<?php
//CHỮA BÀI 7
$array = [12, 5, 200, 10, 125, 60, 90, 345, -123, 100,  -125, 0];
foreach($array AS $value) {
    if ($value >= 100 && $value <= 200 && $value % 5 == 0){
        echo $value . " ";
    }
}
?>

<?php
// CHỮA BÀI 8
$array = ['programming', 'php', 'basic', 'dev', 'is', 'program is PHP'];
//TÌM CHUỖI CÓ ĐỘ DÀI LỚN NHẤT?
$max = 0;
$str_max = "";
foreach($array AS $string) {
    $str_length = strlen($string);
    //Tại 1 lần lặp nào đó, mà có 1 phần tử có độ dài lón hơn giá trị
//    max thì  làm các phép gán sau
    if($str_length > 0){
        $max = $str_length;
        $str_max = $string;
    }
}

echo "chuỗi lớn nhất là $str_max, độ dài:  $str_length";
?>

<?php
//CHỮA BÀI 9
$arrs = ['1', 'B', 'C', 'E'];
function convertArrToLower($arrs){
    $arr_result = [];
    foreach($arrs AS $value) {
        $value_lower = strtolower($value);
        $arr_result[] = $value_lower;
    }

    return $arr_result;
}
echo "<pre>";
print_r(convertArrToLower($arrs));
echo "</pre>";
?>