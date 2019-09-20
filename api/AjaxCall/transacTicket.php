<?php

include '..\Classes\Ticket.php';

$action = $_GET['action'];
$result = [];

switch($action) {

	case 'addTicket':
		$data =[
		 	'Subject' => isset($_POST['Subject']) ? $_POST['Subject'] : '',
            'Category_Id' => isset($_POST['Category_Id']) ? $_POST['Category_Id'] : '',
            'Priority_Id' => isset($_POST['Priority_Id']) ? $_POST['Priority_Id'] : '',
            'Description' => isset($_POST['Description']) ? $_POST['Description'] : '',
            'CreatedBy' => isset($_POST['CreatedBy']) ? $_POST['CreatedBy'] : '',
            'Status' => isset($_POST['Status']) ? $_POST['Status'] : ''
		];
		$ticket = new Ticket();
		$result = $ticket->addTicket($data);
		break;

	case 'getAllTickets':
		$ticket = new Ticket();
		$result = $ticket->getAllTickets();
  		break;

  	case 'getSupportedTickets':
		$ticket = new Ticket();
		$id = isset($_POST['User_Id']) ? $_POST['User_Id'] : die;
		$result = $ticket->getSupportedTickets($id);
		break;

	case 'getIssuedTickets':
		$ticket = new Ticket();
		$id = isset($_POST['User_Id']) ? $_POST['User_Id'] : die;
		$result = $ticket->getIssuedTickets($id);
		break;

	case 'getSingleTicket':
		$ticket = new Ticket();
		$id = isset($_POST['Ticket_Id']) ? $_POST['Ticket_Id'] : die;
		$result = $ticket->getSingleTicket($id);
		break;

	case 'updateIssue':
		$id = isset($_POST['Issue_Id']) ? $_POST['Issue_Id'] : die;
		$data =[
		 	'Name' => isset($_POST['Name']) ? $_POST['Name'] : '',
		 	'Category_Id' => isset($_POST['Category_Id']) ? $_POST['Category_Id'] :'',
            'Priority_Id' => isset($_POST['Priority_Id']) ? $_POST['Priority_Id'] : '',
            'Description' => isset($_POST['Description']) ? $_POST['Description'] : ''
		];
		$issue = new Issue();
		$result = $issue->updateIssue($id, $data);
		break;

	case 'deleteTicket':
		$id = isset($_POST['Ticket_Id']) ? $_POST['Ticket_Id'] : die;
		$ticket = new Ticket();
		$ticket->deleteTicket($id);
		break;


	case 'searchIssue':
		$issue = new Issue;
		$result = $issue->searchIssue($data);
		break;

    default:
		$result = "No value";
}

echo json_encode($result);

