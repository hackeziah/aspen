<?php
require_once('../../config/Database.php');

class Trail
{

    public function getNotifications($token)
    {
        $sql = "SELECT *
        			FROM notifications
        			WHERE User_To_Notify = ?
        			order by Notification_Id DESC ";
		$res = (new Database())->query($sql, [$user_id]);
		return $res;
    }


    public function insertNotification($data)
	{
		$sql = "INSERT INTO notifications(User_To_Notify, Notification_Message, Url_String, Query_Params) VALUES(?, ?, ?, ?)";
		$res = (new Database())->query(
			$sql, $data, 'insert'
		);
		return $res;
    }








}