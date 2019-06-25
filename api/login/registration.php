<?
include '..\Classes\Registration.php';
$username = $data['username'] = "Nics";
$password = $data['password'] = "password";
$name = $data['name'] = "Nics Manzano";
$email = $data['email'] = "nics@ggmail.com";
$address = $data['address'] = "Manila City";
$number = $data['number'] = "09090";

$data=array(
    "username" => "Nics",
    "password" => "test",
    "name" => "test",
    "email" => "tes sdsd@gamil.com",
    "address" => "test address",
    "number" => 3
);



$register = new Registration($data);

    if($register->register()){
       $register->success();
    }else{
        $register->failed();
    }
