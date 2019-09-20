<?php

include '..\Classes\UserType.php';


$action = isset($_GET['action']) ? $_GET['action'] : die;

$result = [];

switch($action) {

	case 'getUserTypes':
			$userType = new UserType();
			$result = $userType->getUserTypes();
			echo json_encode($result);
  		break;

	case 'getSingleUserType':

			$userType = new UserType();
			$id = isset($_POST['User_Type_Id']) ? $_POST['User_Type_Id'] : '';
			$result = $userType->getSingleUserType($id);
			echo json_encode($result);
			break;

	case 'addUserType':

			$data =[
					'Name' => isset($_POST['Name']) ? $_POST['Name'] : '',
					'Description' => isset($_POST['Description']) ? $_POST['Description'] : '',
					'Scope' => isset($_POST['Scope']) ? $_POST['Scope'] : '',
			];

			$userType = new UserType();
			$result = $userType->addUserType($data);
			break;


	case 'deleteSingleUserType':
			$id = isset($_POST['User_Type_Id']) ? $_POST['User_Type_Id'] : die;
			$userType = new UserType();
			$result = $userType->deleteSingleUserType($id);
			echo json_encode($result);
			break;


	case 'updateUserType':
			$id = isset($_POST['User_Type_Id']) ? $_POST['User_Type_Id'] : '';

			$data =[
				'Name' => isset($_POST['Name']) ? $_POST['Name'] : '',
				'Description' => isset($_POST['Description']) ? $_POST['Description'] : '',
				'Scopes' => isset($_POST['Scopes']) ? $_POST['Scopes'] : ''
			];
			$userType = new userType();
			$result = $userType->updateUserType($id, $data);
			echo json_encode($result);
			break;

    default:
			$result = "No value";
}
