<?php
//
//use W1020\Table;
//
//include "../vendor/autoload.php";
//
//$config = [
//    "servername" => "localhost",
//    "username" => "root",
//    "password" => "root",
//    "dbname" => "guestbook",
//    "table" => "gb"
//];
//
//$table = new Table($config);
//
//$table->ins($_POST);
//header("Location: index.php");?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="1.php" method="post">
    Введите новое сообщение.
    <input type="text" name="message"><br><br>
    Введите ваше имя
   <input type="text"  name="zp"><br><br>

    <input type="submit" value="ok">
</form>
</body>
</html>



