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
    $query = "select * from servis";
    $result = pg_query($db, $query);
    $result = pg_fetch_all($result);
?>
<body>
<style>
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
        <button style="float:left;margin-left:10px;margin-top:5px;" class="btn btn-primary" onclick="document.location.replace('employees.php')">Назад</button>
    </div>
<h1>Справка о сервисе</h1>
<?php
    $servis = null;
    $i = 0;
    $mark = TRUE;
    while ($mark) {
        for ($j = 0; $j < count($result); $j++) {
            if ($result[$j]["id"] == $_REQUEST["id"]) {
                $servis = $result[$j]["note"];
                $mark = FALSE;
            }
        }
        $i++;
        if ($i >= 1000000) $mark = FALSE;
    }
    if ($servis != null) {
        echo "<h3 style=\"margin-top:7%;text-align:center; font-family: SansSerif; font-size: 20pt\"><span style=\"background-color:white;border: 4px solid #3a6073;padding:10px;border-radius:10px;\"><i>" . $servis . "</i></span></h3>";
    }
?>
</body>
</html>
