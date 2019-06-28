<?php

include '..\Classes\Issue.php';

$action = $_GET['action'];
$result = [];


	// `Issue_Id`, `Name`, `Category_Id`, `Issue_Id`, `Description`
switch($action) {


	case 'getIssue':
			$issue = new Issue();
			$result = $issue->getIssue();
			echo json_encode($result);
  		break;

	case 'getSingleIssue':
			$issue = new Issue();
			$id = isset($_POST['Issue_Id']) ? $_POST['Issue_Id'] : die;
			$result = $issue->getSingleIssue($id);
			echo json_encode($result);
			break;


	case 'updateIssue':
			$id = isset($_POST['Issue_Id']) ? $_POST['Issue_Id'] : die;
			$data =[
		 			'Name' => isset($_POST['Name']) ? $_POST['Name'] : '',
		 			'Category_Id' => isset($_POST['Category_Id']) ? $_POST['Category_Id'] : '',
                     'Priority_Id' => isset($_POST['Priority_Id']) ? $_POST['Priority_Id'] : '',
                     'Description' => isset($_POST['Description']) ? $_POST['Description'] : ''
				 ];

			$issue = new Issue();
			$result = $issue->updateIssue($id, $data);
			echo json_encode($result);
			break;

	case 'addIssue':
			$data =[
		 			 'Name' => isset($_POST['Name']) ? $_POST['Name'] : die,
                     'Category_Id' => isset($_POST['Category_Id']) ? $_POST['Category_Id'] : die,
                     'Priority_Id' => isset($_POST['Priority_Id']) ? $_POST['Priority_Id'] : die,
                     'Description' => isset($_POST['Description']) ? $_POST['Description'] : die
				 ];

			$issue = new Issue();
			$result = $issue->addIssue($data);
			echo json_encode($result);
			break;

	case 'deleteIssue':
			$id = isset($_POST['Issue_Id']) ? $_POST['Issue_Id'] : die;
			$issue = new Issue();
			$result = $issue->deleteIssue($id);
			echo json_encode($result);
			break;


	case 'searchIssue':
			$issue = new Issue;
			$result = $issue->searchIssue($data);
			echo json_encode($result);
			break;

    default:
			$result = "No value";
}

