<?php
require_once 'models/book.php';
class BookControllers {

    public function create() {

        //xử lý submit form
        if (isset($_GET['submit'])){
            print_r($_GET);
            $name = $_GET['name'];
            $amount = $_GET['amount'];

            //kiểm tra validate

            //gọi model để thực hiện insert vào database
            $book_model = new book();
            $book_model->name = $name;
            $book_model->amount = $amount;

            $is_insert = $book_model->insert();
            var_dump($is_insert);
        }

        echo "Đang ở trong phương thức create của bookcontrollers";
        //gọi view để hiển thị form thêm mới
        //bản chất vẫn là nhúng file view vào
        //luôn phải tư duy là dùng từ file index.php gốc của ứng dụng nhúng file
        require_once 'views/books/create.php';
    }
}