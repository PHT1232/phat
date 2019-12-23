<meta charset="UTF-8"/>
<?php
$error='';
$result='';
if(isset($_POST['submit'])){
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $data_time = $_POST['data_time'];
    $class_detail = $_POST['class_detail'];
//    $gander = $_POST['gender'];
    if(empty($name)){
        $error = "Name không dược để trống";
    }
    elseif(empty($email)){
        $error = "Email không dược để trống";
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "Email chưa đúng định dạng";
    }
    elseif(empty($class_detail) && empty($data_time)){
        $error = "Class details không được để trống";
    }
    elseif(!isset($_POST['gender'])){
        $error = "cần phải chọn Gender";
    }
    else{
        $result .= "Your given detalis are as: <br>";
        $result .= "name: $name <br>";
        $result .= "Email: $email <br>";
        $result .= "Specific Time: $data_time <br>";
        $result .= "Class details: $class_detail <br>";

        $gender = $_POST['gender'];
        $gender_text = '';
        switch ($gender) {
            case 0: $gender_text = 'Female';break;
            case 1: $gender_text = 'male';break;
        }
        $result .= "Gender: $gender_text";
    }
}
?>

<h3><?php echo $error ?></h3>
<h3><?php echo $result ?></h3>
<form action="" method="post">
    <table border="0">
        <tr>
            <td colspan="2">Tutorial</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>
                <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''?>"/>
            </td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td>
                <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''?>"/>
            </td>
        </tr>
        <tr>
            <td>Specific Time:</td>
            <td>
                <input type="date" name="data_time" value="<?php echo isset($_POST['data_time']) ? $_POST['data_time'] : ''?>"/>
            </td>
        </tr>
        <tr>
            <td>Class details:</td>
            <td>
                <textarea name="class_detail"><?php echo isset($_POST['class_detail']) ? $_POST['class_detail'] : ''?></textarea>
            </td>
        </tr>
        <tr>
            <?php
            $checked_female = '';
            $checked_male = '';
                if(isset($_POST['gender'])){
                    $gender = $_POST['gender'];
                    switch ($gender) {
                        case 0: $checked_female = "checked=true";break;
                        case 1: $checked_male = "checked=true";break;
                    }
                }
            ?>
            <td>Gender</td>
            <td>
                <input <?php echo $checked_female ?> type="radio" name="gender" value="0"/>Female
                <input <?php echo $checked_male ?> type="radio" name="gender" value="1"/>Male
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="submit"/>
            </td>
        </tr>
    </table>
</form>

