<?php

if(isset($_POST['submit'])) {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
//khi xử lí vs input radio hoặc checkbox
    //thì nên kiểm tra thêm điều kiện là đã tích vào radio/checkbox
    if(isset($_GET['gender'])){
        //xử lý lấy giá trị cho input radio
    }
    if(isset($_GET['jobs'])){
        //xử lý lấy giá trị cho input radio
        //vs checkbox thì phải xử lí dưới dạng mảng
    }
}
?>

<meta charset="UTF-8">
<form action="" method="post">
    Name:
    <input type="text" name="name" value=""/>
    <br>
    <input type="radio" name="gender" value="1"/>Nam
    <input type="radio" name="gender" value="2"/>Nữ
    <input type="radio" name="gender" value="3"/>Giới tính thứ 3
    <br/>
    Country
    <select name="country[]" multiple>
        <option value="1">Viêt Nam</option>
        <option value="1">UK</option>
        <option value="1">USA</option>
        <option value="1">Korea</option>
    </select>
    <br/>
    jobs:
<!--    với các input mà cho phép chọn nhiều giá trị tại 1 thời điểm -->
<!--    thì name bắt buộc phải ở dạng mảng-->
    <input type="checkbox" name="jobs[]" value="1"/>Developer
    <input type="checkbox" name="jobs[]" value="2"/>Tester
    <input type="checkbox" name="jobs[]" value="3"/>beta tester
    <input type="checkbox" name="jobs[]" value="4"/>graphics designer
    <br/>
    info:
    <textarea name="info"></textarea>
    <br/>
    <input type="submit" name="submit" value="submit"/>
</form>
