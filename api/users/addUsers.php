<?php

$db = new PDO("mysql:host=localhost;dbname=db_aspen","root","");

$sql = " INSERT INTO tbl_users(username,password,name,email,address,number) VALUES (:username,:password,:name,:email,:address,:number)";
$addUsers = $db->prepare($sql);
$addUsers->bindParam(":username",$_POST["username"],PDO::PARAM_STR);
$addUsers->bindParam(":password",$_POST["password"],PDO::PARAM_STR);
$addUsers->bindParam(":name",$_POST["name"],PDO::PARAM_STR);
$addUsers->bindParam(":email",$_POST["email"],PDO::PARAM_STR);
$addUsers->bindParam(":address",$_POST["address"],PDO::PARAM_STR);
$addUsers->bindParam(":number",$_POST["number"],PDO::PARAM_INT);
$addUsers->execute();


?>
