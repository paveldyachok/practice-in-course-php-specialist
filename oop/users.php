<?php

function my_autoloader($class)
{
    include 'classes/' . $class . '.class.php';
}

spl_autoload_register('my_autoloader');

$user1 = new User("Саша", "Sasha", "111");
$user2 = new User("Паша", "Pasha", "222");
$user3 = new SuperUser("Даша", "Dasha", "333", "Модератор");
$user3->showInfo();
echo "Всего обычных пользователей: " . User::$count . "\n";
echo "Всего супер-пользователей: " . SuperUser::$count . "\n\n";
