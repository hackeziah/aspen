<?php
// $username = "kevin";
// $password = "password";

include '..\Classes\Login.php';
$username = $_POST['username'] = "keving";
$password = $_POST['password'] = "password";

if(isset($username) AND isset($password)){

    $login = new Login($username,$password);

    if($login->correct()){
       $login->success();
    }else{
        $login->failed();
    }
}

?>

