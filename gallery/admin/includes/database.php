<?php

require_once("new_config.php");

class Database {

	public $connection;
	public $db;

	function __construct(){
		$this->db = $this->open_db_connection();
	}


	public function open_db_connection(){

		//$this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		$this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			if($this->connection->connect_errno){
				die("Database connection failed" . $this->connection->connect_error);
			}

		return $this->connection;

	}

	public function query($sql){
		//$result = mysqli_query($this->connection, $sql);
		$result = $this->db->query($sql);
		$this->confirm_query($result);
		return $result;
	}

	private function confirm_query($result){
		if(!$result){
			die("Query failed" . $this->db->error);
		}
	}

	public function escape_string($string){
		//$escaped_string = mysqli_real_escape_string($this->connection, $string);
		return $this->db->real_escape_string($string);
	}

	public function the_insert_id(){

		return $this->db->insert_id;
	}

} // End of Class Database


$database = new Database();




?>
