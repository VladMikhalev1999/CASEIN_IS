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
    $query = "select * from all_machin()";
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
.cont {
font-size: 20pt;
margin: 10% auto 0 auto;
text-align: center;
}
</style>
    <div class="clearfix">
        <form style="float:right;margin-right:10px;margin-top:5px;" action="index.php" method="post">
        <input type="submit" name="logout" value="Выйти из системы" class="btn btn-mini btn-danger" />
        </form>
        <button style="float:left;margin-left:10px;margin-top:5px;" class="btn btn-primary" onclick="document.location.replace('jz_nachalnik_uchastka.php')">Назад</button>
    </div>
<h1>Формирование заявки</h1>
<div class="cont">
<form  action="jz_nachalnik_uchastka.php" method="get">
<p><i>Выберите станок:</i></p>
<select style="width:250px" name="machines">
<?php
    for ($i = 0; $i < count($result); $i++) {
        echo "<option>" . $result[$i]["id"] . "." . $result[$i]["model"] . "</option>";
    }
?>
</select>
<p></p>
<input class="btn btn-primary" type="submit" value="Сформировать" />
</form>
</div>
</body>
</html>
