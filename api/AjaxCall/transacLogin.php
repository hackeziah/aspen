<?php

include '..\Classes\Login.php';

$username = isset($_POST['username']) ? $_POST['username'] : die;
$password = isset($_POST['password']) ? $_POST['password'] : die;


$login = new Login($username,$password);
$action = $_GET['action'];
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



