<?php
    $error = '';
    $result = '';
    if (isset($_GET['submit'])){
        $number = $_GET['number'];
        if(empty($number)){
            $error = 'xin đừng để trống nhá';
        } elseif (!is_numeric($number)){
            $error = 'xin hãy nhập số';
        } else {
            if ($number <= 50){
                $result = $number * 1000;
            } elseif ($number > 50 && $number <= 100){
                $result = 50 *1000;
                $result += ($number - 50) * 2000;
            } elseif ($number > 100 && $number <= 200){
                $result = 50 * 1000;
                $result += 50 * 2000;
                $result += ($number - 100) * 3000;
            } elseif ($number > 200){
                $result = 50 * 1000;
                $result += 50 * 2000;
                $result += 100 * 3000;
                $result += ($number - 200) * 4000;
            }
        }
    }
?>
<h3><?php echo $error?></h3>
<meta charset="UTF-8">
<h3>Tính giá tiền điện</h3>
<form action="" method="get">
    Nhập số tiền điện tiêu thụ
    <input type="text" name="number" value=""/>
    <table border="0" cellspacing="0" cellpadding="15">
        <tr>
            <th colspan="2">Bảng giá tiền điện theo bậc thang</th>
        </tr>
        <tr>
            <td>
                0 - 50kw
            </td>
            <td>
                <b>1000đ/KW</b>
            </td>
        </tr>
        <tr>
            <td>
                Trên 50 - 100Kw
            </td>
            <td><b>2000đ/KW</b><br>
                Từ 0 - 50Kw giá 1000đ/m3
            </td>
        </tr>
        <tr>
            <td>
                Trên 100 - 200KW
            </td>
            <td>
                <b>3000đ/Kw</b><br>
                Từ 0 - 50KW giá 1000đ/m3<br>
                Trên 50 - 100KW giá 2000đ/m3
            </td>
        </tr>
        <tr>
            <td>
                Trên 200KW
            </td>
            <td><b>4000đ/KW</b><br>
                Từ 0 - 50KW giá 1000đ/m3<br>
                Trên 50 - 100KW giá 2000đ/m3<br>
                Trên 100 - 200KW giá 3000đ/m3
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Tính tiền điện"></td>
        </tr>
    </table>
</form>
<h3 style="color: green"><?php echo $result?></h3>