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
    if (isset($_REQUEST["id"]) && isset($_REQUEST["priority"])) {
        $query = "select * from upd_prior(" . $_REQUEST["id"] . "," . $_REQUEST["priority"] . ")";
        $result = pg_query($db, $query);
        $result = pg_fetch_all($result);
    }    
    $query = "select * from func_jurnal_obslujivaniya_2()";
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
    width: 30%;
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
        </form><button style="float:left;margin-left:10px;margin-top:5px;" class="btn btn-primary" onclick="document.location.replace('auth.php')">Назад</button>
    </div>
<h1>Журнал обслуживания</h1>
<h2>Фильтр (Виды заявок)</h2>
<button class="btn btn-primary" onclick="show_only_srochnye()">Срочные</button>
<button class="btn btn-primary" onclick="show_only_planovye()">Плановые</button>
<button class="btn btn-primary" onclick="unhide_all()">Все</button>
<h2>Установить приоритет</h2>
<form name="low" action="boss.php" method="post">
    <input type="submit" class="btn btn-success" onclick="handler(form_1, 1)" value="Низкий" />
</form>
<form name="mid" action="boss.php" method="post">
    <input type="submit" class="btn btn-warning" onclick="handler(form_2, 2)" value="Средний" />
</form>
<form name="high" action="boss.php" method="post">
    <input type="submit" class="btn btn-danger" onclick="handler(form_3, 3)" value="Высокий" />
</form>
<p></p>
<table id="table-nach-uch" class="table" border="1">
<tr>
    <th>№ заявки</th>
    <th>№ исполняем. бригады</th>
    <th>Дата поступления</th>
    <th>Вид заявки выполнения</th>
    <th>Приоритет</th>
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
        if ($row['prioritet'] == "1") echo "<td>Низкий</td>";
        if ($row['prioritet'] == "2") echo "<td>Средний</td>";
        if ($row['prioritet'] == "3") echo "<td>Высокий</td>";
        echo "<td>" . $row['model'] . "</td>";
        echo "<td>" . $row['nameuzel'] . "</td>";
        echo "</tr>";
    }
    }
?>
</table>
<script>
    function handler(form, id) {
        if (chosenRow == null) return;
        let x = document.createElement("input");
        x.setAttribute("type", "hidden");
        x.setAttribute("name", "id");
        x.setAttribute("value", chosenRow.children[0].innerText);
        form.appendChild(x);
        x = document.createElement("input");
        x.setAttribute("type", "hidden");
        x.setAttribute("name", "priority");
        x.setAttribute("value", id);
        form.appendChild(x);
    }
    let form_1 = document.forms.low;
    let form_2 = document.forms.mid;
    let form_3 = document.forms.high;
    let chosenRow = null;
    let rows = document.getElementsByTagName("table")[0].getElementsByTagName("tbody")[0].children;
    for (let i = 1; i < rows.length; i++) {
        let row = rows[i];
        row.addEventListener("click", (event) => {
            if (chosenRow == null) {
                chosenRow = event.target.parentNode;
                chosenRow.style.backgroundColor = "black";
                chosenRow.style.color = "white";
            } else if (chosenRow == event.target.parentNode) {
                chosenRow.style.backgroundColor = "white";
                chosenRow.style.color = "black";
                chosenRow = null;                
            } else {
                chosenRow.style.backgroundColor = "white";
                chosenRow.style.color = "black";
                chosenRow = event.target.parentNode;
                chosenRow.style.backgroundColor = "black";
                chosenRow.style.color = "white";
            }
        });
    }
</script>
</body>
</html>
