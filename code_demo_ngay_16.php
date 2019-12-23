<meta charset="UTF-8">
<?php
$error = '';
$result = '';
if (isset($_POST['submit'])){
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    //khi thao tác với file, sủ dụng biến $_FILES để xủ lý
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    $name = $_POST['name'];
    if(empty($name)){
        $error = "name no được để trống";
    }
    else{
        //xử lí form
        //xử lí upload file lên thư mục
//        move_uploaded_file()
        $avatar_arr = $_FILES['avatar'];
        if($avatar_arr['error'] != 0){
            $error = 'khong the upload file vi loi gi do';
        }
        else {
            //check validate với trường hợp file upload phải có định dạng ảnh và dung lượng upload không vượt quá 2mb
            //lấy ra đuôi file sủ dụng hàm pathinfo trong php
            $extension = pathinfo($avatar_arr['name'], PATHINFO_EXTENSION);
//            print_r($extension);
//            die;

            //cần phải chuyển đổi đơn vị từ B --> MB
            $size = $avatar_arr['size'] / 1024 / 1024;
            //tạo 1 mảng quy định trước các định dạng file ảnh
            $arr_extension = ['png', 'jpg', 'jpeg', 'gif'];
            if(in_array($extension, $arr_extension) == FALSE){
                $error = "Cần upload file dạng ảnh";
            } elseif ($size > 0.01) {
                $error = "Chỉ có thể upload file dung lượng <= 0,01mb";
            } else {
                //tạo thư mục để lưu file vừa upload
                //phải sử dụng đường dẫn vật lý để lưu file
                $dir_uploads = __DIR__ . "/uploads";
                //kiểm tra xem nếu chưa tồn tại thư mục uploads
//            thì sẽ tại mới bằng code
                if (file_exists($dir_uploads) == FALSE) {
                    mkdir($dir_uploads);
                }
                //chuyển file từ thư mục tạm sang thư mục upload
                $file_name = time() . $avatar_arr['name'];
                $tmp_name = $avatar_arr['tmp_name'];
                $destination = $dir_uploads . '/' . $file_name;
                $is_upload = move_uploaded_file($tmp_name, $destination);
                if ($is_upload) {
                    $result = "upload file thành công";
                } else {
                    $error = "không thể upload file vì lí do gì đó";
                }
            }
        }
    }
}
?>
<h3 style="color: red">
    <?php echo $error;?>
</h3>
<h3 style="color: green">
    <?php echo $result;?>
</h3>
<form action="" method="post" enctype="multipart/form-data">
    Name: <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''?>"/>
    <br/>
    Upload avatar
    <input type="file" name="avatar"/>
    <br/>
    <input type="submit" name="submit" value="submit"/>
</form>