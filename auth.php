<?php
    require "script.php";
    if (isset($_COOKIE["login"]) == TRUE) {
        $login = $_COOKIE['login'];
        $pass = $_COOKIE['password'];
    }
    else {
        $login = $_REQUEST['login'];
        $pass = $_REQUEST['password'];
        if (isset($_REQUEST['remembered'])) {
            setcookie("login", $login, time() + 3600);
            setcookie("password", $pass, time() + 3600);
        }
    }
    $db = auth($login, $pass);
    #$query = "select rolename from roles where username = '" . $login . "'";
    #$result = pg_query($db, $query);
    #$result = pg_fetch_all($result);
?>
<html>
<head>
<meta charset="utf-8" />
<script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<title>ИС ТОиР</title>
</head>
<body>
<style>
.cont {
 background-color: #ffffff;
 border: 4px solid #3a6073;
 border-radius: 15px;
 width: 400px;
 margin: 10% auto 0 auto;
 text-align: center;
}
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
.cont p {
padding: 10px;
margin-bottom: 0;
}
.cont p:not(:last-child) {
    border-bottom: 4px solid #3a6073;
}
.cont p a {
  text-align:center;
  display:block;
  font-family: arial;
  text-decoration: none;
  font-weight: 300;
  font-size: 14px;
  border: #1071FF 1px solid;
  color: #3a6073;
  padding: 10px 5px;
  padding-left: 5px;
  padding-right: 5px;
  margin: 10px auto;
  transition: .5s;
  border-radius: 0px;
}
a:hover {
  top: 5px;
  transition: .5s;
  color: #10FF58;
  border: #10FF58 1px solid;
  border-radius: 10px;
}
a:active {
  color: #000;
  border: #1A1A1A 1px solid;
  transition: .07s;
  background-color: #FFF;
}
</style>
    <div class="clearfix">
        <form style="float:right;margin-right:10px;margin-top:5px;" action="index.php" method="post">
        <input type="submit" name="logout" value="Выйти из системы" class="btn btn-mini btn-danger" />
        </form>
    </div>
    <?php if($db == TRUE): ?>
        <!-- <p><a class="btn btn-link" href="machines.php">Станки</a></p> -->
        <div class="cont">
            <p><a class="btn btn-link" href="jz_nachalnik_uchastka.php">Журнал заявок (начальник участка)</a></p>
            <p><a class="btn btn-link" href="jz_nachalnik_brigady.php">Журнал обслуживания (начальник ремонтной службы)</a></p>
            <p><a class="btn btn-link" href="boss.php">Журнал обслуживания</a></p>
            <p><a class="btn btn-link" href="employees.php">План работ</a></p>
        </div>
    <?php else: ?>
        <h2>Ошибка подключения к Базе Данных!</h2>
    <?php endif ?>
</body>
</html>