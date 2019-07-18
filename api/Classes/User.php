<?php
include '..\..\config\Database.php';

class User {


	public function mailer(){

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
