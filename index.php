<?php 
    require "script.php";
    if (isset($_REQUEST["logout"])) {
        nulify_cookie();
    }
?>
<html>
<head>
<title>ИС ТОиР</title>
<script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<style>
h1 {
margin: 0;
padding: 10px 0;
border-bottom: solid 4px #3a6073;
}
body {
color: #3a6073;
background: #3a7bd5;
background: -webkit-linear-gradient(to top, #3a6073, #3a7bd5);
background: linear-gradient(to top, #3a6073, #3a7bd5);
background-image: url("img/bg_network.png");
background-size: 100% auto;
background-position: center;
background-attachment: fixed;
}
.cont {
 background-color: #ffffff;
 border: 4px solid #3a6073;
 border-radius: 15px;
 width: 400px;
 margin: 10% auto 0 auto;
 text-align: center;
}
button[type="submit"] {
 padding: 13px 30px;
 margin: 5px 0 20px 0;
 font-size: 15px;
 color: #fff;
 background-color: #3a6073;
 border: none;
 border-bottom: 4px solid #000000;
 cursor: pointer;
} 
button[type="submit"]:hover{
 transition: all 0.5s;
 background: #fff;
 color: #2c536c;
}       
label {
font-size: 18px;
}
input[type="text"],input[type="password"]{
 width: 300px;
 height:50px;
 font-size: 18px;
 margin-bottom: 25px;
 border-radius: 4px;
 padding-left: 10px;
}
</style>
<?php if(isset($_COOKIE["login"]) == FALSE): ?>
<div class="cont">
<h1>Авторизация</h1>
<form class="form-horizontal" action="auth.php" method="post">
  <div class="control-group">
    <label class="control-label" for="login">Логин</label>
    <div class="controls">
      <input type="text" id="login" name="login" placeholder="Логин" required>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="password">Пароль</label>
    <div class="controls">
      <input type="password" name="password" id="password" placeholder="Пароль" required>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
       <label style="margin-left: 20px" class="checkbox">
          <input type="checkbox" name="remembered" checked/>Запомнить
       </label>
       <p></p>
      <button type="submit" class="btn">Войти</button>
    </div>
  </div>
</form>
</div>
<?php else: ?>
<script>
    document.location.replace("auth.php");
</script>
<?php endif; ?>
</body>
</html>