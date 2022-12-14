<?php

class Database{
    // Единственный существующий экземпляр данного класса
    private static $instance = null;

    // Экземпляр подключения к БД
    private $connection = null;

    private $servername = 'localhost';
    private $database = 'pizza_delivery';
    private $username = 'root';
    private $password = '';

    protected function __construct(){

        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database);

        if(mysqli_connect_error()) {
            trigger_error("Connection Failed" . mysqli_connect_error(),
                E_USER_ERROR);
        }
    }

    // Запрещаем клонирование
    protected function __clone(){
        throw new Exception("Can't clone a singleton");
    }

    // Запрещаем десериализацию
    public function __wakeup(){
        throw new BadMethodCallException('Database connection cannot be deserialized');
    }

    // Создает экземпляр класса, хранящий подключение к БД
    public static function getInstance(){
        if (null === self::$instance){
            self::$instance = new static();
        }

        return self::$instance;
    }

    // Экземпляр подключения к БД
    public static function getConnection(){
        return static::getInstance()->connection;
    }

    // Подготовленное выражение
    public static function prepare($statement){
        return static::getConnection()->prepare($statement);
    }

}