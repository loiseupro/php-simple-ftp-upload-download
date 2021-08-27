<?php

class Ftp{

	/* It is not recommended to set the credentials to access a server in this file!
	Keep in mind that this is an example file, not a production file.  */
	private $user = "user";
	private $server = "server";	
	private $connection = null;
	private $server_login = null;	
	private $server_destination = "";
	private $password = "password";
	private $ftp_mode = "FTP_ASCII";

	/**
	* Connect to FTP server
	*/
	private function connect(){
		$this->connection = ftp_connect($this->server);
		if(!$this->connection) die('Unable to connect');

		$this->server_login = ftp_login($this->connection, $this->user, $this->password);
		if(!$this->server_login) die('Invalid credentials');
	}

	/**
	* Disconnect to FTP server
	*/
	private function disconnect(){
		ftp_close($this->connection);
	}

	/**
	* Upload file
	* 
	* @param 	string $local_file    Local file path.
	* @return 	bool
	*/
	public function uploadFile($local_file){
		$this->connect();
		$uploaded = ftp_put($this->connection, $this->server_destination.basename($local_file), $local_file, FTP_ASCII);
		$this->disconnect();

		return $uploaded;
	}

	/**
	* Download file
	* 
	* @param 	string $remote_file    Remote file path.
	* @return 	bool
	*/
	public function downloadFile($remote_file){
		$this->connect();
		$downloaded = ftp_get($this->connection, "download_".basename($remote_file), $this->server_destination.basename($remote_file), FTP_ASCII);
		$this->disconnect();

		return $downloaded;
	}

	
}

?>
