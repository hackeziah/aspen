<?php

include '../Classes/Trail.php';

$trail = new Trail();
$action = $_GET['action'];
$result = [];

switch($action) {

	case 'getAllNotifications':
		$result = $trail->getNotifications($token);
  		break;

  	case 'readNotification':
		$result = $trail->readNotification($id);
  		break;

    default:
			$result = "No value";



}
echo json_encode($result);

