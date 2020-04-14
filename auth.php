<?php
    require "script.php"
?>
<html>
<head>
<meta charset="utf-8" />
<script src="script.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<title>IS</title>
</head>
<body>
    <?php
        $login = $_REQUEST['login'];
        $pass = $_REQUEST['password'];
        $db = auth($login, $pass);
    ?>
    <?php if($db == TRUE): ?>
            <p><a class="btn btn-link" href="machines.php">Станки</a></p>
            <p><a class="btn btn-link" href="employees.php">План работ</a></p>
            <p><a class="btn btn-link" href="jz_nachalnik_uchastka.php">Журнал заявок (начальник участка)</a></p>
            <p><a class="btn btn-link" href="jz_nachalnik_brigady.php">Журнал заявок (начальник бригады)</a></p>
            <p><a class="btn btn-link" href="boss.php">Журнал обслуживания</a></p>
    <?php else: ?>
        <h2>Ошибка подключения к Базе Данных!</h2>
    <?php endif ?>
</body>
</html>