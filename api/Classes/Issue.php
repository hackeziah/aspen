<?php
include '..\..\config\Database.php';

class Issue
{
	// `Issue_Id`, `Name`, `Category_Id`, `Priority_Id`, `Description`
    public function getIssue()
    {
        $sql = " SELECT * FROM issues ";
		$issueQuery = (new Database())->query($sql);

		return $issueQuery;
	}


	public function getSingleIssue($id)
	{
		$sql = " SELECT * FROM issues WHERE Issue_Id = $id";

		$issueQuery = (new Database())->query($sql, [$id],'select');

		return $issueQuery;
	}


    public function updateIssue($id, $data)
	{

		$sql = "UPDATE `issues` SET Name = ?, Category_Id = ?, Priority_Id = ?, Description = ?  WHERE Issue_Id = ?";

		$issueQuery = (new Database())->query(
			$sql,
			[$data['Name'], $data['Category_Id'],$data['Priority_Id'],$data['Description'], $id],
			'update'
		);

		return $issueQuery;
	}


    public function addIssue($data)
	{

		$sql = "INSERT INTO issues(Name, Category_Id, Priority_Id, Description) VALUE(?, ? ,? ,?)";

		$issueQuery = (new Database())->query(
			$sql,
			[$data['Name'],$data['Category_Id'],$data['Priority_Id'],$data['Description']],
			'insert'
		);

		return $issueQuery;
    }

    public function deleteIssue($id)
    {
        $sql = " DELETE FROM issues WHERE Issue_Id = $id";
        $issueQuery = (new Database())->query($sql, [$id],'delete');

        return  $issueQuery;
    }


}