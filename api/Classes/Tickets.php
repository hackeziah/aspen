<?php
include '..\..\config\Database.php';

class Tickets {

    public function addTickets()
    {
        $sql = " INSERT INTO tickets(tickets_no, b, User_Type, name, department) VALUE(?, ?, ?, ?, ?)";

		$usersQuery = (new Database())->query($sql, [], 'insert');

		return $usersQuery;
    }

}

