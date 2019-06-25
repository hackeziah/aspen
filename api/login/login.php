<?php
$username = "rainenmanzano@gmail.com";
$password = "rainenmanzano019";

include '..\Classes\Login.php';

if(isset($username) AND isset($password)){

    $login = new Login($username,$password);

    if($login->correct()){
       $login->success();
    }else{
        $login->failed();
    }
}

?>

