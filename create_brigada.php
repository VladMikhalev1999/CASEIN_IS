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
<h1>Формирование бригады</h1>
<form action="jz_nachalnik_brigady.php" method="GET">
<div class="sz1">
<p>Укажите типы сервиса</p>
<select multiple="multiple" name="snames">
  <option>Почистить станок</option>
  <option>Заменить масло</option>
</select>
<p></p>
</div>
<div class="sz2">
<p>Укажите исполнителей сервиса</p>
<select multiple="multiple" name="exes">
  <option>Иванов</option>
  <option>Петров</option>
  <option>Сидоров</option>
  <option>Семенов</option>
  <option>Прохоров</option>
</select>
<p></p>
</div>
<div class="clearfix"></div>
<input style="margin-left:50%" type="submit" class="btn btn-success" value="Сформировать" />
</form>
<button style="float:left; margin-left: 250px;" class="btn btn-primary">Отмена</button>
<button style="float:right; margin-right:250px;" class="btn btn-large">Учет нагрузки</button>
</body>
</html>
