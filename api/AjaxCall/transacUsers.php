<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
// header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include '..\Classes\User.php';


$action = isset($_GET['action']) ? $_GET['action'] : die;

$result = [];

switch($action) {

	case 'getUsers':
			$users = new User();
			$result = $users->getUsers();
			echo json_encode($result);
  		break;

	case 'getSingleUser':

			$users = new User();
			$id = isset($_POST['User_Id']) ? $_POST['User_Id'] : '';
			$result = $users->getSingleUser($id);
			echo json_encode($result);
			break;

	case 'addUser':
			$data =[
					'Employee_Id' => isset($_POST['Employee_Id']) ? $_POST['Employee_Id'] : '',
					'Lastname' => isset($_POST['Lastname']) ? $_POST['Lastname'] : '',
					'Firstname' => isset($_POST['Firstname']) ? $_POST['Firstname'] : '',
					'Middlename' => isset($_POST['Middlename']) ? $_POST['Middlename'] : '',
					'Department_Id' => isset($_POST['Department_Id']) ? $_POST['Department_Id'] : '',
					'Unit_Id' => isset($_POST['Unit_Id']) ? $_POST['Unit_Id'] : '',
					'Position_Id' => isset($_POST['Position_Id']) ? $_POST['Position_Id'] : '',
					'Username' => isset($_POST['Username']) ? $_POST['Username'] : '',
					'Pwd' => isset($_POST['Pwd']) ? $_POST['Pwd'] : '',
					'User_Type_Id' => isset($_POST['User_Type_Id']) ? $_POST['User_Type_Id'] : '',
			];

			$users = new User();
			$result = $users->addUser($data);
			break;


	case 'deleteSingleUser':
			$id = isset($_POST['User_Id']) ? $_POST['User_Id'] : die;
			$users = new User();
			$result = $users->deleteSingleUser($id);
			echo json_encode($users);
			break;


	case 'updateUser':
			$id = isset($_POST['User_Id']) ? $_POST['User_Id'] : '';
			print_r($_POST);

			$data =[
				'Employee_Id' => isset($_POST['Employee_Id']) ? $_POST['Employee_Id'] : '',
				'Lastname' => isset($_POST['Lastname']) ? $_POST['Lastname'] : '',
				'Firstname' => isset($_POST['Firstname']) ? $_POST['Firstname'] : '',
				'Middlename' => isset($_POST['Middlename']) ? $_POST['Middlename'] : '',
				'Department_Id' => isset($_POST['Department_Id']) ? $_POST['Department_Id'] : '',
				'Unit_Id' => isset($_POST['Unit_Id']) ? $_POST['Unit_Id'] : '',
				'Position_Id' => isset($_POST['Position_Id']) ? $_POST['Position_Id'] : '',
				'Username' => isset($_POST['Username']) ? $_POST['Username'] : '',
				'Pwd' => isset($_POST['Pwd']) ? $_POST['Pwd'] : '',
				'User_Type_Id' => isset($_POST['User_Type_Id']) ? $_POST['User_Type_Id'] : ''
			];
			$users = new User();
			$result = $users->updateUser($id, $data);
			echo json_encode($result);
			break;

    default:
			$result = "No value";
}
