<?php

// $username = sanitize_text_field($_SESSION['username']);
// $password = sanitize_text_field($_SESSION['password']);

include '..\..\config\Database.php';

$db = new PDO("mysql:host=localhost;dbname=support_ticket","root","");
$data = array();
$sql = " SELECT * FROM users ";

$usersQuery = $db->query($sql);
$getUsers = $usersQuery->fetchAll(PDO::FETCH_ASSOC);


print_r(json_encode($getUsers));


?>
