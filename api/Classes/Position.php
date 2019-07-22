<?php
include '..\..\config\Database.php';

class Position
{

    public function getPosition()
    {
        $sql = " SELECT * FROM positions ";
		$positionQuery = (new Database())->query($sql);

		return $positionQuery;
    }


	public function getSinglePosition($id)
	{
		$sql = " SELECT * FROM positions WHERE Position_Id = $id";
		$positionQuery = (new Database())->query($sql, [$id],'select');

		return $positionQuery;
    }


    public function updatePosition($id, $data)
	{

		$sql = "UPDATE `positions` SET Position_Name = ?, Position_Desc = ?  WHERE Position_Id = ?";

		$positionQuery = (new Database())->query(
			$sql,
			[$data['Position_Name'], $data['Position_Desc'], $id],
			'update'
		);

		return $positionQuery;
	}


    public function addPosition($data)
	{

		$sql = "INSERT INTO positions(Position_Name, Position_Desc) VALUE(?, ?)";
		$positionQuery = (new Database())->query(
			$sql,
			[$data['Position_Name'], $data['Position_Desc']],
			'insert'
		);

		return $positionQuery;
    }

    public function deletePosition($id)
    {
        $sql = " DELETE FROM positions WHERE Position_Id = $id";
        $positionQuery = (new Database())->query($sql, [$id],'delete');

        return  $positionQuery;
    }

}