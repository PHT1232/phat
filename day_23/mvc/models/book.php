<?php

class book
{
    const DB_DSN = 'mysql:host=localhost;dbname=books_mvc;charset=utf8'; //Data source name

    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';

    public $name;
    public $amount;
    public function connectDataBase()
    {
        try {
            $connection = new PDO(self::DB_DSN, self::DB_USERNAME, self::DB_PASSWORD);
        } catch (PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
            die;
        }
        return $connection;
    }
    public
    function insert()
    {
        $connection = $this->connectDataBase();

        $obj_insert = $connection->prepare("INSERT INTO books(`name`, `amount`) VALUES(:name, :amount)");

        $arr_select = [
            ':name' => $this->name,
            ':amount' => $this->amount,
        ];
        return $obj_insert->execute($arr_select);
    }
}

