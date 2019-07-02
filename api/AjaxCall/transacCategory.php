<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
// header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include '..\Classes\Category.php';

$action = isset($_GET['action']) ? $_GET['action'] : die;
$result = [];

    // `Category_Id`, `Name`, `Description`

switch($action) {


	case 'getCategory':
			$category = new Category();
			$result = $category->getCategory();
			echo json_encode($result);
  		break;


    case 'getSingleCategory':
		  $category = new Category();
		  $id = isset($_POST['Category_Id']) ? $_POST['Category_Id'] : die;
		  $result = $category->getSingleCategory($id);
		  echo json_encode($result);
          break;


	case 'updateCategory':
			$id = isset($_POST['Category_Id']) ? $_POST['Category_Id'] : die;
			$data =[
		 			'Name' => isset($_POST['Name']) ? $_POST['Name'] : '',
                    'Description' => isset($_POST['Description']) ? $_POST['Description'] : ''
				 ];

			$category = new Category();
			$result = $category->updateCategory($id, $data);
			echo json_encode($result);
			break;

	case 'addCategory':
			$data =[
		 			 'Name' => isset($_POST['Name']) ? $_POST['Name'] : die,
                     'Description' => isset($_POST['Description']) ? $_POST['Description'] : die
				 ];

			$category = new Category();
			$result = $category->addCategory($data);
			echo json_encode($result);
			break;

	case 'deleteCategory':
			$id = isset($_POST['Category_Id']) ? $_POST['Category_Id'] : die;
			$category = new Category();
			$result = $category->deleteCategory($id);
			echo json_encode($result);
			break;


	case 'searchCategory':
			$category = new Category;
			$result = $category->searchCategory($data);
			echo json_encode($result);
			break;

    default:
			$result = "No value";
}

