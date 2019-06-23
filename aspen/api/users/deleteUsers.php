<?php

$emp_no = $_POST["emp_no"];

$db = new PDO("mysql:host=localhost;dbname=db_aspen","root","");
$sql = "DELETE FROM tbl_users WHERE emp_no = $emp_no";
$deleteUsers = $db->prepare($sql);
$deleteUsers->execute();
?>