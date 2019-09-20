<?php

include '../Classes/Login.php';
$username = (isset($_POST["username"])) ? $_POST["username"]: "";
$password = (isset($_POST["password"])) ? $_POST["password"]: "";
$login = new Login($username,$password);
$result = [];

$action = $_REQUEST['action'];
switch ($action) {
   case 'login':
      $result = $login->getData();
   break;
}

echo json_encode($result);


