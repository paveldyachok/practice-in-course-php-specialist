<?php

function my_autoloader($class)
{
    include $class . '.class.php';
}

spl_autoload_register('my_autoloader');

class NewsDB implements INewsDB
{
    const DB_NAME = "../news.db";
    const ERR_PROPERTY = "Error! Неизвестное свойство!";
    private $_db;

    public function __construct()
    {
        $this->_db = new SQLite3(self::DB_NAME);
        if (!filesize(self::DB_NAME)) {
            try {
                $sql = "CREATE TABLE msgs(
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title TEXT,
                category INTEGER,
                description TEXT,
                source TEXT,
                datetime INTEGER
                )";
                if ($this->_db->exec($sql)) {
                    throw new Exception("Ошибка! Не могу создать таблицу msgs");
                }
                $sql = "CREATE TABLE category(
                    id INTEGER,
                    name TEXT
                )";
                if ($this->_db->exec($sql)) {
                    throw new Exception("Ошибка! Не могу создать таблицу category");
                }
                $sql = "INSERT INTO category(id, name)
                    SELECT 1 as id, 'Политика' as name
                    UNION SELECT 2 as id, 'Культура' as name
                    UNION SELECT 3 as id, 'Спорт' as name";
                if ($this->_db->exec($sql)) {
                    throw new Exception("Ошибка! Не могу заполнить таблицу category");
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }
    
    public function __get($name)
    {
        switch ($name) {
            case 'db':
                return $this->_db;
            default:
                throw new Exception(self::ERR_PROPERTY);
        }
    }

    public function __set($name, $value)
    {
        throw new Exception(self::ERR_PROPERTY);
    }

    public function __destruct()
    {
        unset($this->_db);
    }

    public function saveNews($title, $category, $description, $source)
    {
        $dt = time();
        $sql = "INSERT INTO msgs(title, category, description, source, datetime)
            VALUES ('$title', $category, '$description', '$source', $dt)";
        return $this->_db->exec($sql);
    }

    public function getNews()
    {
        $sql = "SELECT msgs.id as id, title, category.name as category,
            description, source, datetime
            FROM msgs, category
            WHERE category.id = msgs.category
            ORDER BY msgs.id DESC";
        $result = $this->_db->query($sql);
        $date = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $date[] = $row;
        }
        if (!$date) {
            return false;
        }
        return $date;
    }

    public function deleteNews($id)
    {
        $sql = "DELETE FROM msgs WHERE id=$id";
        return $this->_db->exec($sql);
    }

    public function escape($date)
    {
        return $this->_db->escapeString(trim(strip_tags($date)));
    }
}
