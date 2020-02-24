<meta charset="UTF-8">
<h1>Demo lập trình hướng đối tượng</h1>
<?php

//1 - Class
class Book
{
    //thuộc tính của class
    public $name;
    public $type;

    //2 phương thức của class
    public function canRead()
    {
        echo 'Phương thức can read';
    }

    public function sell()
    {
        echo 'Phương thức sell';
    }
}

//2 - Object
$sgk = new Book();
$sgk->name = 'Sách giáo khoa';
$sgk->type = 'Sách';

echo $sgk->name;
echo "<br>";
echo $sgk->type;
echo "<br>";
$sgk->canRead();
echo "<br>";
$sgk->sell();

class Car
{
    public $producer;
    public $brand;
    public $color;
    public $card;

    public function go()
    {

    }
}

//khởi tạo đối tượng từ class car
$car = new Car();
$car->producer = 'toyota';
$car->brand = 'toyota';
$car->color = 'Yellow';
$car->card = 123456;

echo "<pre>";
print_r($car);
echo "</pre>";
$car->go();

//3 - Từ khóa this
//truy cập thuộc tính hoặc phương thức trong chính class hiện tại
class StudentDemo
{
    public $name;

    public function getName()
    {
        echo "Name: " . $this->name;
    }
}

$student = new StudentDemo();
$student->name = 'ABC';
$student->getname();

//4 - phạm vi truy cập thuộc tính/phương thức
//có 3 mức độ:
//private
class TestPrivate
{
    private $name;

    private function show()
    {
        echo "Phương thức show";
    }

    private function getName()
    {
        //truy cập private bình thường trong nội bộ class
        $this->name = "ABC";
    }
}

//$test_private = new TestPrivate();
////cố tình truy cập thuộc tính name đang ở private
//$test_private->name = 'name 1';
//echo $test_private->name;
//$test_private->show();

//protected
class TestProtected
{
    protected $name;
    private $age;

    protected function show()
    {
        echo 'Phương thức show';
    }
}

//Bên ngoài class cũng không thể truy cập được vào thuộc tính
$test_protected = new TestProtected();

//$test_protected->name = 'ABCDEF';

class ChildProtected extends TestProtected
{
    public function child()
    {
        $this->name = 'ABC';
        //báo lỗi
        //$this->age = 12;
    }
}

//public
class TestPublic
{
    public $name;
    public $age;

    public function getName()
    {
        echo "getName";
    }

    public function getAge()
    {
        echo "getAge";
    }
}

//thông thường khi làm project thì sẽ dễ phạm vi truy cập là public hêt
//dễ đơn giản
$test_public = new TestPublic();
$test_public->name = "12345";
$text_public->age = 145;
$test_public->getName();
$test_public->getAge();

//5 - Thuộc tính của class
class Animal
{
    //2 thuộc tính của class, về bản chất vẫn là biến thông thường
    //do đang liên kết với object nên gọi là thuộc tính
    public $name;
    public $color;
}

$animal = new Animal();
//truy cập thuộc tính của class sử dụng cú pháp là
$animal->name = "Mèo";
$animal->color = "Trắng";

//6 - phương thức của class
class student2
{
    public function addStudent()
    {
        echo "addStudent";
    }

    public function editStudent($id)
    {
        echo "editStudent";
    }
}

$student = new Student2();
//về bản chất phương thức trong class chính là các hàm
//dễ truy cập các phương thức sử dụng ký tự
$student->addStudent();//addStudent
$student->editStudent(12); //editStudent

//7 - Phương thức khởi tạo của class
class TestConstuctor
{
    public function __construct()
    {
        echo "<p>Phương thức khởi tạo sẽ chạy đầu tiên khi đối tượng được sinh ra</p>";
    }
}

$test_constuctor = new TestConstuctor();

//8 - từ khóa static
class TestStatic
{
    public static $name;

    //nếu trong phương thức mà có truy cập đến thuộc tính static
    //thì bắt buộc phương thức đó cũng phải là static
    public static function getName()
    {
//        TestStatic::$name = "ABC"
//Từ khóa self đại diện cho class đó
        //tương đương với từ khóa this
        self::$name = "ABC";
        echo self::$name;
    }
}

//không thể truy cập thuộc tính/phương thức đang ở trạng thái static
//từ việc khởi tạo đối tượng
$test_static = new TestStatic();
//$test_static->name;
//truy cập thuộc tính/phương thức tĩnh bằng cách dùng
//tên class: tên thuộc tính/tên phương thức
TestStatic::$name = 'ABCDe';
TestStatic::getName();

// 9 - Từ khóa extends - Kế thừa
class Person1
{
    public $name;
    public $age;

    public function getName()
    {
        echo 'getName';
    }
}

//class sẽ kế thừa tất cả các thuộc tính và phương thức của class cha
//mà đang có phạm vi truy cập là protected và public
class Student1 extends Person1
{
    public $class;

    public function showID()
    {
    }
}

$student = new Student1();
$student->name = "Mạnh";
$student->age = 39;
$student->getName();

//10 - Từ khóa abstract - tính trừu tượng
abstract class Person2
{
    public $name;

    public function getName()
    {

    }
    //phương thức trừu tượng khai báo ko có nội dung
    //bắt buộc các class thì extends phải ghi đè lại phương thức này
    abstract public function test();
}

class TestPerson2 extends Person2 {
    public function test() {
        //code
    }
}

//11 - từ khóa implement - Interface
interface Config {
    //public $name
    public function sendMail();
    public function test();
}

class Mail implements Config {
    public function sendMail()
    {
        // TODO: Implement sendMail() method.
    }

    public function test()
    {
        // TODO: Implement test() method.
    }
}
?>

