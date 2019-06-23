<?php

// $username = sanitize_text_field($_SESSION['username']);
// $password = sanitize_text_field($_SESSION['password']);


//include '..\config\Database.php';

$db = new PDO("mysql:host=localhost;dbname=db_aspen","root","");
$data = array();

$sql = " SELECT * FROM tbl_users ";

$usersQuery = $db->query($sql);
$getUsers = $usersQuery->fetchAll(PDO::FETCH_ASSOC);


print_r(json_encode($getUsers));
?>
