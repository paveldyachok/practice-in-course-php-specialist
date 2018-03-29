<?php
$id = abs((int)$_GET['delId']);
if ($id == 0) {
    errPrint("Произошла ошибка при удалении новости");
} else {
    if (!$news->deleteNews($id)) {
        errPrint("Произошла ошибка при удалении новости");
    } else {
        header("Location: news.php");
        exit;
    }
}
