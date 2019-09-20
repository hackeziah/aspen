<?php
include '..\..\config\Database.php';

class Configuration {

	public function getConfigurations()
	{
		$sql = " SELECT * FROM configurations;";
		$result = (new Database())->query($sql);
		return $result;
	}

	public function getSingleConfigurations($id)
	{
		$sql = "SELECT * FROM configurations WHERE Id = $id";
		$result = (new Database())->query($sql, [$id],'select');

		return $result;
	}

	public function getSingleConfigurationByName($name)
	{
		$sql = "SELECT * FROM configurations WHERE Event_Name = '$name'";
		$result = (new Database())->query($sql, [$name],'select');

		return $result;
	}

	public function deleteSingleConfigurations($id)
	{
		$sql = " DELETE FROM configurations WHERE Id = $id";
		$result = (new Database())->query($sql, [$id],'delete');

		return $result;

	}

	public function addConfigurations($data)
	{
		$sql = " INSERT INTO configurations(Event_Name, Value) VALUE(?, ?)";

		$result = (new Database())->query($sql,
		[$data['Event_Name'], $data['Value'] ], 'insert');


		return $result;

	}

	public function updateConfigurationsByName($data)
	{
		$sql = " UPDATE `configurations` SET Event_Name = ?, Value= ? WHERE Event_Name = ? ";

		$result = (new Database())->query(
			$sql,
			[ $data['Event_Name'], $data['Value'], $data['Event_Name'] ],
			'update'
		);

		return $result;
	}

}
