<?php
include '..\..\config\Database.php';

class User {

	public function getUsers()
	{
		$sql = " SELECT * FROM users ";
		$usersQuery = (new Database())->query($sql);

		return $usersQuery;
	}

	public function getSingleUser($id)
	{
		$sql = " SELECT * FROM users WHERE User_Id = $id";

		$usersQuery = (new Database())->query($sql, [$id],'select');

		return $usersQuery;
	}

	public function deleteSingleUser($id)
	{
		$sql = " DELETE FROM users WHERE User_Id = $id";

		$usersQuery = (new Database())->query($sql, [$id],'delete');

		return $usersQuery;

	}
	// `User_Id`, `Employee_Id`, `Lastname`, `Firstname`, `Middlename`,
	//  `Department_Id`, `Unit_Id`, `Position_Id`, `Username`, `Pwd`, `User_Type_Id`

	public function addUser($Username, $Pword,$User_Type,$name,$department)
	{
		$sql = " INSERT INTO users(Username, Pword, User_Type, name, department) VALUE(?, ?, ?, ?, ?)";

		$usersQuery = (new Database())->query($sql, [$Username, $Pword,$User_Type,$name,$department], 'insert');

		return $usersQuery;
	}

	public function updateUser($id, $data)
	{
		$sql = "UPDATE `users` SET Username = ?, Pword = ?, User_Type = ?, name = ?, department = ? WHERE User_Id = ?";

		$usersQuery = (new Database())->query(
			$sql,
			[$data['Username'], $data['Pword'], $data['User_Type'], $data['name'], $data['department'], $id],
			'update'
		);

		return $usersQuery;
	}

	public function success()
	{
	}


}
