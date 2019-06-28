<?php
include '..\Classes\User.php';

$action = $_GET['action'];
$result = [];

switch($action) {

	case 'getUsers':
			$users = new User();
			$result = $users->getUsers();
			echo json_encode($result);
  		break;

	case 'getSingleUser':
			$users = new User();
			$id = isset($_POST['id']) ? $_POST['id'] : die;
			$result = $users->getSingleUser($id);
			echo json_encode($result);
			break;

	case 'addUser':
			$Username = isset($_POST['Username']) ? $_POST['Username'] : die;
			$Pword = isset($_POST['Pword']) ? $_POST['Pword'] : die;
			$User_Type = isset($_POST['User_Type']) ? $_POST['User_Type'] : die;
			$name = isset($_POST['name']) ? $_POST['name'] : die;
			$department = isset($_POST['department']) ? $_POST['department'] : die;

			$users = new User();
			$result = $users->addUser($Username, $Pword,$User_Type,$name,$department);
			echo json_encode($result);
			break;

	case 'deleteSingleUser':
			$id = isset($_POST['User_Id']) ? $_POST['User_Id'] : die;
			$users = new User();
			$result = $users->deleteSingleUser($id);
			echo json_encode($result);
			break;

	case 'updateUser':
			$id = isset($_POST['User_Id']) ? $_POST['User_Id'] : die;

			$userdata =[
				'Username' => isset($_POST['Username']) ? $_POST['Username'] : '',
				'Pword' => isset($_POST['Pword']) ? $_POST['Pword'] : '',
				'User_Type' => isset($_POST['User_Type']) ? $_POST['User_Type'] : '',
				'name' => isset($_POST['name']) ? $_POST['name'] : '',
				'department' => isset($_POST['department']) ? $_POST['department'] : ''
			];
			$users = new User();
			$result = $users->updateUser($id, $userdata);
			echo json_encode($result);
			break;

    default:
			$result = "No value";
}
