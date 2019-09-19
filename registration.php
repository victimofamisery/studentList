

<?php

if(((isset($_POST["firstname"])&&(strlen($_POST["firstname"])>=1))&&preg_match("/[А-ЯЁа-яё]/u", $_POST["firstname"]))
&&((isset($_POST["secondname"])&&(strlen($_POST["secondname"])>=1))&&preg_match("/[А-ЯЁа-яё]/u", $_POST["secondname"]))
&&(((isset($_POST["number"]))&&((mb_strlen($_POST["number"])>=2)&&(mb_strlen($_POST["number"])<=5)))&&preg_match("/[А-ЯЁа-яё0-9]/u", $_POST["number"]))
&&((isset($_POST["email"]))&&(mb_strlen($_POST["email"])>=1))
&&((isset($_POST["ege"]))&&((mb_strlen((string)$_POST["ege"])>=1)&&(mb_strlen((string)$_POST["ege"])<=3)))
&&((isset($_POST["date"]))&&(mb_strlen((string)$_POST["date"])>=1))){
	$mysqli=new mysqli("localhost","root","","student");
$mysqli->query("Set names 'utf8'");
$mysqli->query("insert into `users`  values('"
.$_POST["firstname"]."','".$_POST["secondname"]."','"
.$_POST["sex"]."','".$_POST["number"]."','"
.$_POST["email"]."','".$_POST["ege"]."','".
$_POST["date"]."','".$_POST["place"]."')");
$mysqli->close();
setcookie("Registered",$_POST["email"],time()+60*60*24*30*12*10);
echo "<div>Спасибо, данные сохранены, вы можете при желании их отредактировать</div>";
echo "<a href='http//localhost'>Перейти к списку абитуриентов</a>";
}
else
include("registration-template.html");





