<?php
include '..\..\config\Database.php';
include 'Mailer.php';


class User {

	public function getUsers()
	{
		$sql = " SELECT u.User_Id, u.Employee_Id, u.Lastname, u.Firstname, u.Middlename, a.Name,c.Position_Name,u.Username, d.Name as Type
		FROM users u
		INNER JOIN departments a ON u.Department_Id = a.Department_Id
		INNER JOIN positions c ON u.Position_Id = c.Position_Id
		INNER JOIN user_types d ON u.User_Type_Id = d.User_Type_Id 
		order by u.User_Id";
		$usersQuery = (new Database())->query($sql);
		return $usersQuery;
	}

	public function getSingleUser($id)
	{
		$sql = "SELECT u.User_Id, u.Employee_Id, u.Lastname, u.Firstname, u.Middlename, a.Department_Id, a.Name,c.Position_Id, c.Position_Name,u.Username, d.User_Type_Id, d.Name as Type
			FROM users u
			INNER JOIN departments a ON u.Department_Id = a.Department_Id
			INNER JOIN positions c ON u.Position_Id = c.Position_Id
			INNER JOIN user_types d ON u.User_Type_Id = d.User_Type_Id 
			where u.User_Id = $id";
		$usersQuery = (new Database())->query($sql, [$id],'select');

		return $usersQuery;
	}

	public function getSingleUserWithScope($id) {
		$sql = "SELECT u.User_Id, u.Employee_Id, u.Lastname, u.Firstname, u.Middlename, a.Name,c.Position_Name,u.Username,d.Name as Type, d.Scope
			FROM users u
			INNER JOIN departments a ON u.Department_Id = a.Department_Id
			INNER JOIN positions c ON u.Position_Id = c.Position_Id
			INNER JOIN user_types d ON u.User_Type_Id = d.User_Type_Id 
			where u.User_Id = $id";
		$usersQuery = (new Database())->query($sql, [$id],'select');

		return $usersQuery;
	}

	public function getUsersSupport() {
		$sql = "SELECT User_Id, Lastname, Firstname, Middlename
			FROM users
			where Is_Support = 1";
		$usersQuery = (new Database())->query($sql, [], 'select');

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
		$sql = " INSERT INTO users(Employee_Id , Lastname, Firstname, Middlename, Department_Id, Position_Id, Username, Pwd, Company_Email, User_Type_Id, Is_Support) VALUE(?, ?, ?, ?, ?, ?, ?, ?, ? ,?, ?)";

		$usersQuery = (new Database())->query($sql,
		[ $data['Employee_Id'], $data['Lastname'] , $data['Firstname'] ,$data['Middlename'], $data['Department_Id'], $data['Position_Id'], $data['Username'], $data['Pwd'], $data['Company_Email'], $data['User_Type_Id'], $data['Is_Support'] ], 'insert');


		return $usersQuery;

	}

	public function updateUser($id, $data)
	{
		$sql = " UPDATE `users` SET Employee_Id = ?, Lastname= ?, Firstname= ?, Middlename= ?,Department_Id= ?, Position_Id= ?, Username= ?, User_Type_Id = ?  WHERE User_Id = ? ";

		$usersQuery = (new Database())->query(
			$sql,
			[ $data['Employee_Id'], $data['Lastname'] , $data['Firstname'] ,$data['Middlename'], $data['Department_Id'], $data['Position_Id'], $data['Username'], $data['User_Type_Id'], $id ],
			'update'
		);

		return $usersQuery;
	}

	public function generateCode()
	{
		$code = "";
		for($a=0;$a<10;$a++ )
		{
			$code = $code.''.rand(0, 9);

		}
		return $code;
	}

	public function insertActivation($email, $Employee_Id){

		$gen = $this->generateCode();
		$subject = "Verification Number";
		$body = 'This is verification '.$gen;
		$sql = "INSERT INTO activation (Verification_Code, Is_Activated, Employee_Id) VALUES (?, 0, ?)";
		
		$query = (new Database())->query($sql,[
				$gen,
				$Employee_Id
		], 'insert');

		$this->sendVerificationCode($email, $subject, $body);
		return $query;
	}

	public function sendVerificationCode($email, $subject, $body) {
		
		$mail = new Mailer();
	    $mail->sendMail($email, $subject, $body);
		
	}

	public function verificationConfirm($Verification_Code,$Employee_Id)
	{

        $sql = "UPDATE activation SET Is_Activated = 1 WHERE Verification_Code = $Verification_Code AND Employee_Id = $Employee_Id";
        $verify = (new Database())->query($sql, [$Verification_Code, $Employee_Id],'select');

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


}
