<?php

$visitCounter = isset($_COOKIE["visitCounter"]) ? $_COOKIE["visitCounter"]+1 : 1;
$lastVisit = isset($_COOKIE["lastVisit"]) ? date("d-m-Y", $_COOKIE["lastVisit"]) : "";

setcookie("visitCounter", $visitCounter, time()+120);
setcookie("lastVisit", time(), time()+120);
// if (date('d-m-Y', $_COOKIE["lastVisit"]) != date('d-m-Y')) {
//     setcookie("lastVisit", time(), time()+120);
// }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        if ($visitCounter == 1) {
            echo "<h3>Спасибо, что зашли на огонёк!</h3>";
        } else {
            echo "<h3>Количество Ваших посещений: {$visitCounter}<h3><br>
            Последнее посещение: {$lastVisit}";
        }
    ?>
</body>
</html>