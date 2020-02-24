<meta charset="UTF-8">
<?php
//tạo chức năng CRUD
//sách sử dụng OOP, có kết nối CSDL
//tạo 1 csdl bằng câu truy vấn SQL
//id: khóa chính tự tăng
//name: tên sách - text, không cho phép null
//amount: số lượng sách trong kho - số nguyên, cho phép null
//created_at: ngày tạo sách, tự động sinh khi có bản ghi được tạo

class Book {
    const DB_HOST = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    const DB_NAME = 'book_oop';
    const DB_PORT = 3306;
    //các thuộc tính được xác định thông qua các trường của bảng books
    public $id;
    public $name;
    public $amount;
    public $created_at;

    public function connectDataBase(){
        $connection = mysqli_connect(self::DB_HOST, self::DB_USERNAME,self::DB_PASSWORD,self::DB_NAME,self::DB_PORT);

        if(!$connection) {
            die("kết nối thất bại, lỗi" . mysqli_connect_error());
        }

        return $connection;
    }

    public function disconnectDataBase($connection){
        mysqli_close($connection);
    }

    public function listBook(){
        echo "Phương thức listbook";
    }

    public function insertBook(){
        echo "Phương thức insertbook";
        //1 - kết nối tới cơ sở dữ liệu
        $connection = $this->connectDataBase();
        //2 - Viết truy vấn để insert
        $query_insert = "INSERT INTO books (`name`, `amount`)
                            VALUES('{$this->name}',{$this->amount})";
        $is_insert = mysqli_query($connection, $query_insert);
        //3 - đóng kết nối
        $this->disconnectDataBase($connection);

        return $is_insert;
    }

    public function editBook($id){
        echo "Phương thức editbook";
    }

    public function deleteBook($id){
        echo "Phương thức deletebook";
    }
}

$book = new Book();
//dùng đối tượng book truy cập 2 thuộc tính name và amount
//set giá trị muốn thêm cho 2 thuộc tính này, rồi mới gọi phương thức
//insertbook
$book->name = 'sách văn học';
$book->amount = 123;
$is_insert = $book->insertBook(); //phương thức insertBook
if($is_insert) {
    echo "thêm sách thành công";
} else {
    echo "thêm sách thất bại";
}