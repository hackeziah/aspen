<?php
include '..\..\config\Database.php';

class UserType {

	public function getUserTypes()
	{
		$sql = " SELECT * FROM user_types;";
		$result = (new Database())->query($sql);
		return $result;
	}

	public function getSingleUserType($id)
	{
		$sql = "SELECT * FROM user_types WHERE User_Type_Id = $id";
		$result = (new Database())->query($sql, [$id],'select');

		return $result;
	}

	public function deleteSingleUserType($id)
	{
		$sql = " DELETE FROM user_types WHERE User_Type_Id = $id";
		$result = (new Database())->query($sql, [$id],'delete');

		return $result;

	}

	public function addUserType($data)
	{
		$sql = " INSERT INTO user_types(Name, Description, Scope) VALUE(?, ?, ?)";

		$result = (new Database())->query($sql,
		[$data['Name'], $data['Description'] , $data['Scope']], 'insert');


		return $result;

	}

	public function updateUserType	($id, $data)
	{
		$sql = " UPDATE `user_types` SET Name = ?, Description= ?, Scope= ?  WHERE User_Type_Id = ? ";

		$result = (new Database())->query(
			$sql,
			[ $data['Name'], $data['Description'] , $data['Scopes'] , $id ],
			'update'
		);

		return $result;
	}

}
