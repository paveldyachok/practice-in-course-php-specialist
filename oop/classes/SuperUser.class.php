<?php
class SuperUser extends User
{
    public $role;
    public static $count = 0;

    function __construct($dName, $dLogin, $dPassword, $dRole)
    {
        parent::__construct($dName, $dLogin, $dPassword);
        $this->role = $dRole;
        ++self::$count;
        --parent::$count;
    }

    function showInfo()
    {
        echo "Имя пользователя: {$this->name}\nЛогин: {$this->login}\n";
        echo "Пароль: {$this->password}\nРоль: {$this->role}\n\n";
    }
}
