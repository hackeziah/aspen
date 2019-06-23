<?php
$emp_no = $_POST["emp_no"];
// print_r($_GET);

$db = new PDO("mysql:host=localhost;dbname=db_aspen","root","");

$sql = " SELECT * FROM tbl_users WHERE emp_no = $emp_no";
$usersQuery = $db->query($sql);
$detailUsers = $usersQuery->fetchAll(PDO::FETCH_ASSOC);
print_r(json_encode($detailUsers));
?>