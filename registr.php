<?php
require_once "connection.php";
//обработка данных формы
$email=trim(strip_tags($_POST['email']));
$name=trim(strip_tags($_POST['name']));
$login=trim(strip_tags($_POST['login']));
$password=trim(strip_tags($_POST['password']));
$birthday=strip_tags($_POST['birthday']);
$country=strip_tags($_POST['country']);





$STH = $DBH->prepare("SELECT email FROM user WHERE email=?"); //Проверка, существует ли пользователь с такой почтой в БД
$arr=array($email);
$STH->execute($arr);
$colcount=$STH->fetchAll();
if (count($colcount)>0){
    echo "<h3>User with this email already exists. <a href='index.php'>Go back</a> and set another email!</h3>";
    exit();
}
$STH = $DBH->prepare("SELECT name FROM user WHERE login=?"); //Проверка, существует ли пользователь с таким логином в БД
$arr=array($login);
$STH->execute($arr);
$colcount=$STH->fetchAll();
if (count($colcount)>0){
    echo "<h3>User with this login already exists. <a href='index.php'>Go back</a> and set another login!</h3>";
    exit();
}


$obj = array ($email, $name, $login, $password, $birthday, $country); //Заполнение таблицы пользователей в БД
$STH = $DBH->prepare("INSERT INTO user (email, name, login, password, birthday,country ) VALUES (?, ?, ?, ?, ?, ?)");
   if ($STH->execute($obj)) {
       setcookie("email", $email);
       setcookie("name", $name);
       header("Location: result.php");
   } else{
       echo "ERROR!";
   }





