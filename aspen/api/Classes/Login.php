<?php
include '..\..\config\Database.php';

class Login
{

    private $username;
    private $password;
    private $type;
    private $data;

    public function __construct($username, $password,$type = 'api')
    {
        $this->username = $username;
        $this->password = $password;
        $this->type = $type;

        $this->login();
    }

    private function login()
    {
        $database = new Database();
        $db = $database->connection();

        $sql = "SELECT * FROM tbl_users WHERE username = :username AND password = :password";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(':username' => $this->username, ':password' => $this->password));

        if($stmt->rowCount() > 0){
            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // create arrayz
            $this->data=array(
                "status" => true,
                "message" => "Successfully Login!",
                "username" => $row['username']
            );
        }
        else{
            $this->data=array(
                "status" => false,
                "message" => "Invalid Username or Password!",
            );
        }
    }

    public function correct()
    {
        if ($this->data['status']) {
            return true;
        }

        return false;
    }
    public function success()
    {
        if ($this->type == 'api') {
            echo json_encode($this->data);
        } else {
            header('Location: /');
        }
    }
    public function failed()
    {
        if ($this->type == 'api') {
            echo json_encode($this->data);
        } else {
            header('Location: /');
        }
    }
}