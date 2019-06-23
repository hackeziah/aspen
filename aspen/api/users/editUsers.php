<?php

$emp_no = $_POST["emp_no"];

$db = new PDO("mysql:host=localhost;dbname=db_aspen","root","");
$sql = "UPDATE tbl_users SET username = :username,password = :password,name = :name,email = :email,address = :address,number = :number WHERE emp_no = $emp_no";

$editUsers = $db->prepare($sql);
$editUsers->bindParam(":username",$_POST["username"],PDO::PARAM_STR);
$editUsers->bindParam(":password",$_POST["password"],PDO::PARAM_STR);
$editUsers->bindParam(":name",$_POST["name"],PDO::PARAM_STR);
$editUsers->bindParam(":email",$_POST["email"],PDO::PARAM_STR);
$editUsers->bindParam(":address",$_POST["address"],PDO::PARAM_STR);
$editUsers->bindParam(":number",$_POST["number"],PDO::PARAM_INT);
$editUsers->execute();

?>

