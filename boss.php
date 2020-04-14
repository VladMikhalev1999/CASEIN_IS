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
    $query = "select * from func_jurnal_obslujivaniya()";
    $result = pg_query($db, $query);
    $result = pg_fetch_all($result);
?>
<body>
<h1>Журнал обслуживания</h1>
<h2>Фильтр (Виды заявок)</h2>
<button class="btn btn-primary" onclick="show_only_srochnye()">Срочные</button>
<button class="btn btn-primary" onclick="show_only_planovye()">Плановые</button>
<button class="btn btn-primary" onclick="unhide_all()">Все</button>
<h2>Приоритет</h2>
<button class="btn btn-success">Низкий</button>
<button class="btn btn-warning">Средний</button>
<button class="btn btn-danger">Высокий</button>
<p></p>
<table id="table-nach-uch" class="table" border="1">
<tr>
    <th>ИД заявки</th>
    <th>№ исполняем. бригады</th>
    <th>Дата поступления</th>
    <th>Вид заявки выполнения</th>
    <th>Приоритет</th>
    <th>ИД</th>
    <th>Станок/компонент</th>
    <th>Проблемный узел</th>
</tr>
<?php
    if (is_array($result)) { 
    for ($i = 0; $i < count($result); $i++) {
        $row = $result[$i];
        echo "<tr>";
        echo "<td>" . $row['id_zayavki'] . "</td>";
        echo "<td>" . $row['id_brigady'] . "</td>";
        echo "<td>" . $row['date_postuplenya'] . "</td>";
        echo "<td>" . $row['vidzayavki'] . "</td>";
        echo "<td>" . $row['prioritet'] . "</td>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['model'] . "</td>";
        echo "<td>" . $row['nameuzel'] . "</td>";
        echo "</tr>";
    }
    }
?>
</table>
</body>
</html>
