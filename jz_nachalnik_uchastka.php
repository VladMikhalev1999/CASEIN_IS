<html>
<head>
<meta charset="utf-8" />
<title>ИС ТОиР</title>
<script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<?php
    require "script.php";
    $db = auth($_COOKIE["login"], $_COOKIE["password"]);
    if (isset($_REQUEST["machines"])) {
        $query = "select * from insert_zayavka(" . explode(".", $_REQUEST["machines"])[0] . ")";
        $result = pg_query($db, $query);
        $result = pg_fetch_all($result);
    }
    $query = "select * from jurnal_zayavok()";
    $result = pg_query($db, $query);
    $result = pg_fetch_all($result);
?>
<body>
<style>
table {width:100%; text-align: center; border-bottom: 2px solid #dfdfdf; border-radius: 6px; border-collapse: separate; border-spacing: 0px;}
table tr th {color: #ffffff; font-weight: bold; background: #828282; text-align: center;}
table tr td, table tr th {border-right: 1px solid #dfdfdf; padding: 10px;}
table tr td { font-style: italic; }
table tr td:last-child {border-right: 0px;}
table tr:nth-child(1n) {background: #e6e6e6;}
table tr:nth-child(2n) {background: #f6f6f6;}
table tr:hover {background: #000000; color:white; transition-duration: 0.6s;}
body {
background: #3a7bd5;
background: -webkit-linear-gradient(to top, #3a6073, #3a7bd5);
background: linear-gradient(to top, #3a6073, #3a7bd5);
background-image: url("img/bg_network.png");
background-size: 100% auto;
background-position: center;
background-attachment: fixed;
}
h1 {
    width: 50%;
    font-weight: 600;
    font-family: 'Titillium Web', sans-serif;
    position: relative; 
    font-size: 36px;
    line-height: 40px;
    padding: 15px 15px 15px 0;
    margin-left: 25%;
    color: #828282;
    background-color: white;
    box-shadow:
        inset 0 0 0 1px #828282,
        inset 0 0 5px rgba(53,86,129, 0.5),
        inset -285px 0 35px white;
    border-radius: 0 10px 0 10px;
}
h2 {
    width: 20%;
    text-align: center;
    background-color: white;
    margin: 1em 0 .6em 0;
    margin-left: 5px;
    font-weight: normal;
    color: #828282;
    font-family: 'Hammersmith One', sans-serif;
    text-shadow: 0 -1px 0 rgba(0,0,0,0.4);
    position: relative;
    font-size: 30px;
    line-height: 40px;
    box-shadow:
        inset 0 0 0 1px #828282,
        inset 0 0 5px rgba(53,86,129, 0.5),
        inset -285px 0 35px white;
    border-radius: 0 10px 0 10px;
}
</style>
    <div class="clearfix">
        <form style="float:right;margin-right:10px;margin-top:5px;" action="index.php" method="post">
        <input type="submit" name="logout" value="Выйти из системы" class="btn btn-mini btn-danger" />
        </form>
        <button style="float:left;margin-left:10px;margin-top:5px;" class="btn btn-primary" onclick="document.location.replace('auth.php')">Назад</button>
    </div>
<h1>Журнал заявок</h1>
<h2>Фильтр заявок</h2>
<button class="btn btn-primary" onclick="show_only_srochnye()">Срочная заявка</button>
<button class="btn btn-primary" onclick="show_only_planovye()">Плановая заявка</button>
<button class="btn btn-primary" onclick="unhide_all()">Все заявки</button>
<p></p>
<a class="btn btn-info" href="create_zayavka.php">Сформировать заявку</a>
<button class="btn">Сформировать отчет</button>
<p></p>
<table id="table-nach-uch" class="table" border="1">
<tr>
    <th>№</th>
    <th>Станок</th>
    <th>Проблемный узел</th>
    <th>Вид заявки</th>
    <th>Статус</th>
    <th>Дата поступления</th>
    <th>Дата выполнения</th>
</tr>
<?php
    if (is_array($result)) { 
    for ($i = 0; $i < count($result); $i++) {
        $row = $result[$i];
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['model'] . "</td>";
        echo "<td>" . $row['nameuzel'] . "</td>";
        echo "<td>" . $row['namevid'] . "</td>";
        if ($row['state'] == "1") echo "<td>Рассматривается</td>";
        if ($row['state'] == "2") echo "<td>Ожидает выполнения</td>";
        if ($row['state'] == "3") echo "<td>Выполняется</td>";
        if ($row['state'] == "4") echo "<td>Выполнена</td>";
        if ($row['state'] == "5") echo "<td>Утверждена</td>";
        echo "<td>" . $row['date_postuplenya'] . "</td>";
        echo "<td>" . $row['date_ispolnenya'] . "</td>";
        echo "</tr>";
    }
    }
?>
</table>
</body>
</html>
