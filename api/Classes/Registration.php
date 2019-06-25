<?php

include '..\..\config\Database.php';
class Registration
{
    public $username;
    public $password;
    public $name;
    public $email;
    public $address;
    public $number;

    public $data;
    public $conn;

    public function __construct($data)
    {
        // $this->username = Sdata['username'];
        // $this->password = Sdata['password'];
        // $this->name = Sdata['name'];
        // $this->email = Sdata['email'];
        // $this->address = Sdata['address'];
        // $this->number = Sdata['number'];

    }
    public function register()
    {

        $database = new Database();
        $db = $database->connection();

        $sql = " INSERT INTO tbl_users(username, password, name, email, address, number) VALUES (:username,:password,:name,:email,:address,:number)";
        $addUsers = $db->prepare($sql);

        $addUsers->bindParam(":username",$this->username,PDO::PARAM_STR);
        $addUsers->bindParam(":password",$this->password,PDO::PARAM_STR);
        $addUsers->bindParam(":name",$this->name,PDO::PARAM_STR);
        $addUsers->bindParam(":email",$this->email,PDO::PARAM_STR);
        $addUsers->bindParam(":address",$this->address,PDO::PARAM_STR);
        $addUsers->bindParam(":number",$this->number,PDO::PARAM_INT);

        $addUsers->execute();

    }
    public function success()
    {

        $this->data=array(
            "status" => true,
            "message" => "Done!",
        );

        echo json_encode($this->data);
    }
    public function failed()
    {

        $this->data=array(
            "status" => fasle,
            "message" => "Cannot be inserted!",
        );

        echo json_encode($this->data);
    }


}