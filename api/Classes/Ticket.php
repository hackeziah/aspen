<?php
include '..\..\config\Database.php';

class Ticket {

    public function addTicket($data)
    {
        $sql = " INSERT INTO tickets(Subject, Category_Id, Priority_Id, Description, CreatedBy, Status) VALUE(?, ?, ?, ?, ?, ?)";
		$query = (new Database())->query($sql, [
			$data["Subject"],
			$data["Category_Id"],
			$data["Priority_Id"],
			$data["Description"],
			$data["CreatedBy"],
			$data["Status"]
		], 'insert');
		return $query;
    }

    public function getAllTickets() {
    	$sql = "SELECT t.Ticket_Id, t.Subject, t.Description, c.Name, p.Level, 
    			t.DateCreated, t.Status 
    			FROM tickets t 
    			INNER JOIN categories c on t.Category_Id=c.Category_Id
    			INNER JOIN priorities p on t.Priority_Id=p.Priority_Id
    			order by t.Ticket_Id asc";
        $res = (new Database())->query($sql);
        return $res;
    }

    public function getSupportedTickets($userId) {
    	$sql = "SELECT t.Ticket_Id, t.Subject, t.Description, c.Name, p.Level, 
    			t.DateCreated, t.Status 
    			FROM tickets t 
    			INNER JOIN categories c on t.Category_Id=c.Category_Id
    			INNER JOIN priorities p on t.Priority_Id=p.Priority_Id
    			where t.SupportedBy = $userId
    			order by t.Ticket_Id asc";
        $res = (new Database())->query($sql);
        return $res;
    }

    public function getIssuedTickets($userId) {
    	$sql = "SELECT t.Ticket_Id, t.Subject, t.Description, c.Name, 
    			t.DateCreated, t.Status 
    			FROM tickets t 
    			INNER JOIN categories c on t.Category_Id=c.Category_Id
    			INNER JOIN priorities p on t.Priority_Id=p.Priority_Id
    			where t.CreatedBy = $userId
    			order by t.Ticket_Id asc";
        $res = (new Database())->query($sql);
        return $res;
    }

    public function getSingleTicket($ticketId) {
    	$sql = "SELECT t.Ticket_Id, t.Subject, t.Description, t.DateCreated, t.DateClosed, 	t.DateModified, t.Status, c.Name as CategoryName, c.Description as CategoryDescription, p.*, created.User_Id as createdId, created.Firstname as createdFirstname, created.Middlename as createdMiddlename, created.Lastname as createdLastname, supported.User_Id as supportedId, supported.Firstname as supportedFirstname, supported.Middlename as supportedMiddlename, supported.Lastname as supportedLastname
    		FROM tickets t 
    		INNER JOIN categories c on t.Category_Id=c.Category_Id
    		INNER JOIN priorities p on t.Priority_Id=p.Priority_Id
    		INNER JOIN users created on t.CreatedBy=created.User_Id
    		Left JOIN users supported on t.SupportedBy=supported.User_Id
    		where t.Ticket_Id = $ticketId";
        $res = (new Database())->query($sql);
        return $res;
    }

    public function deleteTicket($ticketId) {
    	$sql = "DELETE from tickets where Ticket_Id = $ticketId ";
        $res = (new Database())->query($sql);
    }

}

