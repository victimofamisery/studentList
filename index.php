<?php
echo "<a href=profile.php>Зарегистрироваться/Редактировать свои данные</a><br>";
$mysqli=new mysqli("localhost","root","","student");
$mysqli->query("Set names 'utf8'");
$count=$mysqli->query("SELECT COUNT(*) FROM `users`");
while($row = mysqli_fetch_array($count))
	$pages=$row['COUNT(*)']/50;
if(isset($_GET['search']))
$users=$mysqli->query
("select firstname,secondname,groupid,ege from `users` 
where concat (firstname,' ',secondname,' ',groupid,' ',ege)
 like '%".$_GET['search']."%' limit 50");
else if(isset($_GET['pages']))
$users=$mysqli->query
("select firstname,secondname,groupid,ege from `users`
limit".(50*$_GET['pages']).",".(50+50*$_GET['pages']));
else
$users=$mysqli->query
("select firstname,secondname,groupid,ege from `users` limit 50");
include("index-template.html");
$mysqli->close();

