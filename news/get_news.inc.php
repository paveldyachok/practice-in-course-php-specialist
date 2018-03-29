<?php
$allNews = $news->getNews();
if (!is_array($allNews)) {
    $errMsg = "Произошла ошибка при выводе новостной ленты";
    errPrint($errMsg);
} elseif (!count($allNews)) {
    $errMsg = "Новостей нет";
    errPrint($errMsg);
} else {
    echo "<h3>Количество новостей в базе: " . count($allNews) . "</h3><br/>";
    foreach ($allNews as $value) {
        $dt = date('d-m-Y H:i:s', $value['datetime']);
        $desc = nl2br($value['description']);
        echo "<h3>{$value['title']}</h3>";
        echo "<p>{$desc}</p>";
        echo "<h5>категория: {$value['category']}, дата: {$dt}, источник: {$value['source']}</h5>";
        echo "<p><a href='news.php?delId=" . $value['id'] . "'>Удалить новость</a></p><hr>";
    }
}
