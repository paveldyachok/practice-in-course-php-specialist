<?php

define('DB_HOST', 'localhost');
define('DB_LOGIN', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'eshop');
define('ORDERS_LOG', 'orders.log');

$basket = array();
$count = 0;

// Соединение и выбор базы данных
$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
// Отслеживаем ошибки при соединении
if (!$link) {
    echo 'Ошибка: '
        . mysqli_connect_errno()
        . ':'
        . mysqli_connect_error();
}

/**
 * Clear string
 *
 * @param  string $data jfhsdfh
 * @return string fsdf
 */
function clearStr($data)
{
    global $link;
    $data = trim(strip_tags($data));
    return mysqli_real_escape_string($link, $data);
}

clearStr();