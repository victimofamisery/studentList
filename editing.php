
<?php


if(((isset($_POST["firstname"])&&(strlen($_POST["firstname"])>=1))&&preg_match("/[А-ЯЁа-яё]/u", $_POST["firstname"]))
&&((isset($_POST["secondname"])&&(strlen($_POST["secondname"])>=1))&&preg_match("/[А-ЯЁа-яё]/u", $_POST["secondname"]))
&&(((isset($_POST["number"]))&&((mb_strlen($_POST["number"])>=2)&&(mb_strlen($_POST["number"])<=5)))&&preg_match("/[А-ЯЁа-яё0-9]/u", $_POST["number"]))
&&((isset($_POST["email"]))&&(mb_strlen($_POST["email"])>=1))
&&((isset($_POST["ege"]))&&((mb_strlen((string)$_POST["ege"])>=1)&&(mb_strlen((string)$_POST["ege"])<=3)))
&&((isset($_POST["date"]))&&(mb_strlen((string)$_POST["date"])>=1))){
$mysqli=new mysqli("localhost","root","","student");
$mysqli->query("Set names 'utf8'");
$mysqli->query("update `users`  set
 `firstname`='".$_POST["firstname"]."',
 `secondname`='".$_POST["secondname"]."',
 `sex`='".$_POST["sex"]."',
 `groupid`='".$_POST["number"]."',
 `email`='".$_POST["email"]."',
 `ege`='".$_POST["ege"]."',
 `date`='".$_POST["date"]."',
 `place`='".$_POST["place"]."'
 where email='"._COOKIE["Registered"]."'");
echo "Данные сохранены";
echo "<a href='http//localhost'>Перейти к списку абитуриентов</a>";
$mysqli->close();
setcookie("Registered",$_POST["email"],time()+60*60*24*30*12*10);
}
else{
	$mysqli=new mysqli("localhost","root","","student");
$mysqli->query("Set names 'utf8'");
$users=$mysqli->query
("select * from `users` where `email`='".$_COOKIE['Registered']."'");
while($row = mysqli_fetch_array($users))
	include("editing-template.html");
$mysqli->close();
}