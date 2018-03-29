<?php

class SimpleHouse
{
    private $color = "none";

    public function __get($name)
    {
        switch ($name) {
            case 'color':
                return $this->color;
            default:
                throw new Exception('Неизвестное свойство!');
        }
    }

    public function __set($name, $value)
    {
        switch ($name) {
            case 'color':
                $this->color = $value;
                break;
            default:
                throw new Exception('Неизвестное свойство!');
        }
    }

    public function __call($n, $args)
    {
        echo "Call method $n with args";
        print_r($args);
    }

    public static function __callStatic($n, $args)
    {
        echo "Call static method $n with args";
        print_r($args);
    }
}

$simple = new SimpleHouse("A-100-123", 120, 2);
$simple->color = "white"; // Запускается __set() и устанавливает значение свойства $color = "white";
echo $simple->color . "\n"; // Заускается __get() и выдаёт значение свойства $color
$simple->color("red"); // Запускается __call() и вызывается метод color c аргументом "red"
$simple->staticFoo(1, 2, 3); // Запускается __call() и вызывается статический метод staticFoo c аргументами 1, 2, 3

trait Hello
{
    function getGreet()
    {
        return "Hello";
    }
}

trait User
{
    function getUser($name)
    {
        return ucfirst($name);
    }
}

class Welcome
{
    use Hello, User;
}

$obj = new Welcome();
echo $obj->getGreet(), ', ', $obj->getUser('john'), '!'; // Hello, John!
   


// class Pet
// {
//     // Описание свойств
//     public $type = "unknown";
//     public $name;
//     // Конструктор класса
//     public function __construct($type, $name)
//     {
//         $this->type = $type;
//         $this->name = $name;
//         echo "My {$this->type} name {$this->name}\n";
//     }
//     // Деструктор класса
//     public function __destruct()
//     {
//         echo $this->name . " removed\n";
//     }
// }

// // Создание объектов, экземпляров класса
// $cat = new Pet("cat", "Murzik");
// $dog = new Pet("dog", "Tuzik");
