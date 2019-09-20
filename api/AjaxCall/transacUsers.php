<?php

include '..\Classes\User.php';


$action = isset($_GET['action']) ? $_GET['action'] : die;

$result = [];

switch($action) {
	
	case 'verificationConfirm':
		//   $verification = isset($_POST["verification"]) ? $_POST["verification"]: die();
		  $Verification_Code = isset($_POST['Verification_Code']) ? $_POST['Verification_Code'] : '';
		  $Employee_Id = isset($_POST['Employee_Id']) ? $_POST['Employee_Id'] : '';

		  $users = new User();
		  $result = $users->verificationConfirm($Verification_Code,$Employee_Id);
		  echo json_encode($result);
		  break;

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

	case 'getSingleUserWithScope': 
			$users = new User();
			$id = isset($_POST['User_Id']) ? $_POST['User_Id'] : '';
			$result = $users->getSingleUserWithScope($id);
			echo json_encode($result);
			break;

	case 'getUsersSupport':
			$users = new User();
			$result = $users->getUsersSupport();
			echo json_encode($result);
  			break;
	// `User_Id`, `Employee_Id`, `Lastname`, `Firstname`, `Middlename`, `Department_Id`, `Position_Id`, `Username`, `Pwd`, `Company_Email`, `User_Type_Id`, `Is_Support`

	
	case 'addUser':
			$data =[
					'Employee_Id' => isset($_POST['Employee_Id']) ? $_POST['Employee_Id'] : '',
					'Lastname' => isset($_POST['Lastname']) ? $_POST['Lastname'] : '',
					'Firstname' => isset($_POST['Firstname']) ? $_POST['Firstname'] : '',
					'Middlename' => isset($_POST['Middlename']) ? $_POST['Middlename'] : '',
					'Department_Id' => isset($_POST['Department_Id']) ? $_POST['Department_Id'] : '',
					'Is_Support' => isset($_POST['Is_Support']) ? $_POST['Is_Support'] : '',
					'Position_Id' => isset($_POST['Position_Id']) ? $_POST['Position_Id'] : '',
					'Username' => isset($_POST['Username']) ? $_POST['Username'] : '',
					'Pwd' => isset($_POST['Pwd']) ? $_POST['Pwd'] : '',
					'User_Type_Id' => isset($_POST['User_Type_Id']) ? $_POST['User_Type_Id'] : '',
					'Company_Email' => isset($_POST['Company_Email']) ? $_POST['Company_Email'] : ''
			];

			$users = new User();
			$userId = $users->addUser($data);
			$users->insertActivation($data["Company_Email"], $data['Employee_Id']);
			break;

	case 'deleteSingleUser':
			$id = isset($_POST['User_Id']) ? $_POST['User_Id'] : die;
			$users = new User();
			$result = $users->deleteSingleUser($id);
			echo json_encode($result);
			break;


	case 'updateUser':
			$id = isset($_POST['User_Id']) ? $_POST['User_Id'] : '';

			$data =[
				'Employee_Id' => isset($_POST['Employee_Id']) ? $_POST['Employee_Id'] : '',
				'Lastname' => isset($_POST['Lastname']) ? $_POST['Lastname'] : '',
				'Firstname' => isset($_POST['Firstname']) ? $_POST['Firstname'] : '',
				'Middlename' => isset($_POST['Middlename']) ? $_POST['Middlename'] : '',
				'Department_Id' => isset($_POST['Department_Id']) ? $_POST['Department_Id'] : '',
				'Position_Id' => isset($_POST['Position_Id']) ? $_POST['Position_Id'] : '',
				'Username' => isset($_POST['Username']) ? $_POST['Username'] : '',
				'User_Type_Id' => isset($_POST['User_Type_Id']) ? $_POST['User_Type_Id'] : ''
			];
			$users = new User();
			$result = $users->updateUser($id, $data);
			echo json_encode($result);
			break;

    default:
			$result = "No value";
}
