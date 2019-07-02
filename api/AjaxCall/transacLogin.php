<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
// header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include '..\Classes\Login.php';

$username = isset($_POST['username']) ? $_POST['username'] : die;
$password = isset($_POST['password']) ? $_POST['password'] : die;


$login = new Login($username,$password);
$action = $_POST['action'];
$result = "";
switch ($action) {
   case 'login':
      if($login->correct()){
         $result = $login->success();
      }else{
         $result =$login->failed();
      }
      echo json_encode($result);
   break;
}



