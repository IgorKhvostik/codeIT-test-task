<?php
$log=trim(strip_tags($_POST['login']));
$pass=trim(strip_tags($_POST['password']));
require_once "connection.php";

$obj=array($log,$log,$pass);
$STH = $DBH->prepare("SELECT name, email FROM user WHERE login=? OR email=? AND password=?");
$STH->execute($obj);
$result=$STH->fetchAll();
if (count($result)>0){
    foreach ($result as $row){
        setcookie("name", $row['name']);
        setcookie("email", $row['email']);
        header("Location: result.php");
         }

}else{
    echo "<h3>Error! Wrong login data </h3>" . "<a href='index.php'>Go back to login page</a>";
    exit();
}


