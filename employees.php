<html>
<head>
<meta charset="utf-8" />
<title>IS</title>
<script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<?php
    require "script.php";
    $db = auth();
    $query = "select * from employee";
    $result = pg_query($db, $query);
    $result = pg_fetch_all($result);
?>
<body>
<h1>План работы</h1>
<table class="table" border="1">
<tr>
    <th>Станок</th>
    <th>Узел</th>
    <th>Статус</th>
    <th>Приоритет</th>
</tr>
</table>
<h2>Тип сервиса</h2>
<table class="table" border="0">
<tr>
    <td>1</td>
    <td>Почистить</td>
</tr>
<tr>
    <td>2</td>
    <td>Заменить</td>
</tr>
</table>
<p><button class="btn btn-info">Справка</button></p>
<button class="btn btn-primary">Приступить</button>
<button class="btn btn-success">Исполнить</button>
</body>
</html>
