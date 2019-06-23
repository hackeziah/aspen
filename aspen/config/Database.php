<?php

class Database
{
	// specify your own database credentials
	private $host = "localhost";
	private $database = "db_aspen";
	private $username = "root";
	private $password = "";
	public $conn;

	// get the database connection
	public function connection() {
		$this->conn = null;

		try {
			$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
		} catch(PDOException $ex){
			echo "Connection error: " . $ex->getMessage();
		}

		return $this->conn;
	}
}

