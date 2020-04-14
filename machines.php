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
    $query = "select * from machines";
    $result = pg_query($db, $query);
    $result = pg_fetch_all($result);
?>
<body>
<h1>Станки</h1>
<table class="table table-bordered table-striped mb-0" border="1">
<tr>
    <th>№</th>
    <th>Модель</th>
    <th>Возраст</th>
    <th>Дата планового ремонта</th>
</tr>
<?php
    if (is_array($result)) { 
    for ($i = 0; $i < count($result); $i++) {
        $row = $result[$i];
        echo '<tr>';
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['model'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['planoviy_remont'] . "</td>";
        echo "</tr>";
    }
    }
?>
</table>
</body>
</html>
