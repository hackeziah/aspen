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
			$data =[
					'Employee_Id' => isset($_POST['Employee_Id']) ? $_POST['Employee_Id'] : die,
					'Lastname' => isset($_POST['Lastname']) ? $_POST['Lastname'] : die,
					'Firstname' => isset($_POST['Firstname']) ? $_POST['Firstname'] : die,
					'Middlename' => isset($_POST['Middlename']) ? $_POST['Middlename'] : die,
					'Department_Id' => isset($_POST['Department_Id']) ? $_POST['Department_Id'] : die,
					'Unit_Id' => isset($_POST['Unit_Id']) ? $_POST['Unit_Id'] : die,
					'Position_Id' => isset($_POST['Position_Id']) ? $_POST['Position_Id'] : die,
					'Username' => isset($_POST['Username']) ? $_POST['Username'] : die,
					'Pwd' => isset($_POST['Pwd']) ? $_POST['Pwd'] : die,
					'User_Type_Id' => isset($_POST['User_Type_Id']) ? $_POST['User_Type_Id'] : die
			];
			$users = new User();
			$result = $users->addUser($data);

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
