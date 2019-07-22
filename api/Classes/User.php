<?php
include '..\..\config\Database.php';
use PHPMailer\PHPMailer\PHPMailer;
include '..\..\libs\vendor\autoload.php';

class User {

	public function gen()
	{
		$code = "";
		for($a=0;$a<5;$a++ )
		{
			$code = $code.''.rand(0, 9);
		}

		return $code;
	}

	public function mailer(){

		function generate()
		{
			$code = "";
			for($a=0;$a<5;$a++ )
			{
				$code = $code.''.rand(0, 9);
			}

			return $code;
		}

		$gen = generate();
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->SMTPDebug = 2;
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = "tesseraticketingsystem@gmail.com";
		$mail->Password = "tesseraticket";
		$mail->setFrom('tesseraticketingsystem@gmail.com', 'TESSERA TICKETING SYSTEM');
		$mail->addReplyTo('tesseraticketingsystem@gmail.com', 'Reply me');
		$mail->addAddress('lamadridkevinpaul@gmail.com', 'Lamadrid');
		$mail->Subject = 'Verification Number';
		$mail->Body = 'This is verification '.$gen;
		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message sent!";
		}

		$sql = "INSERT INTO verification(verification_number) VALUE(?)";

		$departQuery = (new Database())->query(
			$sql,
			[[$gen]],
			'insert'
		);

		return $departQuery;

		// function save_mail($mail)
		// {
		// 	$path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
		// 	$imapStream = imap_open($path, $mail->Username, $mail->Password);
		// 	$result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
		// 	imap_close($imapStream);
		// 	return $result;
		// }

	}

	public function verification_confirm($verification_number)
	{
        $sql = "SELECT * FROM verification WHERE verification_number = $verification_number";
        $verify = (new Database())->query($sql, [$verification_number],'select');
 		// return $verify;
		if (count($verify) > 0){
			$this->data = array(
				'message' => 'Verification Found',
				'verification' => $verify
			);
			echo json_encode($this->data);

			// echo "True";
		}else{
			$this->data = array(
				'message' => 'Verification Not Found'
			);
			echo json_encode($this->data);
			// echo "False";

		}

	}

	public function getUsers()
	{
		$sql = " SELECT u.Employee_Id, u.Lastname, u.Firstname, u.Middlename, a.Name,b.Unit_Name,c.Position_Name,u.Username,u.Pwd,d.Name
		FROM users u
		INNER JOIN departments a ON u.Department_Id = a.Department_Id
		INNER JOIN units b ON u.Unit_Id = b.Unit_Id
		INNER JOIN positions c ON u.Position_Id = c.Position_Id
		INNER JOIN user_types d ON u.User_Type_Id = d.User_Type_Id ";
		$usersQuery = (new Database())->query($sql);
		return $usersQuery;
	}

	public function getSingleUser($id)
	{
		$sql = "SELECT * FROM users WHERE User_id = $id";
		$usersQuery = (new Database())->query($sql, [$id],'select');

		return $usersQuery;
	}

	public function deleteSingleUser($id)
	{
		$sql = " DELETE FROM users WHERE User_Id = $id";
		$usersQuery = (new Database())->query($sql, [$id],'delete');

		return $usersQuery;

	}

	public function addUser($data)
	{
		$sql = " INSERT INTO users(Employee_Id , Lastname, Firstname, Middlename, Department_Id, Unit_Id, Position_Id, Username, Pwd, User_Type_Id) VALUE(?, ?, ?, ?, ?, ?, ?, ?, ? ,?)";

		$usersQuery = (new Database())->query($sql,
		[$data['Employee_Id'], $data['Lastname'] , $data['Firstname'] ,$data['Middlename'], $data['Department_Id'], $data['Unit_Id'], $data['Position_Id'], $data['Username'], $data['Pwd'], $data['User_Type_Id']], 'insert');

		return $usersQuery;

	}

	public function updateUser($id, $data)
	{
		$sql = " UPDATE `users` SET Employee_Id = ?, Lastname= ?, Firstname= ?, Middlename= ?,Department_Id= ?,Unit_Id= ?, Position_Id= ?, Username= ?, Pwd= ?, User_Type_Id = ?  WHERE User_Id = ? ";

		$usersQuery = (new Database())->query(
			$sql,
			[ $data['Employee_Id'], $data['Lastname'] , $data['Firstname'] ,$data['Middlename'], $data['Department_Id'],
			$data['Unit_Id'], $data['Position_Id'], $data['Username'], $data['Pwd'], $data['User_Type_Id'], $id ],
			'update'
		);

		return $usersQuery;
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
