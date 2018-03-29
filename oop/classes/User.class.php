<?php
class User
{
    public $name;
    public $login;
    public $password;
    public static $count = 0;

    function __construct($dName, $dLogin, $dPassword)
    {
        $this->name = $dName;
        $this->login = $dLogin;
        $this->password = $dPassword;
        ++self::$count;
    }

    function __clone()
    {
        ++self::$count;
    }

    function showInfo()
    {
        echo "Имя пользователя: {$this->name} Логин: {$this->login} Пароль: {$this->password}\n";
    }

    function __destruct()
    {
        echo "Пользователь {$this->name} удалён\n";
    }
}
