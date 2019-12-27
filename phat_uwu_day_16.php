<!--chữa bài tập 1-->
<meta charset="UTF-8">
<?php
$error = '';
$result = '';
if (isset($_POST['upload'])){
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    if ($_FILES['avatar']['error'] == 0){
        $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        //chuyển đuôi file về chữ thường
        $extension = strtolower($extension);
        //khai báo mảng các đuôi file ảnh hợp lệ
        $arr_image_extension = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($extension, $arr_image_extension)){
            $error = "Cần upload file có định dạng ảnh";
        }  else if ($_FILES['avatar']['size'] > 1 * 1024 * 1024) {
            $error = "Cần upload file dung lượng tối đa 1MB";
        }  else {
            //xử lý upload file
            //tạo ra thư mục vật lý chứa file bằng code
            $dir_uploads = __DIR__ . '/uploads';
            //nếu chưa tồn tại thư mục thì mới tạo mới
            if (!file_exists($dir_uploads)) {
                mkdir($dir_uploads);
            }

            //set lại tên file để đảm bảo file ko bị trùng tên file
            //dù file trên local có giống nhau đi chăng nữa
            $file_name = time() . '-' . $_FILES['avatar']['name'];

            $is_upload = move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $file_name);
            $file_size = round($_FILES['avatar']['size'] / 1024 /1024, 2);
            if ($is_upload){
                $result .= "avatar của bạn :";
                $result .= "<img src='uploads/$file_name' height='50' />";
                $result .= "<br/>";
                $result .= "Tên file: $file_name <br/>";
                $result .= "Định dạng file: $extension <br>";
                $result .= "Đường dẫn tuyệt đối file:" . $dir_uploads . '/' . $file_name . "<br/>";
                $result .= "Dung lượng file(MB):  " . $file_size;
            } else {
                $error = "Không thể upload file";
            }
        }

    } else {
        $error = "Có lỗi xảy ra oh no";
    }
}
?>
<h3 style="color: red">
    <?php echo $error ?>
</h3>
<h3 style="color: green">
    <?php echo $result ?>
</h3>
<form action="" method="post" enctype="multipart/form-data">
    <b>Select a file to upload</b>
    <br>
    <input type="file" name="avatar">
    <br>
    Only jpg, jpeg, png and gif with maximum size of 1MB is allowed
    <br>
    <input type="submit" name="upload" value="Upload">
</form>